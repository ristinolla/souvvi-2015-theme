<div class="row narrow-content">
	<div class="col-xs-12 page-content">
		<?php the_content(); ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	</div>
</div>
