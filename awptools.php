<?php
/**
* Plugin Name:      Ayrscott WordPress Tools
* Author:           Jared De Blander, Ayrscott LLC
* Author URI:       https://ayrscott.com/
* Description:      Our base WordPress library to fork new projects from.
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
}
