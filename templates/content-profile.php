<div class="row">
  <div class="col-xs-12 col-sm-5 col-md-4">

        <div class="author-photo">
          <?php $user_id = get_the_author_meta('ID'); ?>

          <img src="<?php echo xo_user_avatar_url($user_id, 'medium'); ?>">
        </div>

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
  </div>
  <div class="col-xs-12 col-sm-7 col-md-8 page-content">
      <?php the_content(); ?>
      <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
  </div>
</div>
