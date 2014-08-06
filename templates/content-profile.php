<div class="row">
  <div class="col-xs-12 col-sm-5 col-md-4">
      <?php if(has_post_thumbnail()){ ?>
        <div class="author-photo">
          <?php the_post_thumbnail(array(500,9999) ); ?>
        </div>
      <?php } ?>
    <div class="author-meta">
    <?php
      $user_id = 1;
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
