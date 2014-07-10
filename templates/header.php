<?php if (is_home()): ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center banner hidden-xs hidden-sm">
          <img src="assets/img/souvvi_logo.gif" alt="Souvvi Logo">
        </div>
      </div>
    </div>
<?php endif; ?>


<header class="navbar <?php if (!is_home()) { echo 'navbar-static-top'; } ?>"
  data-spy="follower"
  data-offset="80">
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
      <ul class="nav navbar-nav navbar-right mobile-inline">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-rss"></i></a></li>
      </ul>
    </nav>
</header>
