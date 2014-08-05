<li data="square" class="post-tile" >

  <a href="<?php echo get_the_permalink(); ?>" style="background-image: url(<?php echo xo_featured_image($post->ID, 'large'); ?>);">
    <div class="header">
      <h3><?php the_title(); ?></h3>
      <span class="author-name"><?php sprintf(__('by %s', 'roots'), get_the_author() ); ?></span>
      <?php the_excerpt(); ?>
    </div>
  </a>
</li>
