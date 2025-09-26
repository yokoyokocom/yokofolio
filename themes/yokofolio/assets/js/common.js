const mvAnime = document.querySelector(".p-homeMv__anime");
if(mvAnime){
  const tl = gsap.timeline();
  tl.to(".p-homeMv__anime .item",{
    duration: .5,
    delay: .75,
    opacity: 0,
    scale: .5,
    stagger: {
      each: .2,
      from: "random",
      grid: "auto",
    }
  })
  .to("h1 span",{
    duration: .5,
    y: 0,
    ease: "back.out",
    stagger: {
      each: .1,
    }
  },"-=0.5")
  .to(".p-homeMv__text",{
    duration: 1.5,
    opacity: 1,
  })
  .to(".p-homeMv__mark",{
    duration: 1.5,
    opacity: 1,
  },"<");
}

const workList = document.querySelector('.p-homeWork__list');
if(workList){
  const worksSlide = new Splide(workList,{
    arrows: false,
    autoplay: true,
    fixedWidth: true,
    focus: 'center',
    interval: 2000,
    speed: 1500,
    type: 'loop',
    updateOnMove: true,
  });
  worksSlide.mount();
}

function scrollAnimation(className, offset){
  const scrollElements = document.querySelectorAll('.' + className);
  scrollElements.forEach(function(scrollElement){
    const elemPos = scrollElement.getBoundingClientRect().top + window.scrollY;
    const scroll = window.scrollY;
    const windowHeight = window.innerHeight;
    if(scroll >= elemPos - windowHeight + offset){
      scrollElement.classList.add('is_active');
    }
  });
}
window.addEventListener('scroll', function(){
  scrollAnimation('a-set', 100);
});
window.addEventListener('DOMContentLoaded',function(){
  scrollAnimation('a-set', 100);
});