=== WPcalc - create any online calculators ===
Contributors: Wpcalc
Donate link: http://wpcalc.com/
Tags: calculator
Requires at least: 3.8
Tested up to: 5.7
Requires PHP: 5.3
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily creation of online calculators on Wordpress. 

== Description ==
You can easily create an online calculators for both yourself and your customers.
Easily add basic form elements like checkboxes, dropdown menus, radio buttons etc. with only a few clicks

== For Example ==
* [Online Reliability Calculator](http://areliability.com/onlajn-kalkulyator-nadyozhnosti/)

= Main features =
* Any number of calculated fields can be added
* Easy and visual calculator interface
* Use checkboxes, dropdown menus, radio buttons and input elements for calculator
* “Dublicate” button to duplicate a form
* Create up to 3 calculators for your needs
* Copy and paste the shortcode of the window anywhere
* Grid style
* Configuring calculator styles
* Create custom formulas for calculating
* Stylize the result of the calculation
* Multiple calculation results for a calculator

= Pro version =
Discover even more features with the Pro version:

* Unlimited forms
* Integration with Mailchimp and Getresponse									
* Send the message to the admin and user
* Add email to database
* Add form after post content
* Widget with form			
* Copying and export of the contact list in .xls, .csv

[Buy Pro version](https://wow-estore.com/en/wow-forms-pro/)

== Screenshots ==

1. Customize fields
2. Customize the style
3. Ideal Weight Calculator
4. Loan Calculator

== Installation ==

* Installation option 1: Find and install this plugin in the `Plugins` -> `Add new` section of your `wp-admin`
* Installation option 2: Download the zip file, then upload the plugin via the wp-admin in the `Plugins` -> `Add new` section. Or unzip the archive and upload the folder to the plugins directory `/wp-content/plugins/` via ftp
* Press `Activate` when you have installed the plugin via dashboard or press `Activate` in the in the `Plugins` list 
* Go to `WPcalc` section that will appear in your main menu on the left
* Click `Add new` to create your first calculator
* Setup your calculator
* Click Save
* Copy and paste the shortcode, such as [WPcalc id=1] to where you want the calculator to appear. 

== Frequently Asked Questions ==

= How to calculate?  =
* Calculation can be made only in item type "Result"
* Enter the calculation formula using fields values as field_1(Field 1 value), field_2(Field 2 value) ... field_n(Field n value)
* To print the calculation result, use {result} in the field "Result"
Simple calculation: field_1 + field_2

= Which calculation operations are included?  =
*  + - * /  - Simple arithmetic operations
* Math.abs(x) - Returns the absolute value of x
* Math.ceil(x) - Returns x, rounded upwards to the nearest integer
* Math.exp(x) - Returns the value of E<sup>x</sup>
* Math.floor(x) - Returns x, rounded downwards to the nearest integer
* Math.log(x) - Returns the natural logarithm (base E) of x
* Math.pow(x, y) - Returns the value of x to the power of y
* Math.round(x) - Rounds x to the nearest integer
* Math.sqrt(x) - Returns the square root of x
* Math.max(x, y, z, ..., n) - Returns the number with the highest value
* Math.min(x, y, z, ..., n) - Returns the number with the lowest value					

Example:
Math.round((field_1 + field_2 - field_3)*100)/100 - will return the calculation rounded to hundredths 

= How can I round the calculated result to 2 decimal digits?  =

For examle, we need to round the result of formula = field_1 + field_2 - field_3

* 1 way. Use only function Math.round:
Math.round((field_1 + field_2 - field_3)*100)/100
* 2 way. Use function .toFixed(2):
(field_1 + field_2 - field_3).toFixed(2)

= Where can I publish a form?  =

You can publish the forms into pages, posts and widget. The shortcode can be also placed into the template.

== Changelog ==
= 2.1 =
* Fixed: admin script

= 2.0 = 
* NEW VERSION OF PLUGIN

= 1.2 = 
* Fixed scripts

= 1.0 = 
* Initial release




