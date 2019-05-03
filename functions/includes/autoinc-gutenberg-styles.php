<?php
// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'technicks_add_gutenberg_assets' );

/**
 * Load Gutenberg stylesheet.
 */
function technicks_add_gutenberg_assets() {
    // Load the theme styles within Gutenberg.
    wp_enqueue_style( 'technicks-gutenberg', get_theme_file_uri( '/assets/styles/gutenberg/styles.css' ), filemtime(get_template_directory() . '/assets/styles/gutenberg/styles.css'), false );
}