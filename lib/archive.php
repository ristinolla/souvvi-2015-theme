<?php


/**


*/

function xo_montly_list($args)
  {
    $defaults = array();
    $args = wp_parse_args($args, $defaults);
    extract( $args, EXTR_SKIP );
    ?>
      <h2>Monthly</h2>
      <ul>
      <?php
      $args = array(
        'type' => 'monthly',
        'show_post_count' => true
        );

      wp_get_archives($args); ?>
      </ul>
    <?php
  }

function xo_montly_list_shortcode($atts) {
   extract( shortcode_atts( array(
      'exclude' => false,
   ), $atts ) );
   if (function_exists("xo_montly_list")) {
     return xo_montly_list($atts);
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('monthly_list', 'xo_montly_list_shortcode');



/**


*/

function xo_category_list($args)
 {
    $defaults = array();
    $args = wp_parse_args($args, $defaults);
    extract( $args, EXTR_SKIP );
   ?>

      <h2>Categories</h2>
      <ul>
      <?php $args = array(
          'show_option_all'    => '',
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => 1,
          'hide_empty'         => 1,
          'use_desc_for_title' => 1,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => '',
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => true,
          'title_li'           => __( '' ),
          'show_option_none'   => __('No categories'),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'category',
          'walker'             => null
        );
        wp_list_categories($args); ?>
      </ul>

   <?php
 }

function xo_category_list_shortcode($atts) {
   extract( shortcode_atts( array(
      'exclude' => false,
   ), $atts ) );
   if (function_exists("xo_category_list")) {
     return xo_category_list($atts);
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('category_list', 'xo_category_list_shortcode');


/**


*/

function xo_author_list($args)
{

  $defaults = array();
  $args = wp_parse_args($args, $defaults);
  extract( $args, EXTR_SKIP );
  ?>
  <h2>Authors</h2>
      <ul>
       <?php $args = array(
            'orderby'       => 'name',
            'order'         => 'ASC',
            'number'        => null,
            'optioncount'   => false,
            'exclude_admin' => true,
            'show_fullname' => false,
            'hide_empty'    => true,
            'echo'          => true,
            'html'          => true
           ); ?>
         <?php wp_list_authors( $args ); ?>
      </ul>


  <?php
}

function xo_author_list_shortcode($atts) {
   extract( shortcode_atts( array(
      'exclude' => false,
   ), $atts ) );
   if (function_exists("xo_author_list")) {
     return xo_author_list($atts);
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('author_list', 'xo_author_list_shortcode');

/**

    All post

*/

function xo_all_posts_list($args)
{

  $defaults = array();
  $args = wp_parse_args($args, $defaults);
  extract( $args, EXTR_SKIP );
  ?>
    <h2>All posts</h2>
      <ul>
      <?php
        $args = array(
          'type' => 'alpha',
          'order' => 'ASC'
        );
      wp_get_archives($args); ?>
      </ul>
<?php
}

function xo_all_posts_list_shortcode($atts) {
   extract( shortcode_atts( array(
      'atoz' => true,
   ), $atts ) );
   if (function_exists("xo_all_posts_list")) {
     return xo_all_posts_list($atts);
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('all_posts_list', 'xo_all_posts_list_shortcode');


/**

    ACCORDION

*/



function xo_archive_accordion($args)
{
  $defaults = array();
  $args = wp_parse_args($args, $defaults);
  extract( $args, EXTR_SKIP );
  ?>

  <div class="accordion hidden-desktop hidden-tablet" id="mobile-archive">

    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#mobile-archive" href="#monthly">
          <h2>Monthly</h2>
        </a>
      </div>
      <div id="monthly" class="accordion-body collapse">
        <div class="accordion-inner">
         <ul>
          <?php
      $args1 = array(
        'type' > 'monthly',
        'show_post_count' > true
        );

      wp_get_archives($args1); ?>
         </ul>
        </div>
      </div>
    </div>

    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#mobile-archive" href="#tags">
          <h2>Authors</h2>
        </a>
      </div>
      <div id="tags" class="accordion-body collapse">
        <div class="accordion-inner">
        <ul>
          <?php $args = array(
            'orderby'       => 'name',
            'order'         => 'ASC',
            'number'        => null,
            'optioncount'   => false,
            'exclude_admin' => true,
            'show_fullname' => false,
            'hide_empty'    => true,
            'echo'          => true,
            'html'          => true
           ); ?>
         <?php wp_list_authors( $args ); ?>
        </ul>
        </div>
      </div>
   </div>

    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#mobile-archive" href="#categories">
          <h2>Categories</h2>
        </a>
      </div>
      <div id="categories" class="accordion-body collapse">
        <div class="accordion-inner">
          <ul>
                <?php $args = array(
          'show_option_all'    => '',
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => 1,
          'hide_empty'         => 1,
          'use_desc_for_title' => 1,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => '',
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => true,
          'title_li'           => __( '' ),
          'show_option_none'   => __('No categories'),
          'number'             => null,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'category',
          'walker'             => null
        );
        wp_list_categories($args); ?>
          </ul>
        </div>
      </div>
    </div>




   <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#mobile-archive" href="#allposts">
          <h2>All posts</h2>
        </a>
      </div>
      <div id="allposts" class="accordion-body collapse">
        <div class="accordion-inner">
        <ul>
          <?php
        $args2 = array(
          'type' => 'alpha',
          'order' => 'ASC'
        );
      wp_get_archives($args2); ?>
        </ul>
        </div>
      </div>
    </div>

<?php }

function xo_archive_accordion_shortcode($atts) {
   extract( shortcode_atts( array(
      'exclude' => false,
   ), $atts ) );
   if (function_exists("xo_archive_accordion_shortcode")) {
     return xo_archive_accordion_shortcode($exclude);
   } else {
     return "Shortcode not instaled, user_list function not found";
   }
}
add_shortcode('archive_accordion', 'xo_archive_accordion_shortcode');
