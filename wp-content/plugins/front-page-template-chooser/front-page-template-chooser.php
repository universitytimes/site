
<?php
/**
 * Plugin Name: Front Page Template Chooser
 * Plugin URI: http://universitytimes.ie
 * Description: A simple plugin created by Edmund Heaphy for The University Times to allow different front page layouts.
 * Version: 0.1
 * Author: Edmund Heaphy
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: Creative Commons Attribution 4.0 International License
 */
 
 
 
 
 
/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
} 
 
$page_title = 'Front Page Layout';
$menu_title = 'Front Page Layout';
$capability = 'manage_options';
$menu_slug = 'frontpagelayout';
$position = '5'; 


add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
 
 
 
 ?>