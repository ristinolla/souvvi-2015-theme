<li data="square" class="post-tile <?php post_class(); ?>">
  <a href="<?php echo get_the_permalink(); ?>">
    <?php echo get_the_post_thumbnail($post->ID, "category-thumb"); ?>
    <div class="header">
      <h3><?php the_title(); ?></h3>
      <span class="author-name"><?php sprintf(__('by %s', 'roots'), get_the_author() ); ?></span>
      <?php the_excerpt(); ?>
    </div>
  </a>
</li>
