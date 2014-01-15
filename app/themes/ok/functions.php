<?php

new App;
new Post_Types;

class App {
    private $version;

    function __construct() {
        $theme = wp_get_theme();
        $this->version = $theme->Version;

        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'headshot', 80, 80, true );

        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_stylesheets' ) );
        add_action( 'wp_head', array( $this, 'init_typekit' ) );

        add_filter( 'body_class', array( $this, 'post_body_class' ) );
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
}

class Post_Types {

    function __construct() {
        add_action( 'init', array( $this, 'project' ) );
    }

    function project() {
        $type = ucfirst( __FUNCTION__ );
        $type_plural = sprintf( '%ss', $type );
        $slug = sprintf( '%ss', __FUNCTION__ );
        $args = array(
            'labels' => array(
                'name' => $type_plural,
                'singular_name' => $type,
                'add_new' => 'Add New',
                'add_new_item' => sprintf( 'Add New %s', $type ),
                'edit_item' => sprintf( 'Edit %s', $type ),
                'new_item' => sprintf( 'New %s', $type ),
                'view_item' => sprintf( 'View %s', $type ),
                'search_items' => sprintf( 'Search %s', $type_plural ),
                'not_found' =>  'Nothing found',
                'not_found_in_trash' => 'Nothing found in Trash',
                'parent_item_colon' => '',
            ),
            'description' => '',
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'query_var' => true,
            'menu_icon' => null,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'work',
                'with_front' => false),
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => null,
            'show_in_nav_menus' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        register_post_type( __FUNCTION__, $args );
    }
}
