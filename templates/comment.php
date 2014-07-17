<?php echo get_avatar($comment, $size = '64'); ?>
<div class="media-body">
  <h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>

  <?php if ($comment->comment_approved == '0') : ?>
    <div class="alert alert-info">
      <?php _e('Your comment is awaiting moderation.', 'roots'); ?>
    </div>
  <?php endif; ?>

  <?php comment_text(); ?>
  <div class="comment-meta muted">
    <time datetime="<?php echo get_comment_date('c'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%s ago', 'roots'), human_time_diff(get_comment_date('U'), current_time('timestamp'))); ?></a></time>
    <span>  &middot;  </span>
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    <?php edit_comment_link(__('(Edit)', 'roots'), '', ''); ?>
  </div>

