<!DOCTYPE html>
<html lang="ja">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-TDT2P79L');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700;900&family=Gasoek+One&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDT2P79L"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header class="p-header">
    <div class="p-header__bg">
      <div class="p-header__inner l-inner">
        <div class="p-header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">Yoko PortFolio</a>
        </div>
        <nav class="p-header__nav">
          <ul>
            <li><a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></li>
            <li><a href="<?php echo esc_url(home_url('/works/')); ?>">制作実績</a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <?php if(!is_front_page() && !is_singular('post')): ?>
    <div class="c-pageTitle">
      <div class="c-pageTitle__bg">
        <div class="c-pageTitle__inner">
          <?php
          $postType = get_post_type();
          if(is_404()){
            $pageTitle = '404';
          } elseif($postType == 'works'){
            if(is_archive()){
              $pageTitle = '制作実績一覧';
            } else {
              $pageTitle = '制作実績「'.get_the_title().'」';
            }
          } elseif($postType == 'post'){
            $postCat = get_queried_object();
            $pageTitle = $postCat->name.'一覧';
          } else {
            $pageTitle = get_the_title();
          }
          ?>
          <h1 class="c-pageTitle__head fadeInScroll"><?php echo $pageTitle; ?></h1>
        </div>
      </div>
    </div>
  <?php endif; ?>
