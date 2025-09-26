<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<div class="l-post">
  <div class="l-post__inner l-inner">
    <div class="l-post__flex">
      <main class="p-postArchive__main">
        <?php
        $archiveCat = get_queried_object();
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'posts_per_page' => 10,
          'category_name' => $archiveCat->slug,
          'paged' => $paged,
        );
        $archiveQuery = new WP_Query($args);
        if($archiveQuery->have_posts()):
        ?>
        <div class="p-postArchive__list">
          <?php while($archiveQuery->have_posts()): $archiveQuery->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
              <div class="p-postArchive__thumb">
                <?php if(has_post_thumbnail()): ?>
                  <img src="<?php the_post_thumbnail_url('shop-image'); ?>" alt="<?php the_title(); ?>記事のサムネイル画像" loading="lazy" width="374" height="226">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/temp/no-image.webp" alt="no image" width="388" height="218" loading="lazy">
                <?php endif; ?>
              </div>
              <time class="p-postArchive__time" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
              <p class="p-postArchive__title"><?php the_title(); ?></p>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php else: ?>
          <p class="p-postArchive__none"><?php echo $archiveCat->name; ?>は準備中です。</p>
        <?php endif; ?>
      </main>
      <?php get_template_part('template-part/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>