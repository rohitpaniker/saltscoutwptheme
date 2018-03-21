<?php get_header(); ?>
    <!-- Page Content -->
    <?php
      if(is_front_page()) {
        get_template_part('listing', 'home');
      }
    ?>

<?php get_footer(); ?>
