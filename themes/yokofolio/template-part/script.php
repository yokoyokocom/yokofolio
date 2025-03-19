<?php if(is_front_page()): ?>
  <script>
    const worksSlide = new Splide('.work__list',{
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
  </script>
<?php endif; ?>