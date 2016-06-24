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

// 1.2
// Registers all scripts used in plugin
add_action( 'wp_enqueue_scripts', 'wpch_register_scripts' );

// 1.3.
// Registers all styles used in plugin
add_action( 'wp_enqueue_scripts', 'wpch_register_styles' );

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

	// Create a shortcode to display countdown timer for user selected date
	add_shortcode('wpch-countdowntimer', 'wpch_countdowntimer');

}

// 2.2
// Registers all scripts used in plugin
function wpch_register_scripts() {
	wp_enqueue_script( 'coutdowntimer_script', plugins_url( '/js/countdowntimer.js', __FILE__ ) );
}

// 2.3
// Registers all styles used in plugin
function wpch_register_styles() {
	 wp_enqueue_style( 'coutdowntimer_style', plugins_url( '/css/countdowntimer.css', __FILE__ ), array(), '20160617', 'all' );
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


// 5.5
// Function to display countdowntimer for user defined timeframe 
function wpch_countdowntimer($atts, $content) {
	$output = '';
	$display_atts = shortcode_atts(
		array(
			'name' => '',
			'date' => '', 
			'template' => '',
		), $atts
	);

	// Convert template attribute intro appropriate CSS class
	switch($display_atts['template']) {
		case "darkblue": $display_atts['template'] = "wpch_darkblue"; break;
		case "blue": $display_atts['template'] = "wpch_blue"; break;
		case "darkpurple": $display_atts['template'] = "wpch_darkpurple"; break;
		case "purple": $display_atts['template'] = "wpch_purple"; break;
		case "green": $display_atts['template'] = "wpch_green"; break;
		case "lightgreen": $display_atts['template'] = "wpch_lightgreen"; break;
		case "red": $display_atts['template'] = "wpch_red"; break;
		case "yellow": $display_atts['template'] = "wpch_yellow"; break;
		default: $display_atts['template'] = "wpch_default"; break;
	}



	$output = '<div id="wpch_clockdiv_'.$display_atts['name'].'" class="'. $display_atts['template'] .'"> ' .$counterdate . '
				   <div>
				      <span class="wpch_days"></span>
				      <div class="wpch_smalltext">Days</div>
				    </div>
				    <div>
				      <span class="wpch_hours"></span>
				      <div class="wpch_smalltext">Hours</div>
				    </div>
				    <div>
				      <span class="wpch_minutes"></span>
				      <div class="wpch_smalltext">Minutes</div>
				    </div>
				    <div>
				      <span class="wpch_seconds"></span>
				      <div class="wpch_smalltext">Seconds</div>
				    </div>
				</div>
				<div id="wpch_clockdivcontent_'.$display_atts['name'].'">' . $content . '</div>
				<script>
					// initialize script
					initializeClock(\'wpch_clockdiv_'.$display_atts['name'].'\', \'wpch_clockdivcontent_'.$display_atts['name'].'\', \'' . $display_atts['date'] .' \');

				</script>';

	return $output;
}


/* 6. HELPERS */
		
/* 7. CUSTOM POST TYPES */
	
/* 8. ADMIN PAGES */
	
/* 9. SETTINGS */