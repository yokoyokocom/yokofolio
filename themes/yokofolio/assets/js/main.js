import * as THREE from 'three';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
camera.position.set(0, 0, 4.5);

const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
const container = document.querySelector('.c-siteBg');
container.appendChild(renderer.domElement);

const ambientLight = new THREE.AmbientLight(0xffffff, 1);
scene.add(ambientLight);

const directionalLight1 = new THREE.DirectionalLight(0xffffff, 1);
directionalLight1.position.set(5, 10, 7);
scene.add(directionalLight1);

// 共通マテリアル（メタリック）
const material = new THREE.MeshPhysicalMaterial({
  color: 0x00ffff,
  metalness: 0,
  roughness: 0.5,
  transmission: 1,     // 完全な透過（透明感）
  thickness: 0.5,      // 光の屈折で色の奥行きを出す
  ior: 2,            // 屈折率（宝石系は高い）
  envMapIntensity: 1,
  clearcoat: 0,
  clearcoatRoughness: 0,
});

const sphere = new THREE.Mesh(new THREE.SphereGeometry(1, 32, 32), material.clone());
sphere.material.color.set(0x8a2020);
sphere.position.set(-5.5, 1.75, 0);
scene.add(sphere);

const cone = new THREE.Mesh(new THREE.ConeGeometry(1.5, 2, 4), material.clone());
cone.material.color.set(0x258a25);
cone.position.set(-3, -2, 0);
scene.add(cone);

const cube = new THREE.Mesh(new THREE.BoxGeometry(1.5, 1.5, 1.5), material.clone());
cube.material.color.set(0x2c2c9b);
cube.position.set(3, 2.25, 0);
scene.add(cube);

const box1 = new THREE.Mesh(new THREE.BoxGeometry(0.3, 2.2, 0.3), material.clone());
const box2 = new THREE.Mesh(new THREE.BoxGeometry(0.3, 2.2, 0.3), material.clone());
box1.material.color.set(0xc9bb00);
box2.material.color.set(0xc9bb00);
box1.rotation.z = Math.PI / 4;
box2.rotation.z = -Math.PI / 4;

const cross = new THREE.Group();
cross.add(box1);
cross.add(box2);
cross.position.set(5.5, -1.75, 0);
scene.add(cross);

sphere.position.set(-6.5, 1.85, 0);
cone.position.set(-5.6, -2.6, 0);
cube.position.set(5.2, 2.4, 0);
cross.position.set(6.2, -2.1, 0);

// 初期のY座標を保存
const baseY = {
  sphere: sphere.position.y,
  cone: cone.position.y,
  cube: cube.position.y,
  cross: cross.position.y,
};

const imgRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
imgRenderer.setPixelRatio(window.devicePixelRatio);
imgRenderer.setSize(window.innerWidth, window.innerHeight);

