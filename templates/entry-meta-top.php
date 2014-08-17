<div class="meta-top muted">
  <span class="author-avatar">
    <a  rel="author" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
      <img src="<?php echo xo_user_avatar_url(get_the_author_meta('ID'), 'thumbnail'); ?>" alt="Markus" >
    </a>

  </span>
  <span class="byline author vcard">
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author" rel="author"><?php echo get_the_author(); ?></a> <?php echo __('on', 'roots'); ?> </span>

  <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php printf(__('%s ago', 'roots'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></time>
  <?php
  if ( current_user_can('edit_posts') ) {
    edit_post_link();
  } ?>
  <?php echo get_the_category_list(); ?>

</div>
