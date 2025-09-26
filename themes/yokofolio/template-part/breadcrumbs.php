<?php
  $postType = get_post_type();
  $archiveCat = get_queried_object();
?>

<div class="c-bread">
  <div class="c-bread__inner l-inner">
    <ul class="c-bread__list fadeInScroll">
      <li class="c-bread__item"><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
      <li class="c-bread__arrow"></li>
      <?php $breadId = array_reverse(get_post_ancestors( $post )); ?>
      <?php foreach($breadId as $id): ?>
        <li class="c-bread__item"><a href="<?php echo get_page_link( $id );?>" ><?php echo get_page($id)->post_title; ?></a></li>
        <li  class="c-bread__arrow"></li>
      <?php endforeach ?>
      <?php if($postType == 'works'): ?>
        <?php if(is_archive()): ?>
          <li class="c-bread__item">制作実績一覧</li>
        <?php else: ?>
          <li class="c-bread__item"><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績一覧</a></li>
          <li class="c-bread__arrow"></li>
          <li><?php the_title(); ?></li>
        <?php endif; ?>
      <?php elseif (is_category() || is_tag()): ?>
        <li class="c-bread__item"><?php echo $archiveCat->name; ?></li>
      <?php elseif (is_single()): ?>
        <?php $postCat = get_the_category(); ?>
        <li class="c-bread__item"><a href="<?php echo esc_url(home_url('/'.$postCat[0]->slug.'/')); ?>"><?php echo $postCat[0]->name; ?></a></li>
        <li class="c-bread__arrow"></li>
        <li><?php the_title(); ?></li>
      <?php elseif (is_search()): ?>
        <li class="c-bread__item">キーワード検索</li>
      <?php elseif (is_404()): ?>
        <li class="c-bread__item">404 Not Found</li>
      <?php else: ?>
        <li class="c-bread__item"><?php the_title(); ?></li>
      <?php endif; ?>
    </ul>
  </div>
</div>