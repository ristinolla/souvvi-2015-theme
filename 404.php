<?php get_template_part('templates/page', 'header'); ?>

<div class="centered narrow-content">


  <p><?php _e('It looks like this was the result of either:', 'roots'); ?></p>
  <ul>
    <li><?php _e('a mistyped address', 'roots'); ?></li>
    <li><?php _e('an out-of-date link', 'roots'); ?></li>
  </ul>
  <div class="search-huge">
    <?php get_search_form(); ?>
  </div>
</div>
