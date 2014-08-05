<?php
/**
 * xo-user modifications
 *
 * Souvvi 2013
 * @return .
 */

function modify_contact_methods($profile_fields) {

  // Add new fields
  $profile_fields['twitter']          = __('Twitter Username' ,'xo');
  $profile_fields['facebook']         = __('Facebook URL'     ,'xo');
  $profile_fields['gplus']            = __('Google+ URL'      ,'xo');
  $profile_fields['lastfm']           = __('Last FM username' ,'xo');
  $profile_fields['flickr']           = __('Flickr username'  ,'xo');
  $profile_fields['behance']          = __('Behance Username' ,'xo');
  $profile_fields['extra_url']        = __('Additional URL'   ,'xo');
  $profile_fields['extra_url_title']  = __('Additional URL Title (optional)','xo');
  $profile_fields['vimeo']            = __('Vimeo username'   ,'xo');
  $profile_fields['youtube']          = __('Youtube username' ,'xo');
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
              $service,                                   //twitter
              $urls[$service] . '' . $user_metas[$service][0],   //username
              $user_metas['first_name'][0]             //authorname
            );
      echo $after_item;
    }
  }
  echo '</ul>';

  if( isset( $after_list )){
      echo $after_list;
  }


} // user meta list end



?>
