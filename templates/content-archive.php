<li class="post-tile" >

  <a href="<?php echo get_the_permalink(); ?>">
     <?php

        if(has_post_thumbnail()){
          $hero_id = get_post_thumbnail_id();
          $hero_img_url = wp_get_attachment_image_src( $hero_id,'medium' );
          $hero_img_url = $hero_img_url[0];
        } elseif( get_post_custom_values("featured_url")[0] ) {
           $hero_img_url = get_post_custom_values("featured_url")[0];
        } else {
          $hero_img_url = get_template_directory_uri() . '/assets/img/placeholder.png';
        }

        ?>
    <div class="post-thumb" data="square" style="background-image: url('<?php echo esc_url($hero_img_url); ?>');">
    </div>
    <div class="header">
      <h3><?php the_title(); ?></h3>
      <span>by <?php echo get_the_author(); ?></span>
      <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php printf(__('%s ago', 'roots'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></time>

    </div>
  </a>
</li>
