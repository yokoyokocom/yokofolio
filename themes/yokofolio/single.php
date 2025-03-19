<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<div class="post-layout">
  <div class="post-layout__wrap">
    <div class="post-layout__flex">
      <main class="single-post__main">
        <div class="single-post__meta">
          <p class="single-post__date"><?php echo get_the_date('Y.m.d'); ?></p>
          <?php $singleCat = get_the_category(); ?>
          <p class="single-post__cat"><?php echo $singleCat[0]->name; ?></p>
        </div>
        <h1 class="single-post__title"><?php the_title(); ?></h1>
        <div class="single-post__content"><?php the_content(); ?></div>
      </main>
      <?php get_template_part('template-part/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>