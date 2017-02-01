<?php
/*
Plugin Name: Wordcasts General Functionality
Plugin URI: https://www.wordcasts.io
Description: General functionality of wordcasts.io such as post types, taxonomies, etc.
Version: 1.0.0
Author: Tristan Gemus
Author URI: http://www.tristangemus.com
Text Domain: wordcasts
Domain Path: /languages
*/

define( 'WORDCASTS_FUNC_LOCALE', 'wordcasts' );

/**
 * Taxonomies
 */
require __DIR__ . '/inc/taxonomies/wordcasts-taxonomy.php';
require __DIR__ . '/inc/taxonomies/taxonomy-component.php';

new Taxonomy_Component;

/**
 * Meta Boxes
 */
require __DIR__ . '/inc/meta_boxes/wc-meta-box.php';
require __DIR__ . '/inc/meta_boxes/wc-featured-meta-box.php';

new WC_Featured_Meta_Box;

/**
 * Misc
 */
require __DIR__ . '/inc/wc-post-extensions.php';

new WC_Post_Extensions;