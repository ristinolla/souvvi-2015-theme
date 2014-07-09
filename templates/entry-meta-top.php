<div class="meta-top muted">
  <span class="author-avatar">
    <a  rel="author" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">

      <img src="assets/img/make_thumb.jpg" alt="Markus" >
    </a>
  </span>
  <span class="byline author vcard">
    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="author" rel="author"><?php echo get_the_author(); ?></a> <?php echo __('on', 'roots'); ?> </span>

  <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
  <ul class="list-inline categories hidden-xs hidden-sm">
    <li><a href="#">#Category</a></li>
    <li><a href="#">#Category</a></li>
    <li><a href="#">#Category</a></li>
    <li><a href="#">#Category</a></li>
    <li><a href="#">#Category</a></li>
  </ul>
</div>
