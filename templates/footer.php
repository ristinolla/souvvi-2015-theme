<footer class="row content-info dark-bg site-footer" role="contentinfo" id="site-footer">
    <a href="#top"  id="to-top" class="top-btn"><i class="fa fa-2x fa-angle-up"></i></a>
    <div class="col-xs-12">
          <img class="brand-logo brand-logo-invert" src="<?php echo get_template_directory_uri(); ?>/assets/img/souvvi_logo_invert.svg" alt="Logo">
    </div>
    <div class="col-xs-12">
      <?php
          if (has_nav_menu('some_nav')) :
            wp_nav_menu(array('theme_location' => 'some_nav', 'menu_class' => 'list-inline'));
          endif;
          ?>

    </div>

    <div class="col-xs-12">
          <?php
          if (has_nav_menu('footer_menu')) :
            wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'footer-menu list-inline'));
          endif;
          ?>
    </div>

    <div class="col-xs-12">
      <p class="copy">
        <?php printf(__('&copy; %1$s %2$s', 'xo'),
        date("Y"),
        get_bloginfo( 'name' )
      ); ?>.
      Want to use photos non-commercially? Read <a href="/about/#use-photos">this</a>.
      Crafted with <i class="fa fa-heart red"></i> by <a href="http://www.pertturistimella.com/">Perttu</a>.

      </p>
    </div>

</footer>
