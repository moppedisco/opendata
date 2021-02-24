<?php

/*********************
THEME SUPPORT
 *********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support()
{

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support('post-thumbnails');

    // default thumb size
    // set_post_thumbnail_size(125, 125, true);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // adding post format support
    // add_theme_support( 'post-formats',
    // 	array(
    // 		'aside',             // title less blurb
    // 		'gallery',           // gallery of images
    // 		'link',              // quick link to other site
    // 		'image',             // an image
    // 		'quote',             // a quick quote
    // 		'status',            // a Facebook like status update
    // 		'video',             // video
    // 		'audio',             // audio
    // 		'chat'               // chat transcript
    // 	)
    // );

    // wp menus
    add_theme_support('menus');

    // logo
    add_theme_support('custom-logo');

    // -- Disable Gradients
    add_theme_support('disable-custom-colors');

    // registering wp3+ menus
    register_nav_menus(
        array(
            'main-nav' => __('The Main Menu', 'bonestheme'),
            'footer-links' => __('Footer Links', 'bonestheme') // secondary nav in footer
        )
    );


    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Blue', 'bonestheme'),
            'slug'  => 'blue',
            'color'    => '#19D2D7',
        ),
        array(
            'name'  => __('Peach', 'bonestheme'),
            'slug'  => 'peach',
            'color' => '#fbebdb',
        ),
        array(
            'name'    => __('Red', 'bonestheme'),
            'slug'    => 'red',
            'color'    => '#FE412E',
        ),
    ));

    add_theme_support('editor-font-sizes', array(
        array(
            'name'      => __('Label', 'bonestheme'),
            'shortName' => __('label', 'bonestheme'),
            'size'      => 12,
            'slug'      => 'label'
        ),
        array(
            'name'      => __('Small', 'bonestheme'),
            'shortName' => __('S', 'bonestheme'),
            'size'      => 14,
            'slug'      => 'small'
        ),
        array(
            'name'      => __('Medium', 'bonestheme'),
            'shortName' => __('M', 'bonestheme'),
            'size'      => 28,
            'slug'      => 'medium'
        ),
        array(
            'name'      => __('Large', 'bonestheme'),
            'shortName' => __('L', 'bonestheme'),
            'size'      => 40,
            'slug'      => 'large'
        ),
        array(
            'name'      => __('XL', 'bonestheme'),
            'shortName' => __('XL', 'bonestheme'),
            'size'      => 60,
            'slug'      => 'xl'
        )
    ));

    // Enable support for HTML5 markup.
    add_theme_support('html5', array(
        'comment-list',
        'search-form',
        'comment-form'
    ));
}
