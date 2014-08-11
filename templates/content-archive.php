<li class="post-tile" >

  <a href="<?php echo get_the_permalink(); ?>">
    <?php
     if(has_post_thumbnail()){
       $hero_id = get_post_thumbnail_id( get_the_author_meta('ID'));
       $hero_img_url = wp_get_attachment_image_src( $post->ID, "medium" );

     } else {
       $hero_img_url = get_template_directory_uri() . '/assets/img/placeholder.png';
     }
     ?>
    <div class="post-thumb" data="square" style="background-image: url(<?php echo $hero_img_url; ?>);">
      <?php the_post_thumbnail( array(500, 500) );?>
    </div>
    <div class="header">
      <h3><?php the_title(); ?></h3>
      <span class="author-name"><?php sprintf(__('by %s', 'roots'), get_the_author() ); ?></span>
      <?php the_excerpt(); ?>
    </div>
  </a>
</li>
