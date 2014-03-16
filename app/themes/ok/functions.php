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
        add_image_size( 'featured', 720, 9999, false );
        add_image_size( 'project-thumbnail', 480, 9999, false );

        // Remove Default WordPress Junk in <head>
        remove_action( 'wp_head', 'feed_links_extra' );
        remove_action( 'wp_head', 'rsd_link' );
        remove_action( 'wp_head', 'wlwmanifest_link' );
        remove_action( 'wp_head', 'index_rel_link' );
        remove_action( 'wp_head', 'parent_post_rel_link' );
        remove_action( 'wp_head', 'start_post_rel_link' );
        remove_action( 'wp_head', 'adjacent_posts_rel_link' );
        remove_action( 'wp_head', 'wp_generator' );
        remove_action( 'wp_head', 'wp_shortlink_wp_head' );
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );

        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_stylesheets' ) );
        add_action( 'wp_head', array( $this, 'init_typekit' ) );
        add_action( 'pre_get_posts', array( $this, 'modify_project_archive_query' ) );

        add_filter( 'body_class', array( $this, 'post_body_class' ) );
        add_filter( 'the_content', array( $this, 'transform_markdown' ) );
        add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) );
        add_filter( 'next_posts_link_attributes', array( $this, 'posts_link_attributes' ) );
        add_filter( 'previous_posts_link_attributes', array( $this, 'posts_link_attributes' ) );
        add_filter( 'next_post_link', array( $this, 'post_link_attributes' ) );
        add_filter( 'previous_post_link', array( $this, 'post_link_attributes' ) );
        add_filter( 'single_template', array( $this, 'blog_template' ) );
        add_filter( 'search_template', array( $this, 'blog_template' ) );
        add_filter( 'archive_template', array( $this, 'blog_template' ) );
    }

    function action_enqueue_scripts() {
        /* Header scripts */
        wp_enqueue_script( 'typekit', 'http://use.typekit.com/vrn4dxs.js' , null, $this->version, false );
        wp_enqueue_script( 'head', path_join( get_stylesheet_directory_uri(), 'js/head.min.js' ), array( 'jquery' ), $this->version, false );

        /* Footer scripts */
        if ( !is_admin() ) {
            wp_deregister_script( 'jquery' );
            wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', null, null, true);
        }
        wp_enqueue_script( 'main', path_join( get_stylesheet_directory_uri(), 'js/main.min.js' ), array( 'jquery' ), $this->version, true );
    }

    function action_enqueue_stylesheets() {
        wp_enqueue_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css', null, $this->version );
        wp_enqueue_style( 'screen', path_join( get_stylesheet_directory_uri(), 'css/screen.css' ), null, $this->version );
    }

    function init_typekit() {
        echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
    }

    function modify_project_archive_query( $query ) {
        if ( is_admin() || !is_main_query() || $query->get( 'post_type' ) !== 'project' ) {
            return false;
        }

        $query->set( 'posts_per_page', -1 );
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

    function custom_upload_mimes ( $existing_mimes ) {
        $existing_mimes['vcf'] = 'text/x-vcard';

        return $existing_mimes;
    }

    function posts_link_attributes() {
        return 'class="btn"';
    }

    function post_link_attributes( $output ) {
        return str_replace( '<a href=', '<a class="btn" href=', $output );
    }

    function blog_template( $blog_template ) {
        global $post;

         if ( $post->post_type == 'post' || is_search() ) {
              $blog_template = dirname( __FILE__ ) . '/home.php';
         }

         return $blog_template;
    }

    static function process_contact_form() {
        if ( !is_page( 'contact' ) || $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
            return false;
        }

        $name = isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : null;
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
        $message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;

        $to = get_option( 'admin_email' );
        $headers = sprintf('From: %s <%s>', $name, $email) . "\r\n";
        $subject = 'New Message from Okay Plus';

        return wp_mail( $to, $subject, $message, $headers );
    }
}
