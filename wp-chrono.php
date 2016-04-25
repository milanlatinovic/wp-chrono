<?php
/*
Plugin Name: WP Chrono
Plugin URI: http://www.milanlatinovic.com/plugins
Description: WordPress Chronosphere (WP Chrono) provides Custom Shortcodes for Time and Date manipulation(s) with WordPress content. This plugin is WPML and WooCommerce compatible.
Version: 1.0.0
Author: Milan Latinović
Author URI: http://www.milanlatinovic.com
*/

// Create a shortcode hook for display of current date
add_shortcode( 'cft-currentdate', 'currentdate' );

// Create a shortcode hook for display of content on current date
add_shortcode('cft-ifdate', 'ifdate');

// Create a shortcode hook for display of content on current date range
add_shortcode('cft-ifdaterange', 'ifdaterange');

// Function to display Current Date
function currentdate( $atts ){
	$output = '';
	$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);
	$output .= date_i18n($displaydate_atts['format']);
    return do_shortcode($output);
}

// Function to display IF Date
function ifdate($atts, $content) {
	$output = '';
   if (empty($atts)) return '';
	$displaydate_atts = shortcode_atts( array('date' => ''), $atts);
	$contents = explode("[else]", $content);
	
	if($displaydate_atts['date'] == date('Y/m/d')){
		return do_shortcode($contents[0]);
	}
	else {
		return do_shortcode($contents[1]);
	}
}

// Function to display IF Date Range
function ifdaterange($atts, $content) {
	$output = '';
   if (empty($atts)) return '';
	$displaydate_atts = shortcode_atts( array('fromdate' => '', 'todate' => ''), $atts);
	$contents = explode("[else]", $content);
	
	if (check_in_range($displaydate_atts['fromdate'], $displaydate_atts['todate'], date('Y/m/d'))){
		return do_shortcode($contents[0]);
	}
	else {
		return do_shortcode($contents[1]);
	}
}
 
function check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}
