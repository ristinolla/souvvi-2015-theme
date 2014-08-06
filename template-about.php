<?php
/*
Template Name: Profile Page
*/
?>
<div style="background-image: url(assets/img/test/test5.jpg);"
  data-spy="pr-herounit"
  data-hero-max="600"
  data-hero-treshold="80"
  class="hero hero-huge">
</div>

<div class="content container">
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('templates/content', 'profile'); ?>
    <?php endwhile; ?>
</div>

<div class="full-width">
    <h2 class="text-center"><?php printf(__('Latest posts by %1&s', 'roots'), get_the_author_meta('first_name')); ?></h2>
    <?php
      $args = array(
          'length' => 4,
          'author' => get_the_author_meta('ID'),
          'before_list' => '<ul class="post-tiles">'
      );

      pr_user_newest_posts($args);
    ?>
    <div class="text-center padded">
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="button button-lg"><?php printf(__('See all posts by %1&s', 'roots'), get_the_author_meta('first_name')); ?></a>
    </div>

</div>
