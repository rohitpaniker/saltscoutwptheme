<?php
  include_once('advanced-custom-fields/acf.php');
  // Register Custom Navigation Walker
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

  require_once get_template_directory() . '/inc/walker.php';

function wp_salscout_theme_setup() {
    function saltscout_styles() {
      wp_register_style('style', get_template_directory_uri().'/css/style.css', array(), '1.0');
      wp_register_style('bootstrap', get_template_directory_uri().'/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0');
      wp_enqueue_style('style');
      wp_enqueue_style('bootstrap');
    }

    add_action('wp_enqueue_scripts', 'saltscout_styles');

    function saltscout_scripts() {
      wp_register_script('functions', get_template_directory_uri().'/js/functions.js');
      wp_register_script('jquery', get_template_directory_uri().'/vendor/jquery/jquery.js');
      wp_register_script('bootstrap', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js');
      wp_enqueue_script('jquery');
      wp_enqueue_script('functions');
      wp_enqueue_script('bootstrap');
      wp_localize_script( 'functions', 'ajax_posts', array(
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'noposts' => __('No older posts found', 'twentyfifteen'),
          'security' => wp_create_nonce('our-nonce')
      ));
    }

    add_action('wp_enqueue_scripts', 'saltscout_scripts');

    add_theme_support('post-thumbnails', 'custom-logo');


    function more_post_ajax() {

      // $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 9;
      // $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

      header("Content-Type: text/html");

      $args = array(
          'post_type' => 'moviecard',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'paged' => 2
      );

      $loop = new WP_Query($args);

      $ar_posts = array();



      if ($loop->have_posts()):
        while($loop->have_posts()): $loop -> the_post(); ?>

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
    <?php
      endwhile;
      wp_reset_postdata();
      endif;
      die();
    }
    add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
    add_action('wp_ajax_more_post_ajax', 'more_post_ajax');



    // Email submit for Join Us Button

    function form_action_function() {
      $data = $_POST['data'];
      if(!check_ajax_referer('our-nonce', 'security')) {
        wp_send_json_error('security failed!!');
        return;
      }
      $post_id = wp_insert_post (
        array(
          'post_type' => 'post',
          'post_status' => 'draft',
          'post_title' => $data['email'],
          'post_content' => $data['email']
        ),
        true
      );
      if($post_id) {
        update_post_meta($post_id, '_user_metabox_post', $data['email']);
        wp_set_object_terms($post_id, $data['option'], 'category');
      }

      echo "Thank you for subscribing to email!!";

      die();
    }

    add_action('wp_ajax_nopriv_form_action_function', 'form_action_function');
    add_action('wp_ajax_form_action_function', 'form_action_function');



    // Custom Post Type Generated PHP Code

    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_slider-custom-fields',
    		'title' => 'Slider Custom Fields',
    		'fields' => array (
    			array (
    				'key' => 'field_5aafa19ece6b6',
    				'label' => 'Button Text',
    				'name' => 'button_text',
    				'type' => 'text',
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    			array (
    				'key' => 'field_5aafa1b8ce6b7',
    				'label' => 'Button URL',
    				'name' => 'button_url',
    				'type' => 'text',
    				'default_value' => '',
    				'placeholder' => 'Slider Button URL',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'post_type',
    					'operator' => '==',
    					'value' => 'slides',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
    			'position' => 'normal',
    			'layout' => 'default',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }

    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_moviecard-custom-fields',
    		'title' => 'MovieCard Custom Fields',
    		'fields' => array (
    			array (
    				'key' => 'field_5aafb0cd379a3',
    				'label' => 'Current Bid Rate',
    				'name' => 'current_bid_rate',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    			array (
    				'key' => 'field_5aafb186379a4',
    				'label' => 'Bidding Cause',
    				'name' => 'bidding_cause',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    			array (
    				'key' => 'field_5aafb1b49763f',
    				'label' => 'Button Text',
    				'name' => 'button_text',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => 'Button Label',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    			array (
    				'key' => 'field_5aafb1d197640',
    				'label' => 'Button URL',
    				'name' => 'button_url',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    			array (
    				'key' => 'field_5aafb206159f6',
    				'label' => 'Days Left',
    				'name' => 'days_left',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'post_type',
    					'operator' => '==',
    					'value' => 'moviecard',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
    			'position' => 'normal',
    			'layout' => 'no_box',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }

    function cptui_register_my_cpts() {

  	/**
  	 * Post Type: Slides.
  	 */

  	$labels = array(
  		"name" => __( "Slides", "" ),
  		"singular_name" => __( "Slide", "" ),
  		"menu_name" => __( "Slider", "" ),
  	);

  	$args = array(
  		"label" => __( "Slides", "" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => false,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "slides", "with_front" => true ),
  		"query_var" => true,
  		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
  	);

  	register_post_type( "slides", $args );

  	/**
  	 * Post Type: Moviecards.
  	 */

  	$labels = array(
  		"name" => __( "Moviecards", "" ),
  		"singular_name" => __( "Moviecard", "" ),
  		"menu_name" => __( "MovieCard", "" ),
  	);

  	$args = array(
  		"label" => __( "Moviecards", "" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => false,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "moviecard", "with_front" => true ),
  		"query_var" => true,
  		"supports" => array( "title", "editor", "thumbnail" ),
  	);

  	register_post_type( "moviecard", $args );

    if(function_exists("register_field_group"))
    {
    	register_field_group(array (
    		'id' => 'acf_sociallinks-custom-fields',
    		'title' => 'SocialLinks Custom Fields',
    		'fields' => array (
    			array (
    				'key' => 'field_5ab170f5acb5e',
    				'label' => 'Social Link URL',
    				'name' => 'social_link_url',
    				'type' => 'text',
    				'required' => 1,
    				'default_value' => '',
    				'placeholder' => '',
    				'prepend' => '',
    				'append' => '',
    				'formatting' => 'html',
    				'maxlength' => '',
    			),
    		),
    		'location' => array (
    			array (
    				array (
    					'param' => 'post_type',
    					'operator' => '==',
    					'value' => 'sociallinks',
    					'order_no' => 0,
    					'group_no' => 0,
    				),
    			),
    		),
    		'options' => array (
    			'position' => 'normal',
    			'layout' => 'no_box',
    			'hide_on_screen' => array (
    			),
    		),
    		'menu_order' => 0,
    	));
    }


  	/**
  	 * Post Type: SocialLinks.
  	 */

  	$labels = array(
  		"name" => __( "SocialLinks", "" ),
  		"singular_name" => __( "SocialLink", "" ),
  		"menu_name" => __( "SocialLinks", "" ),
  	);

  	$args = array(
  		"label" => __( "SocialLinks", "" ),
  		"labels" => $labels,
  		"description" => "",
  		"public" => true,
  		"publicly_queryable" => true,
  		"show_ui" => true,
  		"show_in_rest" => false,
  		"rest_base" => "",
  		"has_archive" => false,
  		"show_in_menu" => true,
  		"exclude_from_search" => false,
  		"capability_type" => "post",
  		"map_meta_cap" => true,
  		"hierarchical" => false,
  		"rewrite" => array( "slug" => "sociallinks", "with_front" => true ),
  		"query_var" => true,
  		"supports" => array( "title", "editor", "thumbnail" ),
  	);

  	register_post_type( "sociallinks", $args );
  }

  add_action( 'init', 'cptui_register_my_cpts' );



  // Navigation Menu Configuration and Registration

  register_nav_menus(array (
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
  ));
}


add_action('after_setup_theme', 'wp_salscout_theme_setup');
?>
