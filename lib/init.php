<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
    'some_nav' => __('Social media nav', 'roots'),
    'footer_menu' => __('Footer Menu', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 250, 250);
  }

  add_image_size( 'category-thumb', 500, 100, false);

  $args = array(
    'flex-width'    => true,
    'width'         => 1400,
    'flex-height'   => true,
    'height'        => 500,
    'default-image' => get_template_directory_uri() . '/assets/img/header.jpg',
  );
  add_theme_support( 'custom-header', $args );

  add_theme_support( 'html5', array( 'search-form', 'gallery') );


  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-styles.css');

/*
  add_theme_support( 'infinite-scroll', array(
    'type'           => 'click',
    'footer'         => 'site-footer',
    'container'      => 'content',
    'wrapper'        => false,
  ) );
*/
  add_theme_support( 'infinite-scroll', array(
    'container' => 'content',
    'footer' => 'page',
  ) );

}
add_action('after_setup_theme', 'roots_setup');




/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
