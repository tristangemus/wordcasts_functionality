<?php

class Taxonomy_Component extends Wordcasts_Taxonomy {

    public function __construct() {
        $this->slug = 'component';

        $this->post_types = array( 'post' );

        $this->labels = array(
            'name'              => _x( 'Components', 'taxonomy general name', WORDCASTS_FUNC_LOCALE ),
            'singular_name'     => _x( 'Component', 'taxonomy singular name', WORDCASTS_FUNC_LOCALE ),
            'search_items'      => __( 'Search Components', WORDCASTS_FUNC_LOCALE ),
            'all_items'         => __( 'All Components', WORDCASTS_FUNC_LOCALE ),
            'parent_item'       => __( 'Parent Component', WORDCASTS_FUNC_LOCALE ),
            'parent_item_colon' => __( 'Parent Component:', WORDCASTS_FUNC_LOCALE ),
            'edit_item'         => __( 'Edit Component', WORDCASTS_FUNC_LOCALE ),
            'update_item'       => __( 'Update Component', WORDCASTS_FUNC_LOCALE ),
            'add_new_item'      => __( 'Add New Component', WORDCASTS_FUNC_LOCALE ),
            'new_item_name'     => __( 'New Component Name', WORDCASTS_FUNC_LOCALE ),
            'menu_name'         => __( 'Component', WORDCASTS_FUNC_LOCALE ),
        );

        $this->args = array(
            'hierarchical'      => true,
            'labels'            => $this->labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $this->slug ),
        );

        parent::__construct();
    }

}