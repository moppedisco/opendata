<?php
/*
Author: Yacine Belarbi
URL: http://studioyacine.ch
*/

/*	LOAD Bones
*   
*   LOAD BONES CORE (if you remove this, the theme will break)
*   
*/
require_once 'library/functions/bones.php';



/*	Load scripts and styles
*   
*   LOAD BONES CORE (if you remove this, the theme will break)
*   
*/
require_once 'library/functions/scripts_and_styles.php';


/*	Theme Support
*
*	  Used to add theme support for
*	  required functionality ( add_theme_support() )
*
*/
require_once 'library/functions/theme_support.php';



/**
 *  Custom Admin 
 */
require_once 'library/functions/admin.php';



/**
 *  Custom Post Types 
 */
require_once 'library/functions/custom-post-type.php';




/**
 *  Helpers
 */
require_once 'library/functions/helpers.php';




/*********************
LAUNCH BONES
Let's get everything up and running.
 *********************/

function bones_ahoy()
{

  //Allow editor style.
  add_editor_style(get_stylesheet_directory_uri() . '/library/css/editor-style.css');

  // let's get language support going, if you need it
  load_theme_textdomain('bonestheme', get_template_directory() . '/library/translation');

  // launching operation cleanup
  add_action('init', 'bones_head_cleanup');
  // A better title
  add_filter('wp_title', 'rw_title', 10, 3);
  // remove WP version from RSS
  add_filter('the_generator', 'bones_rss_version');
  // remove pesky injected css for recent comments widget
  add_filter('wp_head', 'bones_remove_wp_widget_recent_comments_style', 1);
  // clean up comment styles in the head
  add_action('wp_head', 'bones_remove_recent_comments_style', 1);
  // clean up gallery output in wp
  add_filter('gallery_style', 'bones_gallery_style');

  // enqueue base scripts and styles
  add_action('wp_enqueue_scripts', 'bones_scripts_and_styles', 999);
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // cleaning up random code around images
  add_filter('the_content', 'bones_filter_ptags_on_images');
  // cleaning up excerpt
  add_filter('excerpt_more', 'bones_excerpt_more');
} /* end bones ahoy */

// let's get this party started
add_action('after_setup_theme', 'bones_ahoy');


/************* THEME CUSTOMIZE *********************/

function bones_theme_customizer($wp_customize)
{
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __('Theme Colors');
  // $wp_customize->get_section('background_image')->title = __('Images');
}

add_action('customize_register', 'bones_theme_customizer');



/**
 *  Gutenberg settings
 */
require_once 'library/functions/gutenberg-settings.php';



/*******************************************************************************
ADD ACF GLOBAL OPTION 
 *******************************************************************************/
if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Global',
    'menu_title'   => 'Global',
    'menu_slug'   => 'global',
    'capability'   => 'edit_posts',
    'icon_url' => 'dashicons-admin-site',
    'position' => 20
  ));
}

/*******************************************************************************
WYSIWYG
 *******************************************************************************/
add_filter('acf/fields/wysiwyg/toolbars', 'my_toolbars');
function my_toolbars($toolbars)
{

  // Add a new toolbar called "studioyacine custom"
  // - this toolbar has only 1 row of buttons
  $toolbars['studioyacine custom'] = array();
  $toolbars['studioyacine custom'][1] = array('styleselect', 'formatselect', 'bold', 'italic', 'underline', 'alignleft', 'aligncenter', 'alignright', 'bullist', 'numlist', 'link', 'removeformat');


  // Edit the "Full" toolbar and remove 'code'
  // - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
  if (($key = array_search('code', $toolbars['Full'][2])) !== false) {
    unset($toolbars['Full'][2][$key]);
  }

  // remove the 'Basic' toolbar completely
  unset($toolbars['Basic']);

  // return $toolbars - IMPORTANT!
  return $toolbars;
}


// Add new styles to the TinyMCE "formats" menu dropdown
if (!function_exists('studioyacine_styles_dropdown')) {
  function studioyacine_styles_dropdown($settings)
  {

    // Create array of new styles
    $new_styles = array(
      array(
        'title'  => __('Custom Styles', 'studioyacine'),
        'items'  => array(
          array(
            'title'    => __('Button', 'studioyacine'),
            'selector'  => 'p',
            'classes'  => 'button'
          ),
          // array(
          //   'title'    => __('Button Red', 'studioyacine'),
          //   'selector'  => 'p',
          //   'classes'  => 'button-red'
          // ),
          // array(
          //   'title'    => __('Large', 'studioyacine'),
          //   'selector'  => 'p',
          //   'classes'  => 'text-large'
          // ),
          // array(
          //   'title'    => __('Medium', 'studioyacine'),
          //   'selector'  => 'p',
          //   'classes'  => 'text-medium'
          // )
        ),
      ),
    );

    // Merge old & new styles
    $settings['style_formats_merge'] = false;

    // Add new styles
    $settings['style_formats'] = json_encode($new_styles);
    $settings['block_formats'] = 'Paragraph=p; Header 2=h2; Header 3=h3;';

    // Return New Settings
    return $settings;
  }
}
add_filter('tiny_mce_before_init', 'studioyacine_styles_dropdown');

/* DON'T DELETE THIS CLOSING TAG */
