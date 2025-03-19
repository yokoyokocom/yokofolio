<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<main class="works-post">
  <div class="works-post__wrap fadeInUpScroll">
    <div class="works-post__thumb">
      <?php if(has_post_thumbnail()): ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="800" height="450" loading="lazy">
      <?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="800" height="450">
      <?php endif; ?>
    </div>
    <ul class="works-post__info">
      <li>
        <p class="works-post__title">サイト名</p>
        <p class="works-post__content"><?php the_title(); ?></p>
      </li>
      <?php if(get_field('worksUrl')): ?>
        <li>
          <p class="works-post__title">サイトURL</p>
          <p class="works-post__content"><a href="<?php the_field('worksUrl'); ?>" target="_blank" rel="noopener"><?php the_field('worksUrl'); ?></a></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksLang')): ?>
        <li>
          <p class="works-post__title">使用言語</p>
          <p class="works-post__content"><?php the_field('worksLang'); ?></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksTime')): ?>
        <li>
          <p class="works-post__title">制作期間</p>
          <p class="works-post__content"><?php the_field('worksTime'); ?></p>
        </li>
      <?php endif; ?>
      <?php if(get_field('worksComment')): ?>
        <li>
          <p class="works-post__title">コメント</p>
          <p class="works-post__content"><?php the_field('worksComment'); ?></p>
        </li>
      <?php endif; ?>
    </ul>
    <div class="works-post__other">
      <?php previous_post_link('%link','< 前の記事へ'); ?>
      <?php next_post_link('%link','次の記事へ >'); ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>