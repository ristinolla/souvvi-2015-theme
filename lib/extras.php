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
    'caption' => '',
    'align'   => 'alignnone'
  );

  $attr = shortcode_atts($defaults, $attr);

  // If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
  if ($attr['width'] < 1 || empty($attr['caption'])) {
    return $content;
  }

  // Set up the attributes for the caption <figure>
  $attributes  = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '' );
  $attributes .= ' class="wp-caption ' . esc_attr($attr['align']) . '"';
  $output  = '<figure' . $attributes .' style="max-width: ' . $attr['width']. 'px;">';
  /* Check if it is an attacment */
  if( !empty($attr['id']) ){
    $output .= xo_responsive_image($attr, $content);
  } else {
    $output .= do_shortcode($content);
  }
  $output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
  $output .= '</figure>';

  return $output;
}
add_filter('img_caption_shortcode', 'roots_caption', 10, 3);


// Responsive image
function  xo_responsive_image($attr, $content){

  $attachment_id = explode("_", $attr['id'])[1];

  $img_full = wp_get_attachment_image_src( $attachment_id , 'full' );
  $img_small = wp_get_attachment_image_src( $attachment_id , 'large' );

  $output = sprintf('<img src="%1$s" srcset="%1$s %2$sw, %3$s %4$sw" alt="%5$s" id="%6$s" rel="%6$s">',
            esc_url( $img_small[0] ),
            $img_small[1],
            esc_url( $img_full [0] ),
            $img_full[1],
            esc_attr($attr['caption']),
            esc_attr($attr['id'])
          );
  return $output;
}


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


/**
 * Facebook head script head scripts
 */

function addthis_scripts(){
  ?>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546f51e739399f5b" async="async"></script>
<?php
}
add_action('wp_head', 'addthis_scripts');


/**
 * RELATIVE ROOT URL
 */

function get_relative_url($var){
  $url = home_url( $path = $var, $scheme = "relative" );
  return $url;
}


/**
 * Souvvi get url and replace with author url if not given
 */

 function souvvi_get_author_url(){

   if(!get_the_author_meta('user_url')){
     return get_author_posts_url(get_the_author_meta('ID'));
   };
   return get_the_author_meta('user_url', get_the_author_meta('ID') );

 }


 /**
  * META BOXES
  */



function souvvi_post_guide_add() {
  add_meta_box( 'souvvi-post-guide', 'Souvvi - Postaus ohje', 'souvvi_post_guide_cb', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'souvvi_post_guide_add' );

function souvvi_post_guide_cb( $post ){
  ?>
  <div>
    <h3>Video-ohje: <a href="#">ffff</a></h3>
    <h3>Postausohje</h3>
    <ol>
      <li>Optimoi kuvat esim. Lightroomin export toiminolla tai sitten iPhoton "Vie" toiminnolla. </li>
      <li>Lataa kuvat käyttäen "Add Media" -painiketta (ei enään suoria linkkejä)</li>
      <li>Aseta kuvan kooksi LARGE.</li>
      <li>Valitse myös "Featured Image" oikealla olevasta laatikosta.</li>
      <li>Aseta haluamasi kategoriat ja tagit</li>
    </ol>

    <h3>Huomioita</h3>
    <ul style="list-style-type:square; padding-left: 40px;">
      <li>Kuvien maksimi koko on <strong>2mt</strong> Kuvan resoluution tulisi olla kuitenkin ainakin <strong>1600px</strong>  pidemmältä kantilta.</li>
      <li>Kuvatekstilliset kuvat menevät automaattisesti mahdollisimman leveäksi.</li>
      <li>Ilman kuvatekstiä laitetut kuvat ovat tekstin levyisiä (kapeita)</li>
      <li><strong>[full]tähän kuva[/full]</strong> shortcodea käyttämällä voit saada kuvan leveäksi ilman kuvatekstiä</li>
      <li>Kuvia saa latettua myös rinnakkain seuraaville shortcodeilla
        <ul style="list-style-type: disc; padding: 10px 0 10px 20px;">
          <li><strong>[row][half] kuva tähän [/half][half] kuva tähän [/half][/row]</strong></li>
          <li><strong>[row][third] kuva tähän [/third][third] kuva tähän [/third][third] kuva tähän [/third][/row]</strong></li>
        </ul>
      </li>
      <li>käytä rivin jälkeen vain kerran Enteriä. Kappaleiden (paragraph) ja kuvien väliin tulee automaattisesti sopiva väli.</li>
      <li>SHIFT+Enter saat uuden rivin ilman että aloitat uutta kappaletta</li>
      <li>Kategorioita lisätään mahdollisimman harvoin ja on yläatson kategoria, mutta jos jokin kategoria puuttuu niin lisää vain.</li>
      <li>Tageja taas voi laitta enemmän ja näillä sidotaan esimerkiksi samasta paikasta postatut postaukset tai esimerkiksi kaikki surffaus postaukset.</li>
    </ul>
  </div>
  <?
}
