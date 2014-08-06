<?php
/*
Template Name: Profile Page
*/
?>



<?php while (have_posts()) : the_post(); ?>

    <?php
         $heros = get_post_custom_values('hero_img_url', get_the_ID());
         $hero_img_url = $heros[0];
    ?>

    <div style="background-image: url(<?php echo $hero_img_url; ?> );"
      data-spy="pr-herounit"
      data-hero-max="600"
      data-hero-treshold="80"
      class="hero hero-huge">
    </div>



    <div class="content container">
      <?php get_template_part('templates/content', 'profile'); ?>
    </div>
<?php endwhile; ?>


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
