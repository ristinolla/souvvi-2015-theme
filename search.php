<div class="content <?php if (!have_posts()) : ?> centered <?php endif; ?>">
  <?php get_template_part('templates/page', 'header'); ?>

  <div class="full-width">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'roots'); ?>
      </div>
      <div class="search-huge">
        <?php get_search_form(); ?>
      </div>
    <?php endif; ?>
    <ul class="post-tiles">
    <?php while (have_posts()) : the_post(); ?>

        <?php if(is_search()){
            get_template_part('templates/content', 'archive');
            } else {
              get_template_part('templates/content', get_post_format());
            }
        ?>



    <?php endwhile; ?>
    </ul>
  </div>

  <?php if ($wp_query->max_num_pages > 1) : ?>
  <div class="row">
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      </ul>
    </nav>
  </div>
  <?php endif; ?>

</div>
