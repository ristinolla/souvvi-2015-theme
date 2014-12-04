<?
 /*
<a class="author-avatar" rel="author" href="<?php echo esc_url( souvvi_get_author_url() ); ?>">
	<img src="<?php echo xo_user_avatar_url(get_the_author_meta('ID'), 'thumbnail'); ?>" alt="" >
</a>
*/
 ?>
<a class="author-avatar" rel="author" href="<?php echo esc_url( souvvi_get_author_url() ); ?>">
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 50  ); ?>
</a>
