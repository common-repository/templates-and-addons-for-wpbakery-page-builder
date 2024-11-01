<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => 'Temaplates & Addons Settings',
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'templates-addons',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Temaplates & Addons',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

// ----------------------------------------
// a option section for options overview  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'overwiew',
  'title'       => 'Overview',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

    array(
      'id'      => 'color',
      'type'    => 'color_picker',
      'title'   => 'Template Color (<span style="color: #d63434">Pro Only</span>)',
      'default' => '#2387ea',
    ),
    array(
      'type'    => 'notice',
      'class'   => 'danger',
      'content' => '<h3 align="center">To get all features working, please buy the pro version here <a target="_blank" href="https://codenpy.com/item/templates-and-addons-for-wpbakery-page-builder/">Templates and Addons for WPBakery Page Builder</a> for only $13</h3>',
    ),    

  ), // end: fields
);


CSFramework::instance( $settings, $options );
