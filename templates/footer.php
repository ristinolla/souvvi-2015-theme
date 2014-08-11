<footer class="row content-info dark-bg site-footer" role="contentinfo">

    <div class="col-xs-12 col-md-2">
          <img class="brand-logo brand-logo-invert" src="<?php echo get_template_directory_uri(); ?>/assets/img/souvvi_logo_invert.svg" >
          <?php
          if (has_nav_menu('some_nav')) :
            wp_nav_menu(array('theme_location' => 'some_nav', 'menu_class' => 'list-inline'));
          endif;
          ?>

    </div>

    <div class="col-xs-12 col-md-7">
          <?php
          if (has_nav_menu('some_nav')) :
            wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'footer-menu list-inline'));
          endif;
          ?>
    </div>

    <div class="col-xs-12 col-md-3">
      <p class="copy">
        <?php printf(__('&copy %1$s %2$s', 'xo'),
        date("Y"),
        get_bloginfo( 'name' )
      ); ?>
      <br>Wanna use photos non-commercially? Read <a href="#use-photos">this</a>
      <br>Crafted with <i class="fa fa-heart red"></i> by <a href="http://www.pertturistimella.com/">Perttu</a>
      <br>Powered by <a href="http://mdtm.pl/1zVzitp">(mt) Media Temple</a>

      </p>
    </div>

</footer>
