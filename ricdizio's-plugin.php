<?php


/**
 * @package ricdizio's plugin
 *
 *
 Plugin Name: ricdizio's plugin
 Plugin URI:  https://github.com/ricdizio/WordpressPlugin/
 Description: Plugin made for an interview
 Author:      ricdizio
 Author URI:  https://github.com/ricdizio
 License:     GPLv3 or later
 Text Domain: ricdizio's plugin
 */

// Security
defined( 'ABSPATH') or die("You can\t access to this file" );

//Global plugin path
define('PLUGIN_PATH'         , plugin_dir_path( __FILE__ ) );
define('PLUGIN_URL'          , plugin_dir_url (__FILE__) );
define('PLUGIN_BASENAME'     , plugin_basename(__FILE__ ) );

//Load package
if( file_exists (  dirname(__FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once ( dirname(__FILE__) . '/vendor/autoload.php' );
}

//Validate if the class existe
if ( class_exists ( 'Inc\\Init') ) { 

    Inc\Init::register_services();

}

