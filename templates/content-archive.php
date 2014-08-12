<li class="post-tile" >

  <a href="<?php echo get_the_permalink(); ?>">

    <div class="post-thumb">
      <?php
        if(has_post_thumbnail()){
            the_post_thumbnail( array('999', '300') );
        } else {
            echo '<img src="'. get_template_directory_uri() . '/assets/img/placeholder.png' .'" title="placeholder image"/>';
          }

        ?>
    </div>
    <div class="header">
      <h3><?php the_title(); ?></h3>
      <span>by <?php echo get_the_author(); ?></span>
      <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php printf(__('%s ago', 'roots'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></time>

    </div>
  </a>
</li>
