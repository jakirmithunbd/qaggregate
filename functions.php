<?php 
//show_admin_bar(false);

require_once get_theme_file_path("/inc/infer-login-page-design.php");
require_once get_theme_file_path("/inc/wp-bootstrap-navwalker.php");

function vexp_setup_theme(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-header');
	add_theme_support('custom-logo');
	add_theme_support('html5', array('search-form', 'comment-list', "editor"));
    add_theme_support('woocommerce');

	//load text domain
	load_theme_textdomain('infer', get_template_directory() . '/language');
    add_image_size( 'post_image', '370' , '208', true );

	// Menu Register 
	if(function_exists('register_nav_menus')){
		register_nav_menus(array(
            'menu-1'	=>	__('Main Menu', 'infer'),
            'menu-2'	=>	__('Footer 1st Menu', 'infer'),
            'menu-3'	=>	__('Footer 2nd Menu', 'infer'),
            'menu-4'  =>  __('Topbar 3rd', 'infer'),
		));
	}
}

add_action('after_setup_theme', 'vexp_setup_theme');

function vexp_setup_assets(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('dashicon');

	//script ===
	wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), '0.0.1', true);
	wp_enqueue_script('slick', get_theme_file_uri('/assets/js/slick.min.js'), array('jquery'), '0.0.1', true);
	wp_enqueue_script('magnific', get_theme_file_uri('/assets/js/wow.min.js'), array('jquery'), '0.0.8', true);

    wp_enqueue_script('main_js', get_theme_file_uri('/assets/js/scripts.js'), array('jquery'), time(), true);

  // //localize data 
  $data = array (
    'site_url'   => get_theme_file_uri(),
    'admin_ajax'   => admin_url( 'admin-ajax.php' ),
  );

wp_localize_script('main_js', 'ajax', $data);

	//Google Fonts ===
	wp_enqueue_style('google-fonts', get_stylesheet_uri('//fonts.googleapis.com/css?family=Open+Sans:400,600,800'));
	wp_enqueue_style('google-fonts-roboto', get_stylesheet_uri('//fonts.googleapis.com/css?family=Roboto:400,500,700'));

	//css ===
	wp_enqueue_style('bootstrap_css', get_theme_file_uri('/assets/css/bootstrap.min.css'));
	wp_enqueue_style('font-awesome', get_theme_file_uri('/assets/css/font-awesome.min.css'));
	wp_enqueue_style('slick-css', get_theme_file_uri('/assets/css/slick.min.css'));
	wp_enqueue_style('magnific-popup', get_theme_file_uri('/assets/css/animate.min.css'));
	wp_enqueue_style('main_style', get_theme_file_uri('/assets/css/main-style.css'), null, time());
	wp_enqueue_style('vexp_style', get_stylesheet_uri(), null, time());
}
add_action('wp_enqueue_scripts', 'vexp_setup_assets');

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  	$gmap_api = get_field('google_map_api_key', 'options');
	return $gmap_api;
});

// acf options page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',                 // Dashboard
         'separator1',                // --Space--
         'acf-options',               // ACF Theme Settings
         'edit.php?post_type=page',   // Pages 
         'edit.php',                  // Posts
         'edit.php?post_type=artist', // artist
         'separator2',                // --Space--
         'gf_edit_forms',             // Gravity Forms
         'upload.php',                // Media
         'themes.php',                // Appearance
         'edit-comments.php',         // Comments 
         'users.php',                 // Users
         'tools.php',                 // Tools
         'options-general.php',       // Settings
         'plugins.php',               // Plugins
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Get all page id */
function getPageID() {
  	global $post;
  	$postid = $post->ID;
  	$queried_object = get_queried_object();
  	if(is_home() && get_option('page_for_posts')) {
		$postid = get_option('page_for_posts');
  	}
  	else if (is_front_page()) {
  		$postid = get_option( 'page_on_front' );
  	}
  	else if (is_archive()) {
  		$postid = get_queried_object();
  	}
  	else if ( $queried_object ) {
    	$postid = $queried_object->ID;
   	}

  	return $postid;
}

function my_acf_admin_head() {
    ?>
    <style type="text/css">

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle {
        background-color: #2e85ff !important;
        padding: 35px;
    }

    #acf-group_5a2badeb476ba.postbox.acf-postbox .hndle.ui-sortable-handle span {
        font-size: 2.5rem;
        color: white;
    }

    </style>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');

/**
 * Register widget area.
 *
 * 
 */
function vexp_silencer_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'vexp' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'vexp' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'vexp_silencer_widgets_init' );

function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="search-form-wraper">
    <input type="text" placeholder="Search Here" value="' . get_search_query() . '" name="s" id="s" />
    <button id="searchsubmit" type="submit"><span class="fas fa-search"></button>
    </div>
    </form>';
    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

function additional_scripts(){
    ?>
    <script>
        wow = new WOW(
          {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
          }
        );
        wow.init();
        document.getElementById('moar').onclick = function() {
          var section = document.createElement('section');
          section.className = 'section--purple wow fadeInDown';
          this.parentNode.insertBefore(section, this);
        };
    </script>
    <?php
}

add_action( 'wp_footer', 'additional_scripts', 100 );


function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');