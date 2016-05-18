=== WP Chrono ===
Contributors: 
Donate link: 
Tags: time, date, content dripping
Requires at least: 3.0.1
Tested up to: 4.5
Stable tag: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Want to show current date and time on your site? Need to show certain parts of your pages on specific date ranges?
WordPress Chronosphere (WP Chrono) provides Custom Shortcodes for Time and Date manipulation(s) with WordPress content. 
This plugin is WPML and WooCommerce compatible.

== Description ==

Want to show current time on your site? Need to show certain parts of your pages on specific date ranges?
WordPress Chronosphere (WP Chrono) provides Custom Shortcodes for Time and Date manipulation(s) with WordPress content. 
This plugin is WPML and WooCommerce compatible.

Currently supported shortcodes:

[wpch-currentdate] - show current date & time

[wpch-ifdate] - show content on specific date

[wpch-ifdaterange] - show content on specific date range


<h2>1.1 - Current date and time</h2>

[wpch-currentdate] - May 18th, 2016
[wpch-currentdate format="F j, Y g:i a"] - May 18, 2016 9:44 pm
[wpch-currentdate format="F j, Y"] - May 18, 2016
[wpch-currentdate format="F, Y"] - May, 2016 
[wpch-currentdate format="g:i a"] - 9:44 pm
[wpch-currentdate format="g:i:s a"] - 9:44:38 pm
[wpch-currentdate format="M j, Y @ G:i"] - May 18, 2016 @ 9:44
[wpch-currentdate format="Y/m/d \a\t g:i A"] - 2016/05/18 9:44 PM
[wpch-currentdate format="Y/m/d \a\t g:ia"] - 2016/05/18 9:44pm
[wpch-currentdate format="Y/m/d g:i:s A"] - 2016/05/18 9:44:38 PM
[wpch-currentdate format="Y/m/d"] - 2016/05/18
[wpch-currentdate format="g:i:s A"] - 9:44:38 PM
[wpch-currentdate format="g:i:s P"] - 9:44:38 +03:00

<h2>1.2 - Show customized content on specific date</h2>
For example, we want to create logic that will print some content specifically on 7th April, year 2016. We will use wpch-ifdate shortcode with date attribute. Format of date attribute <strong>must be</strong> yyyy/mm/dd, so our date entry will be "2016/04/07", and short code will look like this.
<pre>[ wpch-ifdate date="2016/04/07" ]This is content that will be printed only on 7th April, year 2016. This content supports all WP editor native functions, so what you see if what you get. [ else ]This is part of the content that will be printed if day is not 7th April, so before or after it! :)[ /wpch-ifdate ]</pre>
Above example will provide us with result:

[wpch-ifdate date="2016/04/07"]This is content that will be printed only on 7th April, year 2016. This content supports all WP editor native functions, so what you see if what you get.[else]This is part of the content that will be printed if day is not 7th April, so before or after it! :)[/wpch-ifdate]

&nbsp;

And this is example result for same shortcode, but for 8th April, year 2016

[wpch-ifdate date="2016/04/08"]This is content that will be printed only on 8th April, year 2016. This content supports all WP editor native functions, so what you see if what you get.[else]This is part of the content that will be printed if day is not 8th April, so before or after it! :)[/wpch-ifdate]

&nbsp;
<h2>1.3 - Date ranges</h2>
Example shortcode use for <strong>date ranges between 1st April and 10th April of 2016.</strong>

[ wpch-ifdaterange fromdate="2016/04/01" todate="2016/04/10" ]This is content that will be printed only for range 1st to 10th April, year 2016. This content supports all WP editor native functions, so what you see if what you get.[else]This is part of the content that will be printed if day is not within a given range.[ /wpch-ifdaterange ]

Result for example shortcode:

[wpch-ifdaterange fromdate="2016/04/01" todate="2016/04/10"]This is content that will be printed only for range 1st to 10th April, year 2016. This content supports all WP editor native functions, so what you see if what you get.[else]This is part of the content that will be printed if day is not within a given range.[/wpch-ifdaterange]

&nbsp;

<strong>Example shortcode use for <strong>date ranges between 1st March and 10th March of 2016.</strong>

[ wpch-ifdaterange fromdate="2016/03/01" todate="2017/05/17"]
	This copy will be printed if range is between 2016/03/01 and 2017/05/17 :) :) YAY!
	For, example, we have some promo codes, which changes from day to day:
	[ wpch-ifdate date="2016/04/20"]<strong>Promo code for today is</strong>: MyPromoCode-001[ /wpch-ifdate]
	[ wpch-ifdate date="2016/04/21"]<strong>Promo code for today is</strong>: MyPromoCode-002[ /wpch-ifdate]
	[ wpch-ifdate date="2016/04/22"]<strong>Promo code for today is</strong>: MyPromoCode-003[ /wpch-ifdate]
	[ wpch-ifdate date="2016/04/23"]<strong>Promo code for today is</strong>: MyPromoCode-004[ /wpch-ifdate]
	[ wpch-ifdate date="2016/04/24"]<strong>Promo code for today is</strong>: MyPromoCode-005[ /wpch-ifdate]
	[ else]
	This is part of the content that will be printed if day is not within a given range.
[ /wpch-ifdaterange]

Result for above example:

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

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use plugin shortcodes within your posts


== Frequently Asked Questions ==

= How can I create logic for specific date range, that includes exceptions for specific dates? =

wordPress Chronosphere enables usage of shortcodes within shortcodes. For this specific need, you could
create a construction like this one:

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

== Screenshots ==

== Changelog ==

= 1.1 =
* Added Time support to [wpch-ifdate] and [wpch-daterange] shortcodes
* Added "Y-m-d G:i:s" format support to [wpch-ifdate] and [wpch-daterange] shortcodes

= 1.0 =
* Initial version of WordPress Chronosphere plugin

== Upgrade Notice ==

= 1.0 =
This is lightweight plugin which provides great shortcode functionalities, there is no reason not to have it in your stack. :)