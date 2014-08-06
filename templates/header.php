<header id="main-header" class="nav-wrap" data-spy="follower" data-offset="80">
  <div class="navbar container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <div class="hamburger"></div>
        </button>
        <a class="navbar-brand text-hide brand-logo visible-xs" href="<?php echo esc_url(home_url('/')); ?>/"><?php bloginfo('name'); ?></a>
      </div>
      <nav class="collapse navbar-collapse">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
          endif;
        ?>

        <?php
          if (has_nav_menu('some_nav')) :
            wp_nav_menu(array('theme_location' => 'some_nav', 'menu_class' => 'nav navbar-nav navbar-right mobile-inline'));
          endif;
        ?>
      </nav>
  </div>
</header>
