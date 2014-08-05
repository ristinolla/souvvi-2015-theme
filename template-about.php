<?php
/*
Template Name: Profile Page
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'profile'); ?>
<?php endwhile; ?>
