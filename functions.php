<?php
show_admin_bar( false );
require_once('wp_bootstrap_navwalker.php');

function cref_setup() {
    
    load_theme_textdomain( "cref" );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    //register menu
    register_nav_menus( array(
        'primary-menu' => esc_html__( 'Primary menu', 'cref' ),
        'top-menu' => esc_html__( 'top menu', 'cref' ),
        'footer-menu' => esc_html__( 'footer menu', 'cref' ),
  ) );
}
add_action( 'after_setup_theme', 'cref_setup' );

// enqueue style
function cref_scripts() {
    wp_enqueue_style('typekit', '//use.typekit.net/vjt2xyc.css', array(), false, 'all');
    wp_enqueue_style( 'basic', get_template_directory_uri().'/css/basic-flex.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/basic-flex.css')), 'all' );
    wp_enqueue_style( 'content', get_template_directory_uri().'/css/content-editor.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/content-editor.css')), 'all' );
    wp_enqueue_style( 'icon', get_template_directory_uri().'/css/icon-fonts.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/icon-fonts.css')),'all'  );
    wp_enqueue_style('plugins', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/custom.css' )), 'all');
    wp_enqueue_style( 'cref-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

// enqueue scripts 
    wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array('jquery'), date("ymd-Gis", filemtime( get_template_directory() . '/js/admin.js' )), true);
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
    wp_enqueue_script('min-js', get_template_directory_uri() . '/html/js/jquery.min.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/html/js/jquery.min.js' )), true);

}
add_action( "wp_enqueue_scripts", "cref_scripts" );

// add acf options page 

if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
		'page_title' 	=> 'Option',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'Option',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
        'position' 	=> 2
	));
}


// register widgets

function sidebar(){

    register_sidebar( 
		array(
        'name'          => __( 'fristsidebar', 'neptune' ),
        "description"   => __( "neptune sidebar", "neptune"),
        'id'            => 'sidebar-1',
        'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li></ul>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

}
add_action("widgets_init","sidebar");

// function blog_bg_image (){

// if(is_home()){

//     printf( '<div class="page-header blog"><img src="%s" class="img-fluid" alt="%s"></div>', /images/page-header-blog.jpg  )
// }

// }


// add_action("widgets_init","sidebar");
