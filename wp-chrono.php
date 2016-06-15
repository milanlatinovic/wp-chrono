<?php
/*
Plugin Name: WP Chrono
Plugin URI: https://github.com/milanlatinovic/wp-chrono
Description: Easy Time and Date manipulation(s) with your content. This plugin is WPML and WooCommerce compatible.
Version: 1.1.1
Author: Milan Latinović
Author URI: http://www.milanlatinovic.com
*/

/*
Copyright (C) 2016 Milan Latinović, milanlatinovic.com (milan.latinovic AT live DOT com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/* TABLE OF CONTENTS */

/*
	
	1. HOOKS
	
	2. SHORTCODES
		2.1 - wpch_register_shortcodes()
		
	3. FILTERS
		
	4. EXTERNAL SCRIPTS
		
	5. ACTIONS
		5.1. - wpch_currentdate($atts)
		5.2. - wpch_ifdate($atts, $content)
		5.3. - wpch_ifdaterange($atts, $content)
		5.4. - wpch_check_in_range($start_date, $end_date, $date_from_user)
	
	6. HELPERS
		
	7. CUSTOM POST TYPES
	
	8. ADMIN PAGES
	
	9. SETTINGS

*/

/* 1. HOOKS */

// 1.1
// Registers all our custom shortcodes on init
add_action('init', 'wpch_register_shortcodes');

/* 2. SHORTCODES */

// 2.1
// Registers all our custom shortcodes
function wpch_register_shortcodes() {
	
	// Create a shortcode to display of current date
	add_shortcode('wpch-currentdate', 'wpch_currentdate');

	// Create a shortcode to display of content on current date
	add_shortcode('wpch-ifdate', 'wpch_ifdate');

	// Create a shortcode to display of content on current date range
	add_shortcode('wpch-ifdaterange', 'wpch_ifdaterange');

}


/* 3. FILTERS */

/* 4. EXTERNAL SCRIPTS */

/* 5. ACTIONS */

// 5.1
// Function to display Current Date
function wpch_currentdate($atts){
	$output = '';
	$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);
	$output .= date_i18n($displaydate_atts['format']);
    return do_shortcode($output);
}

// 5.2
// Function to display IF Date
function wpch_ifdate($atts, $content) {
	$output = '';
   if (empty($atts)) return '';
	$displaydate_atts = shortcode_atts( array('date' => ''), $atts);
	
	// Read Shortcode IF options
	$contents = explode("[else]", $content);
	if ( ! isset($contents[0])) {
   		$contents[0] = null;
	}
	if ( ! isset($contents[1])) {
   		$contents[1] = null;
	}

	if($displaydate_atts['date'] == date('Y-m-d G:i:s')){
		return do_shortcode($contents[0]);
	}
	else {
		return do_shortcode($contents[1]);
	}
}

// 5.3
// Function to display IF Date Range
function wpch_ifdaterange($atts, $content) {
	$output = '';
   if (empty($atts)) return '';
	$displaydate_atts = shortcode_atts( array('fromdate' => '', 'todate' => ''), $atts);
	
	// Read Shortcode IF options
	$contents = explode("[else]", $content);
	if ( ! isset($contents[0])) {
   		$contents[0] = null;
	}
	if ( ! isset($contents[1])) {
   		$contents[1] = null;
	}

	if (wpch_check_in_range($displaydate_atts['fromdate'], $displaydate_atts['todate'], date('Y-m-d G:i:s'))){
		return do_shortcode($contents[0]);
	}
	else {
		return do_shortcode($contents[1]);
	}
}

// 5.4
// Function to check if date is in specific range
function wpch_check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp (date and time)
  $start_ts = date('Y-m-d G:i:s', strtotime($start_date));
  $end_ts = date('Y-m-d G:i:s', strtotime($end_date));
  $user_ts = date('Y-m-d G:i:s', strtotime($date_from_user));

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

/* 6. HELPERS */
		
/* 7. CUSTOM POST TYPES */
	
/* 8. ADMIN PAGES */
	
/* 9. SETTINGS */