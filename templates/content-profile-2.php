<?php

if(has_post_thumbnail()){
	$hero_id = get_post_thumbnail_id( get_the_author_meta('ID'));

	$hero_img_url = wp_get_attachment_image_src( $hero_id, array('1500, 500') );
} else {
	$hero_img_url = get_template_directory_uri() . '/assets/img/header.jpg';
}

?>

<?php if(has_post_thumbnail()): ?>
	<header class="hero-header">
		<div class="hero-image">
			<?php the_post_thumbnail( "large"); ?>
		</div>
		<div class="header-content">
			<?php $user_id = get_the_author_meta('ID'); ?>
		  <!-- 	<img src="<?php echo xo_user_avatar_url($user_id, 'medium'); ?>"> -->

			<?php get_template_part('templates/author', 'avatar'); ?>

			<h1><?php the_title(); ?></h1>

		</div>

	</header>
<?php endif; ?>


<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3 page-content">
		<?php the_content(); ?>
		<div class="author-meta">
			<?php
			$args = array(
				'ul_class' => 'list-unstyled list-inline',
				'linktext' => '<i class="fa fa-2x fa-%1$s"></i>',
				'fa'       => true
			);
			user_meta_list($user_id, $args);
			?>
		</div>
		<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	</div>
</div>
