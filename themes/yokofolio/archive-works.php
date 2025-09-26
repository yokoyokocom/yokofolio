<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<main class="p-worksArchive">
  <div class="p-worksArchive__inner l-inner">
    <div class="p-worksArchive__list">
      <?php
      $args = array(
        'post_type' => 'works',
        'posts_per_page' => 10,
      );
      $worksQuery = new WP_Query($args);
      if($worksQuery->have_posts()): ?>
        <?php while($worksQuery->have_posts()): $worksQuery->the_post(); ?>
          <div class="p-worksArchive__item fadeInUpScroll">
            <div class="p-worksArchive__thumb">
              <?php if(has_post_thumbnail()): ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" width="388" height="218" loading="lazy">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="388" height="218" loading="lazy">
              <?php endif; ?>
            </div>
            <p class="p-worksArchive__title"><?php the_title(); ?></p>
            <div class="p-worksArchive__content">
              <p class="p-worksArchive__name">使用言語</p>
              <p class="p-worksArchive__text"><?php the_field('worksLang'); ?></p>
            </div>
            <div class="p-worksArchive__content">
              <p class="p-worksArchive__name">制作期間</p>
              <p class="p-worksArchive__text"><?php the_field('worksTime'); ?></p>
            </div>
            <a class="p-worksArchive__btn c-linkBtn" href="<?php the_permalink(); ?>">詳細を見る</a>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
<main>

<?php get_footer(); ?>