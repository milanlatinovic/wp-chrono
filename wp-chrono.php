<?php
/*
Plugin Name: WP Chrono
Plugin URI: https://projects.justlearnprogramming.com/wp-chrono
Description: Easy Time and Date manipulation(s) with your content, using shortcodes.
Version: 1.5
Author: Milan Latinović
Author URI: http://www.milanlatinovic.com
Text Domain: wp-chrono
*/

require_once "includes/WPChrono.php";

global $wpChronoMainObject;

$wpChronoMainObject = new WpChrono();

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

