<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<main class="p-workSingle">
  <div class="p-worksSingle__inner l-inner fadeInUpScroll">
    <div class="p-worksSingle__thumb">
      <?php if(has_post_thumbnail()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="800" height="450" loading="lazy">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="800" height="450">
      <?php endif; ?>
    </div>
    <ul class="p-worksSingle__info">
      <li>
        <p class="p-worksSingle__title">サイト名</p>
        <p class="p-worksSingle__content"><?php the_title(); ?></p>
      </li>
      <?php if(get_field('worksUrl')): ?>
        <li>
          <p class="p-worksSingle__title">サイトURL</p>
          <p class="p-worksSingle__content"><a href="<?php the_field('worksUrl'); ?>" target="_blank" rel="noopener"><?php the_field('worksUrl'); ?></a></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksLang')): ?>
        <li>
          <p class="p-worksSingle__title">使用言語</p>
          <p class="p-worksSingle__content"><?php the_field('worksLang'); ?></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksTime')): ?>
        <li>
          <p class="p-worksSingle__title">制作期間</p>
          <p class="p-worksSingle__content"><?php the_field('worksTime'); ?></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksComment')): ?>
        <li>
          <p class="p-worksSingle__title">コメント</p>
          <p class="p-worksSingle__content"><?php the_field('worksComment'); ?></p>
        </li>
      <?php endif; ?>
    </ul>
    <div class="p-worksSingle__other">
      <?php previous_post_link('%link','< 前の記事へ'); ?>
      <?php next_post_link('%link','次の記事へ >'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>