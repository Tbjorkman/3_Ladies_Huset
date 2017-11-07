<?php

function my_theme_enqueue_styles() {

    $parent_style = 'twentyseventeen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function custom_post_type_cat_filter($query) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ($query->is_category()) {
            $query->set( 'post_type', array( 'post', 'Events', 'Venues' ));
        }
    }
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action('pre_get_posts','custom_post_type_cat_filter');

