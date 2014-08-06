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
function half_page_shortcode($atts, $content = null) {
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

function half_page_shortcode($atts, $content = null) {
   extract( shortcode_atts( array(
      'first' => false,
   ), $atts ) );

    return '<section class="half col-xs-12 col-sm-6">' . do_shortcode($content) . '</section>';
}
add_shortcode('half', 'half_page_shortcode');
