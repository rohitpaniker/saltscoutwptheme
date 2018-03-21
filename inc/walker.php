<?php
/* <ul class="navbar-nav ml-auto"> // statr_lvl()
    <li class="nav-item dropdown"> // statr_el()
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
    </li> // end_el()
    <li class="nav-item">
      <a class="nav-link commonMenuStyle" href="#">ABOUT US</a>
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
      <div class="myWishListContainer"><img class="myWishList" src="< ?php echo get_bloginfo('template_directory'); ? >/images/wishlist.png" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></div>
    </li>
  </ul> //en_lvl() */

  class Walker_Nav_Primary extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $submenu = ($depth > 0) ? 'sub-menu' : '';
      $output .= "\n$indent<div class=\"dropdown-menu dropdown-menu-right dept_$depth\" aria-labelledby=\"navbarDropdownPortfolio\">\n";
    }

    // function start_el() {
    //
    // }
    //
    // function end_el() {
    //
    // }
    //
    // function end_lvl() {
    //
    // }
  }

?>
