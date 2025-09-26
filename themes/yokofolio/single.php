<?php get_header(); ?>

<?php get_template_part('template-part/breadcrumbs'); ?>

<div class="l-post">
  <div class="l-post__inner l-inner">
    <div class="l-post__flex">
      <main class="p-postSingle__main">
        <div class="p-postSingle__meta">
          <p class="p-postSingle__date"><?php echo get_the_date('Y.m.d'); ?></p>
          <?php $singleCat = get_the_category(); ?>
          <p class="p-postSingle__cat"><?php echo $singleCat[0]->name; ?></p>
        </div>
        <h1 class="p-postSingle__title"><?php the_title(); ?></h1>
        <div class="p-postSingle__content"><?php the_content(); ?></div>
      </main>
      <?php get_template_part('template-part/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>