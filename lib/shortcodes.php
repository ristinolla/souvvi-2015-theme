<?php

// [spotify track=""]
function souvvi_spotify_shortcode( $atts ) {
  extract( shortcode_atts( array(
    'uri' => 'something',
  ), $atts ) );

  return '<iframe src="https://embed.spotify.com/?uri=' . $uri . '" width="1000" height="180" frameborder="0" allowtransparency="true"></iframe>
  ';
}
add_shortcode( 'spotify', 'souvvi_spotify_shortcode' );


/*
function row_shortcode($atts, $content = null) {
   extract( shortcode_atts( array(
      'first' => false,
   ), $atts ) );
   if($first == "true" || $first == true){
      return '<div class="row"><div class="col-xs-12 col-sm-6">' . do_shortcode($content) . '</div>';
   } else {
      return '<div class="col-xs-12 col-sm-6">' . do_shortcode($content) . '</div></div>';
   }
}
*/
function row_shortcode($atts, $content = null) {
  extract( shortcode_atts( array(
    'first' => false,
  ), $atts ) );

  return '<section class="row">' . do_shortcode($content) . '</section>';
}
add_shortcode('row', 'half_page_shortcode');

function half_page_shortcode($atts, $content = null) {
   extract( shortcode_atts( array(
      'first' => false,
   ), $atts ) );

    return '<div class="half">' . do_shortcode($content) . '</div>';
}
add_shortcode('half', 'half_page_shortcode');

function full_page_shortcode($atts, $content = null) {
   extract( shortcode_atts( array(
      'first' => false,
   ), $atts ) );

    return '<section class="full">' . do_shortcode($content) . '</section>';
}
add_shortcode('full', 'full_page_shortcode');



function author_img_list_shortcode($atts) {
   extract( shortcode_atts( array(
      'exclude' => false,
   ), $atts ) );
   if (function_exists("get_xo_user_list")) {
     return get_xo_user_list();
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('author_img_list', 'author_img_list_shortcode');
