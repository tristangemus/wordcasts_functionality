<?php

class Post_Taxonomies_Widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array(
            'classname' => 'wordcasts_post_taxonomies_widget',
            'description' => 'Display a list of terms used by the current post',
        );

        parent::__construct( 'wordcasts_post_taxonomies_widget', 'Wordcasts Post Taxonomies', $widget_ops );
    }

    public function widget( $args, $instance ) {
        global $post;

        if ( isset( $post->ID ) ) {
            $taxonomies = array(
                'filters' => array(
                    'name' => 'Filters',
                    'terms' => wp_get_object_terms( $post->ID, array( 'filter' ) )
                ),
                'hooks' => array(
                    'name' => 'Hooks',
                    'terms' => wp_get_object_terms( $post->ID, array( 'hook' ) )
                ),
                'functions' => array(
                    'name' => 'Functions',
                    'terms' => wp_get_object_terms( $post->ID, array( 'function' ) )
                ),
            );

            if (
                empty( $taxonomies[ 'filters' ][ 'terms' ] ) &&
                empty( $taxonomies[ 'hooks' ][ 'terms' ] ) &&
                empty( $taxonomies[ 'functions' ][ 'terms' ] )
            ) {
                return;
            }

            echo $args[ 'before_widget' ];

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories' ) : $instance['title'], $instance, $this->id_base );

            if ( $title ) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }

            WC_View::display( 'widgets/post-taxonomies.php', compact( 'taxonomies' ) );

            echo $args[ 'after_widget' ];
        }
    }

    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = sanitize_text_field( $instance['title'] );
        ?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }
}