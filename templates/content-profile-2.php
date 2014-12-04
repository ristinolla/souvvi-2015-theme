<header class="hero-header">
	<?php if(has_post_thumbnail()):

				$hero_id = get_post_thumbnail_id();
        $hero_full = wp_get_attachment_image_src( $hero_id, "full" );
				$hero_small = wp_get_attachment_image_src( $hero_id, "medium" );

			?>
		<div class="hero-image">
				<?php
				printf('<img src="%1$s" srcset="%1$s %2$sw, %3$s %4$sw" alt="%5$s">',
					esc_url( $hero_small[0] ),
					$hero_small[1],
					esc_url($hero_full[0]),
					$hero_full[1],
					get_the_title()
				);
				?>
		</div>
	<?php endif; ?>

	<div class="header-content">

		<a class="author-avatar" rel="author" href="<?php echo esc_url( souvvi_get_author_url() ); ?>">
			<img src="<?php echo xo_user_avatar_url(get_the_author_meta('ID'), 'thumbnail'); ?>" alt="" >
		</a>

		<h1><?php the_title(); ?></h1>

	</div>
</header>



<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3 page-content">
		<?php the_content(); ?>
		<div class="author-meta">
			<?php
			/*
			$args = array(
				'ul_class' => 'list-unstyled list-inline',
				'linktext' => '<i class="fa fa-2x fa-%1$s"></i>',
				'fa'       => true
			);
			user_meta_list($user_id, $args);
			*/
			?>
		</div>
		<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	</div>
</div>
