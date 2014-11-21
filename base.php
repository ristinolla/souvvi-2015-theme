<?php
if (isset($_GET['ajax'])):
  $decodedURL = rawurldecode($_SERVER['QUERY_STRING']);
  get_ajax_comments(parse_url($decodedURL));
else:
?>

  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <!--[if lt IE 8]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
      </div>
    <![endif]-->

    <?php
      do_action('get_header');
    ?>
    <?php
    if( !is_page('maintenance') ):
      if (is_home()):
        //get_template_part('templates/header', 'home');
      endif;

      get_template_part('templates/header');
    endif;
    ?>

    <main class="container clearfix" role="document">
        <?php include roots_template_path(); ?>
    </main>

    <?php
    if( !is_page('maintenance') ):
      get_template_part('templates/footer');
    endif;
    ?>

    <div>
      <?php wp_footer(); ?>
    </div>
  </body>
  </html>
<?php endif; ?>
