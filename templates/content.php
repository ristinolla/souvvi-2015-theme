<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta-top'); ?>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    <?php get_template_part('templates/entry-meta-bottom'); ?>

  </footer>
  <div class="centered comments-wrapper">
    <button type="button" data="comments-toggle" class="button button-simple button-sm">Show Comments (1)</button>
    <div class="comments-drawer closed">
      <?php comments_template('/templates/comments.php'); ?>
    </div>
  </div>
</article>
