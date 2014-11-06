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
  <div class="some-buttons">
    <ul>
      <li>
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="200" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
      </li>
      <li>
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="Check out how cool post I found." data-related="souvvi" data-count="none" data-hashtags="souvvi">Tweet</a>
      </li>
    </ul>
  </div>
</div>
