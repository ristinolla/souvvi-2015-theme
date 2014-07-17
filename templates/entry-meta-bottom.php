<div class="meta-bottom muted">
  <?php echo get_the_category_list(); ?>
  <?php
   if(get_the_tag_list()) {
       echo get_the_tag_list('<ul class="post-tags"><li>','</li><li>','</li></ul>');
   }
   ?>
</div>
<div class="social-media muted">
  <ul class="list-inline">
    <li><a href="#"><i class="fa fa-facebook"></i><span>Share</span></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i><span>Tweet</span></a></li>
  </ul>
</div>
