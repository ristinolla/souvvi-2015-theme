<?php $args = array(
  'role'         => '',
  'meta_key'     => '',
  'meta_value'   => '',
  'meta_compare' => '',
  'meta_query'   => array(),
  'orderby'      => 'login',
  'order'        => 'ASC',
  'offset'       => '',
  'search'       => '',
  'number'       => '',
  'count_total'  => true,
  'fields'       => 'all',
  'who'          => ''
 ); ?>
<h1> authors </h1>
<span>
 <?php get_users( $args ); ?>
</span>
<?php the_content(); ?>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
