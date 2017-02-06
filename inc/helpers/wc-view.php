<?php

class WC_View {

    public static function render( $template, $data = array() ) {
        ob_start();

        $file = WORDCASTS_FUNC_VIEWS_DIR . '/' . $template;

        if ( file_exists( $file ) ) {
            require $file;
        }

        return ob_get_clean();
    }

    public static function display( $template, $data = array() ) {
        echo self::render( $template, $data );
    }

}