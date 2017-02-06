<?php

class WC_Post_Extensions {

    public function __construct() {
        add_filter( 'the_content', array( $this, 'prepend_featured_content' ), 10, 1 );
    }

    public function prepend_featured_content( $content ) {
        global $post;

        if ( ! is_single() || ! isset( $post ) ) {
            return $content;
        }

        if ( $featured = get_post_meta( $post->ID, 'featured_content', true ) ) {
            return $this->featured_wrapper( $featured ) . $content;
        }

        return $content;
    }

    private function featured_wrapper( $content ) {
        return '<div class="wordcasts_featured_wrapper">' . $content . '</div>';
    }

}