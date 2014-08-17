<div class="meta-bottom muted">
  <?php
    if(has_category()){
        echo get_the_category_list();
    }
  ?>
  <?php
    if(has_tag()){
      if(get_the_tag_list()) {
          echo get_the_tag_list('<ul class="post-tags"><li>','</li><li>','</li></ul>');
      }
    }
  ?>
</div>

