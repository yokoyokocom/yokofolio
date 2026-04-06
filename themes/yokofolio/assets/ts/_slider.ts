declare const Splide: any;

export function workSlider(): void {
  const workList = document.querySelector('.p-homeWork__list');
  if(workList){
    const splideList = workList.querySelector('.splide__list');
    const workListItems = splideList ? splideList.children.length : 0;
    const worksSlide = new Splide(workList,{
      arrows: false,
      autoplay: workListItems > 2 ? true : false,
      fixedWidth: true,
      focus: 'center',
      interval: 2000,
      speed: 1500,
      type: workListItems > 2 ? 'loop' : 'slide',
      updateOnMove: true,
    });
    worksSlide.mount();
  }
}