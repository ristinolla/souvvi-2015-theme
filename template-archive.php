<?php
/*
Template Name: Archive page
*/
?>
<div class="row content">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <div class="row archive-lists page-content">
      <?php $args = array(); ?>
      <div class="hidden-xs hidden-sm col-md-3"><?php xo_montly_list($args); ?></div>
      <div class="hidden-xs hidden-sm col-md-3"><?php xo_category_list($args); ?></div>
      <div class="hidden-xs hidden-sm col-md-3"><?php xo_author_list($args); ?></div>
      <div class="hidden-xs hidden-sm col-md-3"><?php xo_all_posts_list($args); ?></div>
      <div class="hidden-md hidden-lg col-xs-12"><?php xo_archive_accordion($args); ?></div>
    </div>

    <?php the_content(); ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

  <?php endwhile; ?>
</div>
