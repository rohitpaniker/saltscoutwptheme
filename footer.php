<div class="signupContainer">
  <div class="signupMessageContainer">
    <div class="signupMsg">
      <h4 class="h4Style"> SIGNUP FOR OUR NEWSLETTER </h4>
      <p> WE'D LOVE TO STAY IN TOUCH </p>
    </div>
  </div>
  <div class="callToAction">
    <div class="cToAContainer">
      <input type="text" class="userEmailTextArea" id="userEmailTextArea" placeholder="Enter Your Email Address"></input>
      <div name="btnSubmit" id="joinUsBtn" class="blueButton joinUsBtn"> JOIN US </div>
    </div>
    <!-- <form id="formid" class="cToAContainer" action="" method="POST">
      <input type="text" class="userEmailTextArea" id="userEmailTextArea" placeholder="Enter Your Email Address"></input>
      <div type="submit" name="btnSubmit" id="joinUsBtn" class="blueButton"> JOINUS </div>
    </form> -->
  </div>
</div>

<!-- Footer -->
<footer class="py-5 pg-white">
  <div class="container footerContainer">
    <?php
      // $args = array(
      //   'theme_location' => 'footer'
      // );
      //
      // wp_nav_menu($args);
    ?>
    <a href="#" class="smaps">SITEMAP</a>
    <a href="#" class="faqs">FAQS</a>
    <a href="#" class="tou">TERMS OF USE</a>
    <a href="#" class="ppolicy">PRIVACY POLICY</a>
    <a href="#" class="disclmr">DISCLAIMER</a>
    <!-- <p class="m-0 text-center text-black">Copyright &copy; Your Website 2018</p> -->
  </div>
  <div class="goSocial">
    <?php
      $args = array(
        'post_type' => 'sociallinks',
        'orderby' => 'menu_order',
      );
      $slider_query = new WP_Query( $args );

      if(have_posts()) : while($slider_query->have_posts()) : $slider_query->the_post();
    ?>
    <a href="<?php the_field('social_link_url'); ?>"><img class="socialLinks" src="<?php the_post_thumbnail_url(); ?>"></a>
    <?php endwhile; endif; ?>
  </div>
  <!-- /.container -->
</footer>

</body>

</html>
