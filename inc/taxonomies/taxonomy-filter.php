<?php

class Taxonomy_Filter extends Wordcasts_Taxonomy {

    public function __construct() {
        $this->slug = 'filter';

        $this->post_types = array( 'post' );

        $this->labels = array(
            'name'              => _x( 'Filters', 'taxonomy general name', WORDCASTS_FUNC_LOCALE ),
            'singular_name'     => _x( 'Filter', 'taxonomy singular name', WORDCASTS_FUNC_LOCALE ),
            'search_items'      => __( 'Search Filters', WORDCASTS_FUNC_LOCALE ),
            'all_items'         => __( 'All Filters', WORDCASTS_FUNC_LOCALE ),
            'parent_item'       => __( 'Parent Filter', WORDCASTS_FUNC_LOCALE ),
            'parent_item_colon' => __( 'Parent Filter:', WORDCASTS_FUNC_LOCALE ),
            'edit_item'         => __( 'Edit Filter', WORDCASTS_FUNC_LOCALE ),
            'update_item'       => __( 'Update Filter', WORDCASTS_FUNC_LOCALE ),
            'add_new_item'      => __( 'Add New Filter', WORDCASTS_FUNC_LOCALE ),
            'new_item_name'     => __( 'New Filter Name', WORDCASTS_FUNC_LOCALE ),
            'menu_name'         => __( 'Filter', WORDCASTS_FUNC_LOCALE ),
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