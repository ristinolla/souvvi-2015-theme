<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
//add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Custom excerpt
 *
 *
 */

function xo_excerpt_length( $length ) {
  return 12;
}
add_filter( 'excerpt_length', 'xo_excerpt_length', 999 );

function xo_excerpt_more( $excerpt ) {
  return '...';
}
add_filter( 'excerpt_more', 'xo_excerpt_more' );



/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);



/**
 * Wrap embedded media as suggested by Readability
 *
 * @link https://gist.github.com/965956
 * @link http://www.readability.com/publishers/guidelines#publisher
 */
function roots_embed_wrap($cache, $url, $attr = '', $post_ID = '') {
  return '<div class="entry-content-asset">' . $cache . '</div>';
}
add_filter('embed_oembed_html', 'roots_embed_wrap', 10, 4);

/**
 * Add Bootstrap thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 *
 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
 */
function roots_caption($output, $attr, $content) {
  if (is_feed()) {
    return $output;
  }

  $defaults = array(
    'id'      => '',
    'align'   => 'alignnone',
    'width'   => '',
    'caption' => ''
  );

  $attr = shortcode_atts($defaults, $attr);

  // If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
  if ($attr['width'] < 1 || empty($attr['caption'])) {
    return $content;
  }

  // Set up the attributes for the caption <figure>
  $attributes  = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr($attr['align']) . '"';
  //$attributes .= ' style="width: ' . esc_attr($attr['width']) . 'px"';

  $output  = '<figure' . $attributes .'>';
  $output .= do_shortcode($content);
  $output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
  $output .= '</figure>';

  return $output;
}
add_filter('img_caption_shortcode', 'roots_caption', 10, 3);



/**
 * Checks if ajax comments and then serve the comments accordingly
 *
 *
 *
 */

function get_ajax_comments($url) {

  while (have_posts()) : the_post();
    comments_template('/templates/comments.php');
  endwhile;
}

// Method to handle comment submission
function ajaxComment($comment_ID, $comment_status) {
  // If it's an AJAX-submitted comment
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){


    // Kill the script, returning the comment HTML
    switch( $comment_status ) {
      case '0':
          //notify moderator of unapproved comment
          $status = array('status' => "moderate");

          wp_notify_moderator( $comment_ID );
          break;
      case '1': //Approved comment
          $status = array('status' => "success");

          wp_notify_postauthor( $comment_ID );
          break;
      default:
          $status = array('status' => "error");

    }
    echo json_encode($status);

    exit;
  }
}

// Send all comment submissions through my "ajaxComment" method
add_action('comment_post', 'ajaxComment', 20, 2);



/**
 * Grabs the image
 *
 *
 */

function souvvi_img_grabber() {
  if ( ! preg_match( '/<img\s[^>]*?src=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
    return false;
  return esc_url_raw( $matches[1] );
}

function souvvi_get_photos() {
  if ( ! preg_match_all( '/<img\s[^>]*?src=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
    return false;
  return;
}


function xo_img_src_grab($data) {
  if ( ! preg_match( '/<img\s[^>]*?src=[\'"](.+?)[\'"]/is', $data, $matches ) )
    return false;
  return esc_url_raw( $matches[1] );
}





/**
 * Custom imagename. not working
 *
 *
 */

add_filter( 'image_size_names_choose', 'xo_custom_img_sizes' );
function xo_custom_img_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'category-thumb' => __('Category thumbnail', 'roots'),
    ) );
}

function xo_featured_image($postID, $size)
{
  # code...
  $img_arr = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'large');
  $default_url = get_template_directory() . '/assets/img/placeholder.png';

  $img_src = ($img_arr) ? $img_arr[0] : $default_url ;

  return $img_src;
}





