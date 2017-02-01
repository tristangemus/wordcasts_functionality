<?php

abstract class WC_Meta_Box {

    protected $post_types = array( 'post' );

    protected $title = '';

    protected $slug = '';

    private $nonce = '';

    protected $fields = array();

    public function __construct() {
        $this->create_nonce();

        add_action( 'add_meta_boxes', array( $this, 'register' ) );
        add_action( 'save_post', array( $this, 'save' ) );
    }

    public function register() {
        add_meta_box( $this->slug, __( $this->title, WORDCASTS_FUNC_LOCALE ), array( $this, 'callback' ), $this->post_types );
    }

    public function callback( $post ) {
        wp_nonce_field( basename( __FILE__ ), $this->nonce );

        $this->fields( $post );
    }

    public function save( $post_id ) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce = ( isset( $_POST[ $this->nonce ] ) && wp_verify_nonce( $_POST[ $this->nonce ], basename( __FILE__ ) ) ) ? 'true' : 'false';

        if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
            return;
        }

        foreach ( $this->fields as $field ) {
            if ( isset( $_POST[ $field[ 'name' ] ] ) ) {
                $type = isset( $field[ 'type' ] ) ? $field[ 'type' ] : 'text';
                update_post_meta( $post_id, $field[ 'name' ], $this->sanitize( $_POST[ $field[ 'name' ] ], $type ) );
            }
        }
    }

    private function sanitize( $value, $type ) {
        switch ( $type ) {
            case 'text':
                return sanitize_text_field( $value );
                break;
            case 'wysiwyg':
                return wp_kses_post( $value );
                break;
            default:
                return sanitize_text_field( $value );
        }
    }

    private function create_nonce() {
        $this->nonce = $this->slug . '_nonce';
    }

    protected function fields( $post ) {
        foreach ( $this->fields as $field ) {
            $meta = get_post_meta( $post->ID, $field[ 'name' ], $field[ 'single' ] );
            echo $this->display_field( $field, $meta );
        }
    }

    protected function display_field( $field, $value ) {
        switch ( $field[ 'type' ] ) {
            case 'text':
                return $this->display_text_field( $field, $value );
                break;
            case 'wysiwyg':
                return $this->display_wysiwyg_field( $field, $value );
                break;
        }

        return '';
    }

    protected function display_text_field( $field, $value = '' ) {
        return sprintf(
            '<div class="wc-meta-field wc-meta-text-field"><label for="%s">%s</label><input type="text" name="%s" id="%s" value="%s" /></div>',
            $field[ 'name' ],
            $field[ 'label' ],
            $field[ 'name' ],
            $field[ 'name' ],
            $value
        );
    }

    protected function display_wysiwyg_field( $field, $value = '' ) {
        ob_start();

        wp_editor( $value, $field[ 'name' ] );

        return ob_get_clean();
    }

}
