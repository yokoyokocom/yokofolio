<?php
function theme_enqueue_styles() {
  wp_enqueue_style( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_date(filemtime(get_template_directory().'/assets/css/style.css')));
  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), NULL, true);
  wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), NULL, true);
  wp_enqueue_script( 'gsap-scroll', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js');
  wp_enqueue_script( 'parent', get_template_directory_uri() . '/assets/js/common.js', array(), NULL, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_theme_support('post-thumbnails');

function add_custom_post_type(){
  register_post_type(
    'works',
    array(
      'label' => '制作実績',
      'labels' => array(
        'add_new' => '新規制作実績を追加',
        'add_new_item' => '新規制作実績を追加',
        'search_items' => '制作実績の検索',
      ),
      'public' => true,
      'has_archive' => true,
      'menu_position' => 4,
      'menu_icon' => 'dashicons-admin-tools',
      'rewrite' => array('with_front' => true),
      'supports' => array(
        'title','thumbnail','page-attributes'
      ),
    )
  );
}
add_action('init','add_custom_post_type');