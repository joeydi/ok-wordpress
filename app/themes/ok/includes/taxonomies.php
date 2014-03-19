<?php

class Taxonomies {

    function __construct() {
        add_action( 'init', array( $this, 'role' ) );
        add_action( 'init', array( $this, 'client' ) );
    }

    function role() {
        register_taxonomy(
            'role',
            'project',
            array(
                'label' => 'Roles',
                'hierarchical' => true,
                'rewrite' => array( 'slug' => 'role' ),
            )
        );
    }

    function client() {
        register_taxonomy(
            'client',
            'project',
            array(
                'label' => 'Clients',
                'hierarchical' => true,
                'rewrite' => array( 'slug' => 'client' ),
            )
        );
    }
}
