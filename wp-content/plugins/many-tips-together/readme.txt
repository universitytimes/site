=== Admin Tweaks ===
Contributors: brasofilo
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=JNJXKWBYM9JP6&lc=ES&item_name=Admin%20Tweaks%20%3a%20Rodolfo%20Buaiz&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: admin, admin interface, tuning, profile, posts, pages, login, maintenance mode, snippets, clients
Requires at least: 3.3
Tested up to: 3.6
Stable tag: 2.3.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Do you like to adjust and style the backend as much as the frontend?
So, we are together!
Lots of pro tips and enhancements in one place.

== Description ==

With Admin Tweaks you'll be able to simplify 
and make **deep customizations** in the administrative interface. 
It's a compilation of hooks for enhancing, 
styling and reducing WordPress backend. 

The interface is pretty straight forward: 
choose the section and make your customizations. 
I strongly suggest [**Adminimize**](http://wordpress.org/plugins/adminimize/) as companion for Admin Tweaks.

Previously named Many Tips Together, this plugin started with the post:
[Best Collection of Code for your functions.php file](http://wordpress.stackexchange.com/q/1567/12615).  
But now I know: it's a crappy Concept (your code should go in a plugin, not in functions.php)
and a crappy Question & Answer, try to read that and come back sane ;)
My own participation at [WordPress Answers](http://wordpress.stackexchange.com/users/12615/brasofilo) lead to a great code polishing.


= Main Features =
* Appearance: hide general elements; admin notices.
* Admin Bar: remove, add and modify menu items.
* Admin Menus: faster menu; remove items; sort Settings menu; rename "Posts".
* Dashboard: remove and add widgets.
* Post and Page Listing: customize rows and columns.
* Post and Page Editing: auto-save; revisions; meta boxes.
* Media: custom columns; re-attachment; sanitize filenames; jpeg quality.
* Widgets: remove default widgets; RSS timer; slim Meta Widget.
* Plugins: many row modifications.
* Users and Profile: remove almost everything; add custom CSS.
* Shortcodes: enable shortcodes everywhere; GoogleDocs preview.
* General Settings: privacy; custom avatars; other misc options.
* Login: redirects; errors; modify almost everything; add custom CSS.
* Multisite: see the [FAQ](http://wordpress.org/plugins/many-tips-together/faq/).
* Maintenance Mode: with minimum Role allowed and possibility to block only the backend.

View the all the settings [here](http://brasofilo.com/plugins/many-tips-together/).

= Localizations =
* Português
* Español


== Installation ==
1. Upload `many-tips-together.zip` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the *Plugins* menu in WordPress.
3. Go to *Settings -> Admin Tweaks* and have fun.

= Uninstall =
The 'reset' button doesn't delete the database entry, but if you delete the plugin, the entry will be deleted (via unsinstall.php)

== Frequently Asked Questions ==
= Why Many Tips Together? And why change its name to Admin Tweaks? =
The first version of the plugin was a compilation of snippets. 
It evolved to a General Admin Tweak plugin.
Most of the users who left feedback complained about it: 
too cryptic and hard to find.
Well, I agree, but I'm just changing the Display Name. 
The Repository URL, Directory Name and Database Option Name are still keep original name. 

= Multisite =
The MS features appear in the main site Admin Tweaks screen, there's no Network screen for it. 
They are only visible to super admins and in the main site settings page.
Although fully functional, all this would be better as a separate plugin that can be network activated.
Consider the MS features available right now as an experiment subject to removal in favor of a new plugin.

= Login CSS = 
Try disabling the default styles and paste [this example](https://gist.github.com/brasofilo/6770339). It's a bit of a mess of styles, but can give you some ideas.

= Doubts, bugs, suggestions =
Don't hesitate in posting a new topic here in [WordPress support forum](http://wordpress.org/tags/many-tips-together?forum_id=10).


== Screenshots ==
1. Plugin settings, Profile page adjustments
2. Profile page with adjustments
3. Website with Maintenance Mode enabled 
4. Customized Login page
5. Post Listing with ID and Thumbnail columns. Draft posts with another background color. Help tab hidden.
6. Media Library with ID column, bigger Thumbnails and All Thumbs listing. Re-attachment enabled. Download button in action rows.
7. Plugins page with different color for Inactive and custom color for selected authors. Simpler description and Last Updated information.
8. Multisite support.

== Changelog ==

**Version 2.3.8**

* New feature: break long widgets titles.
* Bug fix: make first widget sidebar closed as default now works as expected
* CSS fixes in plugin page


**Version 2.3.7**

* New feature: make first sidebar box closed as default in /widgets.php.
* New feature: manage quick actions in the Sites list.
* New feature: utility dashboard widgets to show the space used in the server.
* New feature: column to show the site used space in Multisite.
* New feature: remove versioning from enqueued styles and scripts in the frontend.
* New feature: detach images from posts and do bulk re-attach/detach.
* New feature: completely remove WP default styles in Login screen.
* Improvement: enabled sorting for the column Better Attachment in the Media Library.
* Update: Admin Page Class (interface framework).
* Bug fix: fixed MP6 detection (some features depend on it being active or not).

**Version 2.3.6**

* New feature: All non-default widgets can be hidden now and also the widgets description.
* Bug fix: admin footer texts rendering HTML now, props to Ciaran
* Bug fix: login CSS code not being printed if no options selected, props to Nomina
* Bug fix: plugin meta box position in Opera browser, props to Handoko

**Version 2.3.5**

* Bug fix: data validation fixed after plugin rename.
* Bug fix: ["Settings" link](http://wordpress.org/support/topic/cant-view-settings) in Plugins page now links to the new address, props to RitaNow.
* Bug fix: added extra checking to avoid the bug described in [this thread](http://wordpress.org/support/topic/clash-with-duplicate-post-plugin), props to cmwwebfx.

**Version 2.3.4**

* PLUGIN RENAMED TO Admin Tweaks
* New feature: global CSS for admin area. Props to [cmwwebfx](http://wordpress.org/support/topic/custom-css-25?replies=4#post-4379373).
* Bug fix: CSS textarea fields are now showing when swapping sections.

**Version 2.3.3**

* Improvement: option to show how many plugins from selected authors are being displayed
* Bug Fix: dashboard widgets now encoding scripts code properly

**Version 2.3.2**

* Bug Fix: Columns not rendering after Quick-Edit

**Version 2.3.1**

* New feature: add Camera Exif information as meta data to uploaded images that contain such info.
* Improvement: added more snapshots for some Media and Post options.
* Bug fix: correct detection of disabled Link Manager in WP 3.5+

**Version 2.3**

* Feature removal: Custom Avatars. Sorry, but it is a bit problematic. Better use a specialized plugin.
* New feature: Post types status bubbles. Select the status and the number of posts shows up as bubble, like in Comments and Updates.
* New feature: Category counter in Dropdown and Meta Box. Don't put sub-categories on top (this is scribu's plugin Category Checklist Tree). Disable selection of parent categories.
* New feature: Unlimited custom Dashboard Widgets. Set each widget per role.
* New feature: Unlimited submenus in the custom Admin Bar menu. Set submenus per role.
* New feature: Link Manager enabler. It's disabled by default in new WP installs.
* New feature: Reposition post statuses in post type listings.
* Bug fix: solved styling conflicts when using the plugin MP6. Removes hoverintent feature from the plugin if MP6 is active.
* Bug fix: redirection after creating new site in Multisite.

**Version 2.2**

* Improvement: show total count of attachments in post listings Attachment Column
* New feature: remove "- WordPress" from page title in admin side.
* Updated: Admin Page Class v1.2.7.
* Improvement: Portuguese and Spanish translations (but still missing strings).

**Version 2.1.1**

* Bug fix: removed PHP notice appearing on when activating (only appeared with WP_DEBUG enabled)
* Old feature back: remove WordPress upgrade notice for all users. Version 2.0 removed it in favor of only hidding for non-admins. Now both options exist, props to KatieKat.

**Version 2.1**

* Improvement: Multisite main blog detection. 
* New feature:  Multisite user role column.
* New feature:  Multisite sites theme column.
* New feature: Non-default menus items are now available for hiding.
* New feature: Organize menu. First all post types, then Links, Media and Comments as last.
* Bug fix: solved conflict with qTranslate when editing post titles
* Bug fix: CSS conflict with the plugin MP6. MTT options checkboxes are now playing nice with it.

**Version 2.0**

* Completely refactored, new interface and optimized code
* Interface using @bainternet's [Admin Page Class](https://github.com/bainternet/Admin-Page-Class)
* Coded after one year of learning at [WordPress Stack Exchange](http://wordpress.stackexchange.com/users/12615/brasofilo)

**Version 1.0.3**

* New feature: hide plugin actions, for achieving an extreme slim plugin page
* New feature: add image dimensions to Media Upload window (see this [WordPress Answers](http://wordpress.stackexchange.com/a/51165/12615))
* New feature: Duplicate and Delete Revisions available in Quick Edit for posts and pages
* Improvement: started to add basic Multisite support (inactive plugins colors - has to be enabled in the main site)
* Improvement: dynamic only Maintenance Mode. Changed the method and no more external files are handled.
* Improvement: hide general plugin notices will be replaced with specific plugin notices (at first, BackupBuddy and Analytics360º notices are available for removal, please report other plugin notices you wish to hide)
* Removed: email functions. Too much hassle, better use a dedicated plugin.

**Version 1.0.2**

* Bug fix: corrected incompatibility with PHP versions prior to 5.3

**Version 1.0.1**

* Bug fix: developer section not loading

**Version 1.0**

* Remake of the interface
* Revised code
* Lots of new features

**Version 0.9.4**

* Bug fix: finally fixed html escaping... sorry for the mistake in 0.9.3
* Bug fix: login error message does not accept html code as stated before. Fixed html escaping.
* Improvement: select the roles capable of viewing the site when in Maintenance Mode.
* Improvement: new system for the Custom Maintenance Mode, full instructions in plugin page.
* Improvement: more options to customize the Profile page

**Version 0.9.3**

* Maintenance Mode readjustment, now the second line serves as a link, so you can use it like this: 'Meanwhile, visit us in this url...'
* correction of 'Disable self ping' that had a typo and wasn't working properly
* Custom Dashboard's now works, it was lacking html character escaping
* Help texts completed
* Portuguese and Spanish localizations are now complete

**Version 0.9.2**

* Maintenance Mode now works correctly on a site under MultiSite (it's not a global MM)
* Hope the version numbering goes correct...

**Version 0.9b**

* correction of minor bug in checkbox interface

**Version 0.9**

* adjusted checkbox interface
* Spanish localization

**Version 0.8**

* fixes on the readme.txt and plugin logo

**Version 0.7**

* Plugin launch. Technically fully functional. 
* To do: review code comments, translate some comments and var names to English 
 (right now it's mixed EN/PT/ES), few help texts to complete, Portuguese_BR translation incomplete, 
 Spanish translation not done yet.

== Upgrade Notice ==

= 2.3.7 =
- New feature: Make first sidebar box closed as default in /widgest.php
- Bug fix: plugins row custom background color now working with MP6
- New feature: Manage quick actions in the Sites list.
== Acknowledgments ==

* Everything changed after [WordPress Stack Exchange](http://wordpress.stackexchange.com/)
* Plugin interface using @bainternet's [Admin Page Class](https://github.com/bainternet/Admin-Page-Class)
* CSS for hiding help texts adapted from [Admin Expert Mode](http://wordpress.org/extend/plugins/admin-expert-mode/)
* Everything started with [Adminimize](http://wordpress.org/extend/plugins/adminimize/), by Frank Büeltge, which does an awesome job hiding WordPress elements, but I wanted more, and these are some of the great resources where I found many snippets: [Stack Exchange](http://wordpress.stackexchange.com/questions/1567/best-collection-of-code-for-your-functions-php-file), [WPengineer](http://wpengineer.com), [wpbeginner](http://www.wpbeginner.com), [CSS-TRICKS](http://css-tricks.com), [Smashing Magazine](http://wp.smashingmagazine.com), [Justin Tadlock](http://justintadlock.com)...
* The option to hide the help texts from many areas of WordPress uses the CSS file of the plugin [Admin Expert Mode](http://wordpress.org/extend/plugins/admin-expert-mode/), by Scott Reilly.