const fov = 60; // 視野角
const fovRad = (fov / 2) * (Math.PI / 180);
const dist = window.innerHeight / 2 / Math.tan(fovRad);
const imgCamera = new THREE.PerspectiveCamera(
  fov,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
imgCamera.position.z = dist;

const imgScene = new THREE.Scene();

const imgLoader = new THREE.TextureLoader();

class ImagePlane {
  constructor(mesh, img) {
    this.refImage = img;
    this.mesh = mesh;
  }

  setParams() {
    const rect = this.refImage.getBoundingClientRect();

    this.mesh.scale.x = rect.width;
    this.mesh.scale.y = rect.height;

    const x = rect.left - window.innerWidth / 2 + rect.width / 2;
    const y = -rect.top + window.innerHeight / 2 - rect.height / 2;
    this.mesh.position.set(x, y, this.mesh.position.z);
  }

  update(offset) {
    this.setParams();
    this.mesh.material.uniforms.uTime.value = offset;
  }
}

const imgVertexShador = `
varying vec2 vUv;
uniform float uTime;

const float PI = 3.1415926535897932384626433832795;

void main(){
  vUv = uv;
  vec3 pos = position;

  float amp = 0.01;
  float freq = 0.01 * uTime;

  float tension = -0.001 * uTime;

  pos.x = pos.x + sin(pos.y * PI * freq) * amp;
  pos.y = pos.y + (cos(pos.x * PI) * tension);

  gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);
}
`;

const imgFragmentShador = `
varying vec2 vUv;
uniform sampler2D uTexture;
uniform float uImageAspect;
uniform float uPlaneAspect;
uniform float uTime;

void main(){
  vec2 ratio = vec2(
    min(uPlaneAspect / uImageAspect, 1.0),
    min((1.0 / uPlaneAspect) / (1.0 / uImageAspect), 1.0)
  );

  vec2 fixedUv = vec2(
    (vUv.x - 0.5) * ratio.x + 0.5,
    (vUv.y - 0.5) * ratio.y + 0.5
  );

  vec2 offset = vec2(0.0, uTime * 0.0005);
  float r = texture2D(uTexture, fixedUv + offset).r;
  float g = texture2D(uTexture, fixedUv + offset * 0.5).g;
  float b = texture2D(uTexture, fixedUv).b;
  vec3 texture = vec3(r, g, b);

  gl_FragColor = vec4(texture, 1.0);
}
`;

const createMesh = (img) => {
  const texture = imgLoader.load(img.src);

  const uniforms = {
    uTexture: { value: texture },
    uImageAspect: { value: img.naturalWidth / img.naturalHeight },
    uPlaneAspect: { value: img.clientWidth / img.clientHeight },
    uTime: { value: 0 },
  };
  const geo = new THREE.PlaneGeometry(1, 1, 100, 100); // 後から画像のサイズにscaleするので1にしておく
  const mat = new THREE.ShaderMaterial({
    uniforms,
    vertexShader: imgVertexShador,
    fragmentShader: imgFragmentShador,
  });

  const mesh = new THREE.Mesh(geo, mat);

  return mesh;
};

const imagePlaneArray = [];

let time = 0;

const imageArray = [...document.querySelectorAll('.p-homeSkill__img img')];
for (const img of imageArray) {
  const mesh = createMesh(img);
  imgScene.add(mesh);

  const imagePlane = new ImagePlane(mesh, img);
  imagePlane.setParams();

  imagePlaneArray.push(imagePlane);
}

function animate() {
  requestAnimationFrame(animate);
  time += 0.01;

  const amplitude = 0.3;
  const frequency = 0.7;

  // baseYを基準に上下移動（跳ねる）
  sphere.position.y = baseY.sphere + Math.sin(time * frequency) * amplitude;
  cone.position.y = baseY.cone + Math.sin(time * frequency + Math.PI / 2) * amplitude;
  cube.position.y = baseY.cube + Math.sin(time * frequency + Math.PI) * amplitude;
  cross.position.y = baseY.cross + Math.sin(time * frequency + (3 * Math.PI) / 2) * amplitude;

  // 回転も継続
  cross.rotation.y += 0.002;
  cross.rotation.x += -0.003;
  cube.rotation.y += 0.001;
  cube.rotation.x += 0.002;
  cone.rotation.y += 0.002;
  cone.rotation.x += 0.003;

  renderer.render(scene, camera);

  updateScroll();
  for (const plane of imagePlaneArray) {
    plane.update(scrollOffset);
  }

  renderer.render(imgScene, imgCamera);
}

animate();

// リサイズ対応
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});

// スクロール追従
let targetScrollY = 0;
let currentScrollY = 0;
let scrollOffset = 0;

const lerp = (start, end, multiplier) => {
  return (1 - multiplier) * start + multiplier * end;
};

const updateScroll = () => {
  targetScrollY = document.documentElement.scrollTop;
  currentScrollY = lerp(currentScrollY, targetScrollY, 0.1);

  scrollOffset = targetScrollY - currentScrollY;
};