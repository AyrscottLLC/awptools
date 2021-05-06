<?php
/**
* Plugin Name:      Ayrscott WordPress Tools
* Description:      Our base WordPress library to fork new projects from.
* Author:           Jared De Blander, Ayrscott LLC
* Author URI:       https://ayrscott.com/
*/

// Check for a constant set by WordPress to ensure we are not being access directly
if ( ! defined('ABSPATH') ) {
  exit;
}

// define locations of both this file on the filesystem and the URL path to this file
define('AWPTOOLS_LOCATION_FILE', dirname(__FILE__));
define('AWPTOOLS_LOCATION_URL',  plugins_url('', __FILE__));

// Conditional loading of admin code is performed here:
if ( is_admin() ) {
  // we are in admin mode
  
  // sample include file
  // require_once __DIR__ . '/admin/plugin-name-admin.php'; 
  
  function awp_admin_page_main_menu() {
    echo '
<div class="wrap">
  <h2>Ayrscott WordPress Tools</h2>
    '.awp_copyright_notice().'
</div>
    ';
  }
  
  function awp_admin_menu_entry_main_menu()
  {
    add_menu_page(
      'Ayrscott WordPress Tools',     // page title
      'Ayrscott WP Tools',            // side menu title
      'manage_options',               // what users have access
      'awp-admin-main-menu',          // page slug
      'awp_admin_page_main_menu',     // callback function to render the page
      'dashicons-layout',             // dashicon (blank default is gear) https://developer.wordpress.org/resource/dashicons/
      200                             // sort order
    );
  }
  // register admin menu entry
  add_action(
    'admin_menu',                       // register an admin menu entry
    'awp_admin_menu_entry_main_menu'    // the callback to register the page's entry
  );
}

// callback function for shortocde
function awp_copyright_notice() {
  $min_year = 2021;
  
  
  $the_year = date("Y");
  if (intval($the_year) <= $min_year) {
    $the_year = $min_year;
  } else {
    $the_year = $min_year . ' - '. $the_year;
  }
  
  return 'Ayrscott WordPress Tools &copy; <a href="https://ayrscott.com/" target="_blank">Ayrscott, LLC</a> '.$the_year;
}
// register a desired shortcode with parameters of shortcode, callback function
add_shortcode('awp_copyright', 'awp_copyright_notice');
