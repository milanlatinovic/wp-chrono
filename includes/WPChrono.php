<?php

class WPChrono {

	protected $plugin_name;
	protected $version;

	public function __construct() {

		$this->plugin_name = 'wp-chrono';
		$this->version = '1.3';

		add_action( 'wp_enqueue_scripts', array($this, 'registerScripts') );
		add_action( 'wp_enqueue_scripts', array($this, 'registerStyles') );

		$this->registerShortcodes();

	}

	public function registerScripts() {
		wp_enqueue_script( 'coutdowntimer_script', plugins_url( '../public/js/countdowntimer.js', __FILE__ ) );
	}

	public function registerStyles() {
		 wp_enqueue_style( 'coutdowntimer_style', plugins_url( '../public/css/countdowntimer.css', __FILE__ ), array(), '20160617', 'all' );
	}

	public function registerShortcodes() {

		// Create a shortcode to display of current date
		add_shortcode('wpch-currentdate', array($this, 'currentDateShortcode'));
		// Create a shortcode to display of content on current date
		add_shortcode('wpch-ifdate', array($this,'ifDateShortcode'));
		// Create a shortcode to display of content on current date range
		add_shortcode('wpch-ifdaterange', array($this, 'ifDateRangeShortcode'));
		// Create a shortcode to display countdown timer for user selected date
		add_shortcode('wpch-countdowntimer', array($this, 'countdownTimerShortcode'));

	}

	public function currentDateShortcode($atts) {
		$output = '';
		$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);$displaydate_atts = shortcode_atts( array('format' => 'F jS, Y'), $atts);
		$output .= date_i18n($displaydate_atts['format']);
	    return do_shortcode($output);
	}

	public function ifDateShortcode($atts, $content) {
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

	public function ifDateRangeShortcode($atts, $content) {
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

		if ($this->checkDateInRange($displaydate_atts['fromdate'], $displaydate_atts['todate'], date('Y-m-d G:i:s'))){
			return do_shortcode($contents[0]);
		}
		else {
			return do_shortcode($contents[1]);
		}
	}

	public function checkDateInRange($start_date, $end_date, $date_from_user) {
	  // Convert to timestamp (date and time)
	  $start_ts = date('Y-m-d G:i:s', strtotime($start_date));
	  $end_ts = date('Y-m-d G:i:s', strtotime($end_date));
	  $user_ts = date('Y-m-d G:i:s', strtotime($date_from_user));

	  // Check that user date is between start & end
	  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}

	public function countdownTimerShortcode($atts, $content) {
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



		$output = '<div id="wpch_clockdiv_'.$display_atts['name'].'" class="'. $display_atts['template'] .'">
					   <div>
					      <span class="wpch_days"></span>
					      <div class="wpch_smalltext">' .__( 'Days', 'wp-chrono' ) .'</div>
					    </div>
					    <div>
					      <span class="wpch_hours"></span>
					      <div class="wpch_smalltext">' .__( 'Hours', 'wp-chrono' ) .'</div>
					    </div>
					    <div>
					      <span class="wpch_minutes"></span>
					      <div class="wpch_smalltext">' .__( 'Minutes', 'wp-chrono' ) .'</div>
					    </div>
					    <div>
					      <span class="wpch_seconds"></span>
					      <div class="wpch_smalltext">' .__( 'Seconds', 'wp-chrono' ) .'</div>
					    </div>
					</div>
					<div id="wpch_clockdivcontent_'.$display_atts['name'].'">' . $content . '</div>
					<script>
						// initialize script
						initializeClock(\'wpch_clockdiv_'.$display_atts['name'].'\', \'wpch_clockdivcontent_'.$display_atts['name'].'\', \'' . $display_atts['date'] .' \');

					</script>';

		return $output;
	}

}