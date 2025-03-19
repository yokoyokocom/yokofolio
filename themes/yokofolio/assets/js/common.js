const mvAnime = document.querySelector(".mv__anime");
if(mvAnime){
  const tl = gsap.timeline();
  tl.to(".mv__anime .item",{
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
  .to(".mv__text",{
    duration: 1.5,
    opacity: 1,
  })
  .to(".mv__mark",{
    duration: 1.5,
    opacity: 1,
  },"<");
}

const rellax = new Rellax('.js-rellax');


