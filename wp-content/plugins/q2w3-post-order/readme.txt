=== Q2W3 Post Order ===
Contributors: Max Bond, AndreSC 
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XBK3L5ZHY3HJS
Tags: q2w3, astickypostorderer, post order, order, posts, category, tag, custom taxonomy, custom post type archive, english, russian 
Requires at least: 3.1
Tested up to: 3.5.1
Stable tag: 1.2.8

Lets you manipulate the order in which posts are displayed.

== Description ==

This plugin is a descendant of a well known [AStickyPostOrderER](http://wordpress.org/extend/plugins/astickypostorderer/). 
Because it was not updated for a long time I decided to make an upgrade.

Note! Original AStickyPostOrderER must be deactivated before Q2W3 Post Order installation!

The main changes are:

* Since version 1.1.0 added ability to `stylize ordered posts` (see FAQ for details)
* Plugin was completely rewritten	
* Now you can change order of posts for `custom taxonomy` and `custom post type archive` pages
* Removed Meta-Stickiness options - the plugin became lighter, faster and easier to use
* Added support for internationalization
* Advanced uninstall
* Plugin settings page was moved from Tools to Settings section

Supported languages: 

* English
* Russian (ver 1.2.4)

== Installation ==

Deactivate AStickyPostOrderER plugin if you have it installed.

Then follow standard WordPress plugin installation procedure.

== Screenshots ==

1. List of taxonomy terms
2. List of posts
3. Screen Options panel

== Frequently Asked Questions ==

= How to enable custom taxonomies and custom post types? =

Open plugin setting page. Look in upper right corner of the screen, there is a Screen Options dropdown panel. 
There you can enable/disable custom taxonomies and post types. 

= How to stylize ordered posts? =

For each ordered post two css classes are set: `q2w3-post-order` and `q2w3-post-order-{n}`, where {n} is post position number. 
Use `q2w3-post-order` css class to set general style for ordered posts. 
Use `q2w3-post-order-{n}` to set unique style for specific post position. 
Note! You have to use `<?php post_class(); ?>` template tag in your theme. 

= How to remove posts from sorted list? =

Enter position number 0 for selected post, then click Update Sorted.

= How to disable plugin for feeds, pages and custom queries? =

You can add a parameter `q2w3-post-order=disable` to the url. 
For example `example.com/feed/?q2w3-post-order=disable` - your main feed post order will not be modified.

If you use custom queries: `query_posts('cat=13&showposts=10&q2w3-post-order=disable');`.
 
Array style: `query_posts(array('cat'=>13,'showposts'=> 10,'q2w3-post-order'=>'disable'));`.

== Other Notes ==


Q2W3 Plugins:

* [Code Insert Manager](http://wordpress.org/extend/plugins/q2w3-inc-manager/)
* [Q2W3 Fixed Widget (Sticky Widget)](http://wordpress.org/extend/plugins/q2w3-fixed-widget/)

== Changelog ==

= 1.2.8 =
* Added post date in post listing tables
* Fixed a few more php warnings and notices

= 1.2.7 =
* Trying to fix problems with post saving

= 1.2.6 =
* Fixed [Problem with the update](http://wordpress.org/support/topic/plugin-q2w3-post-order-problem-with-the-update)
* Fixed [Does not sync the sorted list when updated the post](http://wordpress.org/support/topic/does-not-sync-the-ordered-list-when-updated-the-post)
* Fixed [Private posts are not listed](http://wordpress.org/support/topic/private-posts-are-not-listed)

= 1.2.5 =
* Fixed [Minor coding issue with WP 3.5](http://wordpress.org/support/topic/heads-up-minor-coding-issue-with-wp-35)
* Tested compatibility with WP 3.5

= 1.2.4 =
* Fixed a few non critical bugs
* Updated help section
* Added russian translation
* Tested compatibility with WP 3.4.1

= 1.2.3 =
* Fixed bug when installed with ClassiPress theme

= 1.2.2 =
* Fixed php warnings and notices
* Post order number now can contain up to 6 digits

= 1.2.1 =
* Fixed bug with 404 page on sites with non standard db_prefix
* Checked compatibility with WordPress 3.3 RC3

= 1.2.0 =
* Added debug mode.
* Added option which allows Editors to access plugin settings page.

= 1.1.0 =
* Added ability to stylize ordered posts.
* Fixed small bug with post ordering in hierarhical taxonomies.

= 1.0.0 =
* First public release.