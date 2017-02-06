<?php

class Taxonomy_Hook extends Wordcasts_Taxonomy {

    public function __construct() {
        $this->slug = 'hook';

        $this->post_types = array( 'post' );

        $this->labels = array(
            'name'              => _x( 'Hooks', 'taxonomy general name', WORDCASTS_FUNC_LOCALE ),
            'singular_name'     => _x( 'Hook', 'taxonomy singular name', WORDCASTS_FUNC_LOCALE ),
            'search_items'      => __( 'Search Hooks', WORDCASTS_FUNC_LOCALE ),
            'all_items'         => __( 'All Hooks', WORDCASTS_FUNC_LOCALE ),
            'parent_item'       => __( 'Parent Hook', WORDCASTS_FUNC_LOCALE ),
            'parent_item_colon' => __( 'Parent Hook:', WORDCASTS_FUNC_LOCALE ),
            'edit_item'         => __( 'Edit Hook', WORDCASTS_FUNC_LOCALE ),
            'update_item'       => __( 'Update Hook', WORDCASTS_FUNC_LOCALE ),
            'add_new_item'      => __( 'Add New Hook', WORDCASTS_FUNC_LOCALE ),
            'new_item_name'     => __( 'New Hook Name', WORDCASTS_FUNC_LOCALE ),
            'menu_name'         => __( 'Hook', WORDCASTS_FUNC_LOCALE ),
        );

        $this->args = array(
            'hierarchical'      => false,
            'labels'            => $this->labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $this->slug ),
        );

        parent::__construct();
    }

}