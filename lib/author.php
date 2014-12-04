<?php
/**
 * xo-user modifications
 *
 * Souvvi 2013
 * @return .
 */

function modify_contact_methods($profile_fields) {

  // Add new fields
  $profile_fields['twitter']          = __('Twitter Profile Url' ,'xo');
  $profile_fields['facebook']         = __('Facebook Profile Url'     ,'xo');
  $profile_fields['gplus']            = __('Google+ Profile Url'      ,'xo');
  $profile_fields['lastfm']           = __('Last FM Profile Url' ,'xo');
  $profile_fields['flickr']           = __('Flickr Profile Url'  ,'xo');
  $profile_fields['behance']          = __('Behance Profile Url' ,'xo');
  $profile_fields['extra_url']        = __('Additional URL'   ,'xo');
  $profile_fields['extra_url_title']  = __('Additional URL Title (optional)','xo');
  $profile_fields['vimeo']            = __('Vimeo Profile Url'   ,'xo');
  $profile_fields['youtube']          = __('Youtube Profile Url' ,'xo');
  $profile_fields['avatar_url']          = __('Avatar ID (Use medium size)' ,'xo');
  // Remove old fields

  unset($profile_fields['aim']);
  unset($profile_fields['yim']);
  unset($profile_fields['jabber']);
  return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

/*

// Retrieve a custom field value
$twitterHandle = get_the_author_meta('twitter');

*/


/**

  PRINT USER META LIST

**/


function user_meta_list($user_id, $args)
{
  # code...
  $defaults = array(
    'metas'     => array(
                  'twitter',
                  'facebook',
                  'gplus',
                  'lastfm',
                  'flickr',
                  'behance',
                  'vimeo',
                  'youtube'
                  ),
    'fa'             => true,
    'before_list'    => '',
    'after_list'     => '',
    'ul_class'       => '',
    'linktext'     => __('%3$s\'s %1$s-profile', 'xo'),
    'before_item'    => '<li>',
    'after_item'     => '</li>'
  );

  $urls = array(
    'twitter'         => __('https://twitter.com/','xo'),
    'facebook'        => __('https://facebook.com/','xo'),
    'gplus'           => __('https://plus.google.com/+','xo'),
    'lastfm'          => __('http://www.last.fm/user/','xo'),
    'flickr'          => __('https://www.flickr.com/photos/','xo'),
    'behance'         => __('https://www.behance.com/','xo'),
    'vimeo'           => __('http://www.vimeo.com/','xo'),
    'youtube'         => __('http://www.youtube.com/user/','xo')
  );

  $args = wp_parse_args($args, $defaults);
  extract( $args, EXTR_SKIP );

  $user_metas = get_user_meta($user_id);

  if( isset( $before_list )) {
      echo $before_list;
  }

  echo '<ul class="' . $ul_class . '">';
  foreach ($metas as $key => $service) {
    # code...

    if($user_metas[$service][0] != "") {


      echo $before_item;
      printf('<a href="%2$s" title="%3$s">' . $linktext . '</a>',
              $service,                                 //twitter
              esc_url($user_metas[$service][0]),        //username
              $user_metas['first_name'][0]              //authorname
            );
      echo $after_item;
    }
  }
  echo '</ul>';

  if( isset( $after_list )){
      echo $after_list;
  }


} // user meta list end



/**

  User last posts

**/

function pr_user_newest_posts($args)
{

  wp_reset_postdata();
  $defaults = array(
    'post_type' => "post",
    'length' => 4,
    'order' => 'DESC',
    'before_item' => '<li>',
    'after_item' => '</li>',
    'before_list' => '<ul>',
    'after_before' => '</ul>',
    'date_format' => 'j.m.Y',
    'category_name' => "",
    'posts_per_page' => 4,
    'author' => 1
  );

  // todo, mahollisuus listata myös pr_eventtejä nopsaa desc
  $args = wp_parse_args($args, $defaults);
  extract( $args, EXTR_SKIP );



  $queryargs = array(
    'post_type' => $post_type,
    'posts_per_page' => $length,
    'order' => $order,
    'category_name' => $category_name,
    'author' => $author
  );


  //echo var_dump($queryargs);
  $event_query = new WP_Query( $queryargs );

  //loop
  if ( $event_query -> have_posts() ):

    if( isset( $before_list )) {
      echo $before_list;
    }

    while ( $event_query->have_posts() ) :
      $event_query->the_post();
      get_template_part('templates/content', 'archive');
    endwhile;

    if( isset( $after_list )){
      echo $after_list;
    }

  endif;

  //
  wp_reset_postdata();


}

function xo_user_avatar_url($user_id, $size){
  $jou = get_user_meta($user_id);
  $img_url = wp_get_attachment_image_src( $jou['avatar_url'][0], $size, false );

  return esc_url($img_url[0]);
}




/**

  USER LIST

**/

function xo_user_list()
{
  # code...

  $args = array(
    'blog_id'      => 1,
    'meta_key'     => 'avatar_url',
    'orderby'      => 'nicename',
    'order'        => 'ASC',
    'exclude'      => array(1, 15, 13)
   );
  echo '<ul class="list-inline list-authors">';

  $blogusers = get_users($args);
  // Array of WP_User objects.
  foreach ( $blogusers as $user ) {

    ?>
    <li class="biophoto">
      <a href="<?php echo $user->user_url; ?>">
        <img class="img-circle" src="<?php echo xo_user_avatar_url($user->ID, 'thumbnail'); ?>" alt="">
        <h3 class="text-center"><?php echo $user->first_name; ?> </h3>
      </a>
    </li>
   <?
  }

  echo "</ul>";

}

?>
