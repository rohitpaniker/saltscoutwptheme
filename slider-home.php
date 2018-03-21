<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <?php
        $args = array(
          'post_type' => 'slides',
          'orderby' => 'menu_order'
        );
        $slider_query = new WP_Query( $args );

        if(have_posts()) : while($slider_query->have_posts()) : $slider_query->the_post();
      ?>
      <!-- Slide Zero - Set the background image for this slide in the line below -->
      <div class="carousel-item <?php if($slider_query->current_post == 0) : ?>active<?php endif; ?>" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
        <div class="readAndBid">
          <div class="desc">
            <?php the_title(); ?>
          </div>
          <a class="sliderBtnAHref" href="<?php the_field('button_url'); ?>" style="color: #FFFFFF; text-decoration: none;">
            <div class="blueButton">
              <?php the_field('button_text'); ?>
            </div>
          </a>
        </div>
        <div class="carousel-caption d-none d-md-block">
          <img class="pulse" src="<?php echo get_bloginfo('template_directory'); ?>/images/mouse.png" width="20px">
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <div class="prevArrow">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </div>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <div class="nextArrow">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </div>
    </a>
  </div>
</header>
