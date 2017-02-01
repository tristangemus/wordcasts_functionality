<?php

abstract class Wordcasts_Taxonomy {

    protected $labels = array();

    protected $args = array();

    protected $slug = '';

    protected $post_types = array();

    public function __construct() {
        add_action( 'init', array( $this, 'register' ) );
    }

    public function register() {
        register_taxonomy( $this->slug, $this->post_types, $this->args );
    }

}