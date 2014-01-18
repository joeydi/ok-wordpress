<?php

/* Load required libraries */
require_once( dirname( __FILE__ ) . '/inc/markdown.php' );

/* Load required custom includes */
require_once( dirname( __FILE__ ) . '/inc/post-types.php' );
require_once( dirname( __FILE__ ) . '/inc/taxonomies.php' );

new App;
new Post_Types;
new Taxonomies;

class App {
    private $version;

    function __construct() {
        $theme = wp_get_theme();
        $this->version = $theme->Version;

        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array( 'link', 'quote', 'video' ) );

        add_image_size( 'headshot', 80, 80, true );

        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_stylesheets' ) );
        add_action( 'wp_head', array( $this, 'init_typekit' ) );

        add_filter( 'body_class', array( $this, 'post_body_class' ) );
        add_filter( 'the_content', array( $this, 'transform_markdown' ) );
    }

    function action_enqueue_scripts() {
        /* Wordpress provided scripts */
        wp_enqueue_script( 'jquery' );

        /* Header scripts */
        wp_enqueue_script( 'typekit', 'http://use.typekit.com/vrn4dxs.js' , null, $this->version, false );
        wp_enqueue_script( 'respondjs', path_join( get_stylesheet_directory_uri(), 'js/respond.min.js' ), false, $this->version, false );

        /* Footer scripts */
        wp_enqueue_script( 'isotope', path_join( get_stylesheet_directory_uri(), 'js/isotope.pkgd.js' ), null, $this->version, true );
        wp_enqueue_script( 'magnific', path_join( get_stylesheet_directory_uri(), 'js/jquery.magnific-popup.js' ), array( 'jquery' ), $this->version, true );
        wp_enqueue_script( 'fitvids', path_join( get_stylesheet_directory_uri(), 'js/jquery.fitvids.js' ), null, $this->version, true );
        wp_enqueue_script( 'main', path_join( get_stylesheet_directory_uri(), 'js/main.js' ), array( 'jquery' ), $this->version, true );
    }

    function action_enqueue_stylesheets() {
        wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css', null, $this->version );
        wp_enqueue_style( 'screen', path_join( get_stylesheet_directory_uri(), 'css/screen.css' ), null, $this->version );
    }

    function init_typekit() {
        echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
    }

    function post_body_class( $classes ) {
        global $post;

        if ( isset( $post ) && is_singular() ) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }

        return $classes;
    }

    function transform_markdown( $content ) {
        return Markdown( $content );
    }
}
