<?php
/*
Plugin Name: Wordcasts General Functionality
Plugin URI: https://www.wordcasts.io
Description: General functionality of wordcasts.io such as post types, taxonomies, etc.
Version: 1.0.1
Author: Tristan Gemus
Author URI: http://www.tristangemus.com
Text Domain: wordcasts
Domain Path: /languages
*/

define( 'WORDCASTS_FUNC_LOCALE', 'wordcasts' );
define( 'WORDCASTS_FUNC_ROOT', __DIR__ );
define( 'WORDCASTS_FUNC_VIEWS_DIR', WORDCASTS_FUNC_ROOT . '/templates' );

/**
 * Helpers
 */
require __DIR__ . '/inc/helpers/wc-view.php';

/**
 * Taxonomies
 */
require __DIR__ . '/inc/taxonomies/wordcasts-taxonomy.php';
require __DIR__ . '/inc/taxonomies/taxonomy-hook.php';
require __DIR__ . '/inc/taxonomies/taxonomy-filter.php';
require __DIR__ . '/inc/taxonomies/taxonomy-function.php';

new Taxonomy_Filter;
new Taxonomy_Hook;
new Taxonomy_Function;

/**
 * Meta Boxes
 */
require __DIR__ . '/inc/meta_boxes/wc-meta-box.php';
require __DIR__ . '/inc/meta_boxes/wc-featured-meta-box.php';

new WC_Featured_Meta_Box;

/**
 * Widgets
 */
require __DIR__ . '/inc/widgets/widget-post-taxonomies.php';

function wordcasts_register_widgets() {
    register_widget( 'Post_Taxonomies_Widget' );
}
add_action( 'widgets_init', 'wordcasts_register_widgets' );

/**
 * Misc
 */
require __DIR__ . '/inc/misc/wc-post-extensions.php';

new WC_Post_Extensions;