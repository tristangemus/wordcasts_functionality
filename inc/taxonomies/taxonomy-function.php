<?php

class Taxonomy_Function extends Wordcasts_Taxonomy {

    public function __construct() {
        $this->slug = 'function';

        $this->post_types = array( 'post' );

        $this->labels = array(
            'name'              => _x( 'Functions', 'taxonomy general name', WORDCASTS_FUNC_LOCALE ),
            'singular_name'     => _x( 'Function', 'taxonomy singular name', WORDCASTS_FUNC_LOCALE ),
            'search_items'      => __( 'Search Functions', WORDCASTS_FUNC_LOCALE ),
            'all_items'         => __( 'All Functions', WORDCASTS_FUNC_LOCALE ),
            'parent_item'       => __( 'Parent Function', WORDCASTS_FUNC_LOCALE ),
            'parent_item_colon' => __( 'Parent Function:', WORDCASTS_FUNC_LOCALE ),
            'edit_item'         => __( 'Edit Function', WORDCASTS_FUNC_LOCALE ),
            'update_item'       => __( 'Update Function', WORDCASTS_FUNC_LOCALE ),
            'add_new_item'      => __( 'Add New Function', WORDCASTS_FUNC_LOCALE ),
            'new_item_name'     => __( 'New Function Name', WORDCASTS_FUNC_LOCALE ),
            'menu_name'         => __( 'Function', WORDCASTS_FUNC_LOCALE ),
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