
<div class="row" id="content">


  <?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'roots'); ?>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
      <?php if(is_search()){
          get_template_part('templates/content', 'archive');
          } else {
            get_template_part('templates/content', get_post_format());
          }
      ?>
  <?php endwhile; ?>
</div>

<div class="row">

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav centered">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  <?php endif; ?>

</div>
