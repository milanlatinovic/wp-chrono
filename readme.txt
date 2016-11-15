=== WP Chrono ===
Contributors:
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=milan.softline%40gmail%2ecom&item_name=WP%20Chrono&item_number=Support%20WP%20Chrono%20Open%20Source&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: shortcode, post, page, time, date, show time, show date, content, content dripping
Requires at least: 3.0.1
Tested up to: 4.6.1
Stable tag: 2.3.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WordPress Chronosphere (WP Chrono) provides Custom Shortcodes for Time and Date manipulation(s) with WordPress content.
This plugin is WPML and WooCommerce compatible.

== Description ==

**WP Chrono** provides you with predefines shortcodes for accomplishing various tasks related to controling WordPress content.


If you want to accomplish these things easy:

* Show current time anywhere on your site
* Show certain parts of your posts/pages on specific dates
* Show certain parts of your posts/pages on specific date ranges
* Create IF-ELSE rules for displaying your content, related to specific dates
* Create lightweight countdown timer (plain JavaScript) with templating support


This plugin pays special attention to multilanguage compatibility and e-commerce platforms compatibility:

* WPML compatible (currently under testing and WPML approval)
* WooCommerce Multilingual (tested - Version 3.8)
* qTranslate compatible (tested - Version 3.4.6.8)
* WooCommerce (tested - Version 2.6.0)


Currently supported shortcodes:

* [wpch-currentdate] - show current date & time
* [wpch-ifdate] - show content on specific date
* [wpch-ifdaterange] - show content on specific date range


<h2>1.1 Current date and time</h2>
Use this shortcode to preview current date anywhere in your content, and format it as you prefer.

* [wpch-currentdate] - May 18th, 2016
* [wpch-currentdate format="F j, Y g:i a"] - May 18, 2016 9:44 pm
* [wpch-currentdate format="F j, Y"] - May 18, 2016
* [wpch-currentdate format="F, Y"] - May, 2016
* [wpch-currentdate format="g:i a"] - 9:44 pm
* [wpch-currentdate format="g:i:s a"] - 9:44:38 pm
* [wpch-currentdate format="M j, Y @ G:i"] - May 18, 2016 @ 9:44
* [wpch-currentdate format="Y/m/d \a\t g:i A"] - 2016/05/18 9:44 PM
* [wpch-currentdate format="Y/m/d \a\t g:ia"] - 2016/05/18 9:44pm
* [wpch-currentdate format="Y/m/d g:i:s A"] - 2016/05/18 9:44:38 PM
* [wpch-currentdate format="Y/m/d"] - 2016/05/18
* [wpch-currentdate format="g:i:s A"] - 9:44:38 PM
* [wpch-currentdate format="g:i:s P"] - 9:44:38 +03:00


<h2>1.2 Show customized content on specific date</h2>
For example, create logic that will print some content specifically on 7th April, year 2016.
We will use wpch-ifdate shortcode with date attribute. Format of date attribute **must be** yyyy/mm/dd,
so our date entry will be "2016/04/07", and short code will look like this.

<pre>[wpch-ifdate date="2016/04/07"]This is content that will be printed only on 7th April, year 2016.
This content supports all WP editor native functions, so what you see if what you get. [else]This is
part of the content that will be printed if day is not 7th April, so before or after it! :)[/wpch-ifdate]</pre>

<h2>1.3 Date ranges</h2>
Example shortcode use for **date ranges between 1st April and 10th April of 2016.**

<pre>[wpch-ifdaterange fromdate="2016/04/01" todate="2016/04/10" ]This is content that will be printed only for
range 1st to 10th April, year 2016. This content supports all WP editor native functions, so what you see
if what you get.[else]This is part of the content that will be printed if day is not within a
given range.[/wpch-ifdaterange]</pre>


Example shortcode use for **date ranges between 1st March and 10th March of 2016.**

