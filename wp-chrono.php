<?php
/*
Plugin Name: WP Chrono
Plugin URI: https://github.com/milanlatinovic/wp-chrono
Description: Create dynamic content on your web site using simple shortcodes! Show current time, create lightweight countdown timerm easily implement content dripping for your users. CTM Content Time Management made easy! :)
Version: 1.5.4
Tags: shortcode, post, page, time, date, show time, show date, content, content dripping
Author: Milan Latinović
Author URI: https://www.milanlatinovic.com
Text Domain: wp-chrono
*/

require_once "includes/WPChrono.php";

global $wpChronoMainObject;

$wpChronoMainObject = new WpChrono();

register_deactivation_hook( __FILE__, function() {
		delete_option( 'wpch-notices-afterinstallmessage-dismissed');
});


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

