<div class="meta-top muted">
  <?php get_template_part('templates/author', 'avatar'); ?>

  <span class="byline author vcard">
    <?php echo __('by', 'roots'); ?>
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author" rel="author"><?php echo get_the_author(); ?></a></span>

  <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php printf(__('%s ago', 'roots'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></time>
  <?php
  if ( current_user_can('edit_posts') ) {
    edit_post_link();
  } ?>
  <?php // echo get_the_category_list(); ?>

</div>
