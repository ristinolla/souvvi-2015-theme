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
          get_template_part('templates/header');
        ?>


    <div class="container clearfix" role="document">





      <?php if (is_home()): ?>
          <section class="row">
            <div class="col-xs-12 text-center banner hidden-xs hidden-sm">
              <img src="<?php header_image(); ?>" alt="Souvvi Logo" />
            </div>
          </section>
          <div class="row">
            <main class="main" role="main">
      <?php else: ?>
          <div class="row">
            <main class="main <?php echo roots_main_class(); ?>" role="main">
      <?php endif; ?>

          <?php include roots_template_path(); ?>

            </main>
        </div>
        <?php get_template_part('templates/footer'); ?>
    </div>
    <?php wp_footer(); ?>
  </body>
  </html>
<?php endif; ?>
