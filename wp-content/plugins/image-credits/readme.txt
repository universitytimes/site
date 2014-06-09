=== Image Credits ===
Contributors: AdamCapriola
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QNSZC555QGP54
Tags: image, credits
Requires at least: 3.0
Tested up to: 3.6
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds source name and URL fields for media uploads along with a shortcode for displaying image credits.

== Description ==

Adds source name and URL fields for media uploads along with a shortcode for displaying image credits for all images within an entry, including its featured image. 

WordPress natively doesn't provide the ability to manage where you've pulled different media from, so this can be helpful in making sure you provide links back to the contents' creators.

== Installation ==

1. Upload `image-credits` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the *Plugins* menu in WordPress.
1. Use the shortcode `[image-credits]` or function `get_image_credits();` to display credits for all the images used within an entry, including the featured image.

== Frequently Asked Questions ==

= How do I display the image credits? =

Use the shortcode `[image-credits]` or function `get_image_credits();`.

**[image-credits]** can accept *before*, *after*, and *sep* (seperator) parameters. By default, the before is "Image Credits: " and the separator is ", " (a comma plus a space). Example modified usage:

`[image-credits before="Image Credits... " sep=" - "]`

**get_image_credits();** accepts one parameter, *$seperator*, which is again by default ", " and returns the results (doesn't echo). You will either need to return or echo the function depending on your code.

= I'm not good at coding and don't want to manually put the shortcode in every single one of my posts. Can you give me some example code to work with? =

Sure. Throw this into your theme's functions.php file and the image credits will appear at the bottom of every post:

`/**
 * Add image credits to the end of posts
 * 
 */
add_filter( 'the_content', 'ac_image_credits' );

function ac_image_credits( $content ) {

	if ( is_singular( 'post' ) ) {

		$content .= '<p>[image-credits]</p>';

	}

	return $content;

}`

= Which image credits does it display? =

Both the shortcode and function will get the credits for all images contained within the post content, including the featured image.

It searches through the post content for attachment IDs rather than get the IDs of the images attached to the post because sometimes you may upload an image then not actually use it, or you may reuse an image that is attached to an old post. This makes the credits more accurate.

== Screenshots ==

1. Example usage.

== Changelog ==

= Version 1.1 =

* Fixed error caused by not defining variables as arrays before using them in in_array functions
* Removed whitespace in code
* Added help text to media input fields
* Cleaned up FAQ and added another usage example

= Version 1.0 =

* This is version 1.0. Everything's new!

== Upgrade Notice ==

= Version 1.1 =

* Fixes array error, adds help text to input fields

= Version 1.0 =

* This is version 1.0. Everything's new!