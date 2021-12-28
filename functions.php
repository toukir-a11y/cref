<?php

function cref_setup() {
    
    load_theme_textdomain( "cref" );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'cref_setup' );

// enqueue style
function cref_scripts() {
    wp_enqueue_style('typekit', '//use.typekit.net/vjt2xyc.css', array(), false, 'all');
    wp_enqueue_style( 'basic', get_template_directory_uri().'/css/basic-flex.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/basic-flex.css')), 'all' );
    wp_enqueue_style( 'content', get_template_directory_uri().'/css/content-editor.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/content-editor.css')), 'all' );
    wp_enqueue_style( 'icon', get_template_directory_uri().'/css/icon-fonts.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/icon-fonts.css')),'all'  );
    wp_enqueue_style('plugins', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
    wp_enqueue_style( 'cref-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

// enqueue scripts 
    wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/admin.js' )), true);
    wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
    wp_enqueue_script('min-js', get_template_directory_uri() . '/html/js/jquery.min.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/html/js/jquery.min.js' )), true);

}
add_action( "wp_enqueue_scripts", "cref_scripts" );