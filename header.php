<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo get_bloginfo('name'); ?></title>
    <?php wp_head();?>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-customblue fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>"><img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.png" class="logo"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <?php
            // $args = array(
            //   'theme_location' => 'primary',
            //   'container' => false,
            //   'menu_class' => 'navbar-nav ml-auto',
            //   'walker' => new Walker_Nav_Primary()
            // );
            //
            // wp_nav_menu($args);
          ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle commonMenuStyle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                AUCTION
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link commonMenuStyle" href="#">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link commonMenuStyle" href="#">OUR IMPACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link commonMenuStyle" href="#">CONTACT US</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle commonMenuStyle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                REQUEST AN AUCTION
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
                <a class="dropdown-item" href="#">Some Menu Item</a>
              </div>
            </li>
            <li class="nav-item">
              <div class="whiteButton"> Register </div>
            </li>
            <li class="nav-item">
              <a class="nav-link commonMenuStyle" href="contact.html">Login</a>
            </li>
            <li class="nav-item">
              <div class="myWishListContainer"><img class="myWishList" src="<?php echo get_bloginfo('template_directory'); ?>/images/wishlist.png" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
      if(is_front_page()) {
        get_template_part('slider', 'home');
      }
    ?>
