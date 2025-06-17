import * as THREE from 'three';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
camera.position.set(0, 0, 4.5);

const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
const container = document.querySelector('.c-siteBg');
container.appendChild(renderer.domElement);

// Ambient Light（全体の柔らかい光）
const ambientLight = new THREE.AmbientLight(0xffffff, 1);
scene.add(ambientLight);

// メインのDirectional Light（太陽光イメージ）
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

sphere.position.set(-5.5, 1.75, 0);
cone.position.set(-3, -2, 0);
cube.position.set(3, 2.25, 0);
cross.position.set(5.5, -1.75, 0);

// 初期のY座標を保存
const baseY = {
  sphere: sphere.position.y,
  cone: cone.position.y,
  cube: cube.position.y,
  cross: cross.position.y,
};

let time = 0;

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
}

animate();

// リサイズ対応
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});