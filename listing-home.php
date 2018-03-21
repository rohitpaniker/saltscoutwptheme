<div class="container">

  <h3 class="my-4">BID TO WIN</h3>

  <div class="row" id="ajax-posts">
    <?php
      $args = array(
        'post_type' => 'moviecard',
        'orderby' => 'menu_order',
        'posts_per_page' => 3,
        'paged' => 1
      );
      $slider_query = new WP_Query( $args );

      if(have_posts()) : while($slider_query->have_posts()) : $slider_query->the_post();
    ?>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><div class="card-img-top cImage" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); padding: 135px; background-repeat: no-repeat; background-size: inherit; background-position: top; position: relative;"><span class='daysLeftInformation'> <?php the_field('days_left'); ?> days left </span></div></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#"><?php the_title(); ?></a>
            </h4>
            <p class="card-text"><?php the_content(); ?></p>
            <p class="bidInformation"> Current Bid: Rs <?php the_field('current_bid_rate'); ?> </p>
            <p class="causeInformation"> <?php the_field('bidding_cause'); ?> </p>
            <a class="sliderBtnAHref" href="<?php the_field('button_url'); ?>" style="color: #FFFFFF; text-decoration: none;">
              <div class="blueBorderedButton">
                <?php the_field('button_text'); ?>
              </div>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
  <!-- /.row -->

  <div class="horizontalRule"></div>

  <div class="viewAllContainer">
    <div class="blueBorderedButton viewAllBtn" id="more_posts"> VIEW ALL </div>
  </div>

</div>
<!-- /.container -->
