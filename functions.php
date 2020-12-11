<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function my_theme_enqueue_styles()
{
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();


    //Normal Style--------------------------
    wp_enqueue_style(
        $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );

    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array($parenthandle),
        $theme->get('Version') // this only works if you have Version in the style header
    );



    //WooCommerce Style--------------------------
    $wooparenthandle = 'kota-woocommerce-style';
    $theme = wp_get_theme();
    wp_enqueue_style($wooparenthandle, get_template_directory_uri() . '/woocommerce.css',);
    wp_enqueue_style(
        'woo-child-style',
        get_stylesheet_directory_uri() . '/woocommerce_child.css',
        array($wooparenthandle),
        $theme->get('Version')
    );
}
//Custom widget header Area--------------------------
function wpb_widgets_init()
{

    register_sidebar(array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="chw-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'wpb_widgets_init');

// Custom JavaScript---------------------
function my_custom_scripts()
{
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'my_custom_scripts');