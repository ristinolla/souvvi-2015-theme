<div class="entry-meta entry-meta-bottom muted">
	<?php if(has_category() && false): ?>
		<?php // this is hidden ?>
		<div class="post-categories">
	    <ul class="list-inline">
				<?php wp_list_categories('title_li=' . __('Categories', 'roots') ); ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if(has_tag() && get_the_tag_list() ): ?>
		<div class="tags">
	      <?php echo get_the_tag_list('<ul class="list-inline post-tags"><li>' . __('Tags', 'roots') . '</li><li>','</li><li>','</li></ul>'); ?>
		</div>
	<?php  endif; ?>

  <div class="some-buttons">
    <div class="addthis_sharing_toolbox" data-url="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>"></div>
  </div>
</div>
