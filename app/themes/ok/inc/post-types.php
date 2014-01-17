<?php

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
