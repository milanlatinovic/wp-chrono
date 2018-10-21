=== WP Chrono ===
Contributors: latinovic,ljiljau
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=milan.softline%40gmail%2ecom&item_name=WP%20Chrono&item_number=Support%20WP%20Chrono%20Open%20Source&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: shortcode, post, page, time, date, show time, show date, content, content dripping
Requires at least: 3.5
Tested up to: 4.9.8
Stable tag: 1.5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Chrono is plugin that uses simple shortcodes to help you show parts of your pages and posts at specific time and date range(s).

== Description ==

Do you need simple **CTM Content Time Management tool** ?
Do you need to provide users with content (i.e. Coupon Codes) only on specific time and date ?
Do you want to create Content Dripping on your web pages using nothing but shortcodes ?

**WP Chrono** provides you with predefined shortcodes for accomplishing various tasks related to controling WordPress content.


If you want to accomplish these things easy:

* Show current time anywhere on your site
* Show certain parts of your posts/pages on specific dates
* Show certain parts of your posts/pages on specific date ranges
* Create IF-ELSE rules for displaying your content, related to specific dates
* Create lightweight countdown timer (plain JavaScript) with templating support


This plugin pays special attention to multilanguage compatibility and e-commerce platforms compatibility:

* WPML compatible (https://wpml.org/plugin/wp-chrono/)
* WooCommerce Multilingual compatible
* qTranslate compatible
* WooCommerce compatible


Currently supported shortcodes:

* [wpch-currentdate] - show current date & time
* [wpch-ifdate] - show content on specific date
* [wpch-ifdaterange] - show content on specific date range
* [wpch-countdowntimer] - create lightweight countdown timer for your content (templates supported!)

Templates: darkblue, blue, darkpurple, purple, green, red, yellow

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use plugin shortcodes within your posts


== Frequently Asked Questions ==

= How to print current date and time? =

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


= How to show customized content on specific date? =

For example, create logic that will print some content specifically on 7th April, year 2016.
We will use wpch-ifdate shortcode with date attribute. Format of date attribute **must be** yyyy/mm/dd,
so our date entry will be "2016/04/07", and short code will look like this.

<pre>[wpch-ifdate date="2016/04/07"]This is content that will be printed only on 7th April, year 2016.
This content supports all WP editor native functions, so what you see if what you get. [else]This is
part of the content that will be printed if day is not 7th April, so before or after it! :)[/wpch-ifdate]</pre>

= How to handle date ranges? =

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

= How to create Lightweight Countdown Timer? =
Use one of predefined templates to quickly create light weight CountDown timer,
using this shortcode:

<pre>
[wpch-countdowntimer name="first" date="25 Dec 2018 13:30:00 GMT" template="darkblue"]
This is content that will be previewed after counter finished countdown.
Note: This content in CSS hidden, so it's visible inside code at client side.
[/wpch-countdowntimer]
</pre>

== Screenshots ==

== Changelog ==

= 1.5.4 =
* Compatibility: Tested for WordPress 4.9.8

= 1.5.3 =
* Compatibility: Fixed issues when running on PHP 5- environments  (Thanks to S. Djukic)

= 1.5.2 =
* Compatibility: Tested for WordPress 4.9
* Documentation: Support forums and review links within admin panel. Share a love! :)

= 1.5.1 =
* Compatibility: Tested for WordPress 4.8.3
* Documentation: Additional improvements to plugin documentation

= 1.5 =
* Compatibility: Tested for WordPress 4.8
* Resolved: Bug with local formats (Thanks @toddedelman for reporting)

= 1.4 =
* Compatibility: Tested for WordPress 4.7.2
* Resolved: Bug with [wpch-ifdate] shortcode
* Resolved: Bug with [wpch-ifdaterange] hour, minutes, seconds

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