<pre>
[wpch-ifdaterange fromdate="2016/03/01" todate="2017/05/17"]
	This copy will be printed if range is between 2016/03/01 and 2017/05/17 :) :) YAY!
	For, example, we have some promo codes, which changes from day to day:
	[wpch-ifdate date="2016/04/20"]<strong>Promo code for today is</strong>: MyPromoCode-001[/wpch-ifdate]
	[wpch-ifdate date="2016/04/21"]<strong>Promo code for today is</strong>: MyPromoCode-002[/wpch-ifdate]
	[wpch-ifdate date="2016/04/22"]<strong>Promo code for today is</strong>: MyPromoCode-003[/wpch-ifdate]
	[wpch-ifdate date="2016/04/23"]<strong>Promo code for today is</strong>: MyPromoCode-004[/wpch-ifdate]
	[wpch-ifdate date="2016/04/24"]<strong>Promo code for today is</strong>: MyPromoCode-005[/wpch-ifdate]
	[else]
	This is part of the content that will be printed if day is not within a given range.
[/wpch-ifdaterange]
</pre>

<h2>1.4 Lightweight Countdown Timer</h2>
Use one of predefined templates to quickly create light weight CountDown timer,
using this shortcode:

<pre>
[wpch-countdowntimer name="first" date="2016-08-24 11:23 PM" template="darkblue"]
This is content that will be previewed after counter finished countdown.
Note: This content in CSS hidden, so it's visible inside code at client side.
[/wpch-countdowntimer]
</pre>

Templates: darkblue, blue, darkpurple, purple, green, red, yellow

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use plugin shortcodes within your posts


== Frequently Asked Questions ==

= How can I create logic for specific date range, that includes exceptions for specific dates? =

wordPress Chronosphere enables usage of shortcodes within shortcodes. For this specific need, you could
create a construction like this one:

<pre>
[wpch-ifdaterange fromdate="2016/03/01" todate="2017/05/17"]
	This copy will be printed if range is between 2016/03/01 and 2017/05/17 :) :) YAY!
	For, example, we have some promo codes, which changes from day to day:
	[wpch-ifdate date="2016/04/20"]<strong>Promo code for today is</strong>: MyPromoCode-001[/wpch-ifdate]
	[wpch-ifdate date="2016/04/21"]<strong>Promo code for today is</strong>: MyPromoCode-002[/wpch-ifdate]
	[wpch-ifdate date="2016/04/22"]<strong>Promo code for today is</strong>: MyPromoCode-003[/wpch-ifdate]
	[wpch-ifdate date="2016/04/23"]<strong>Promo code for today is</strong>: MyPromoCode-004[/wpch-ifdate]
	[wpch-ifdate date="2016/04/24"]<strong>Promo code for today is</strong>: MyPromoCode-005[/wpch-ifdate]
	[else]
	This is part of the content that will be printed if day is not within a given range.
[/wpch-ifdaterange]
</pre>

== Screenshots ==

== Changelog ==

= 1.3 =
* Added full support to WPML (Big thanks to WPML Compatibility Team, especially to Vuk Vukovic, Amit Kvint and Mohamed Khafaja)
* Compatibility: Tested for Wordpress 4.6.1

= 1.2 =
* Feature: Added new shortcode [wpch-countdowntimer] for light weight Count Down Timer
* Feature: Added different templates for Count Down Timer
* Documentation: Additional improvements to plugin documentation

= 1.1.1 =
* Compatibility: Tested for WordPress 4.5.2
* Documentation: Description improved and code additionaly commented

= 1.1 =
* Feature: Added Time support to [wpch-ifdate] and [wpch-daterange] shortcodes
* Feature: Added "Y-m-d G:i:s" format support to [wpch-ifdate] and [wpch-daterange] shortcodes

= 1.0 =
* Major: Initial version of WordPress Chronosphere plugin

== Upgrade Notice ==

= 1.2 =
Have idea for a new feature of this plugin? Leave us <a href="https://wordpress.org/support/plugin/wp-chrono"  target="_blank">request for feature</a> and <a href="https://wordpress.org/support/view/plugin-reviews/wp-chrono"  target="_blank">give us a great review.</a> All best! :)

= 1.0 =
This is lightweight plugin which provides great shortcode functionalities, there is no reason not to have it in your stack. :)
