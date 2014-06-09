<?php
/*
Plugin Name: Facebook Like Button Plugin
Plugin URI: http://www.lucascobb.com/facebook-like-button-plugin/
Description: This plugin allows for the placement of the Facebook like button before or after a post or page.
Version: 2.0
Author: Lucas Cobb Design
Author URI: http://www.lucascobb.com/
Plugin License: GPL
*/

// activate plugin
function fbl_activate() {
	$options = array(
				'index' => 'yes',
				'page' => 'yes',
				'post' => 'yes',
				'show_faces' => 'yes',
				'layout_style' => 'standard',
				'width' => '450',
				'verb' => 'like',
				'font' => 'arial',
				'color_scheme' => 'light',
				'position' => 'below'
			);
	update_option('fbl', $options);
}

register_activation_hook( __FILE__, 'fbl_activate');

if (!class_exists("fbl")) {
	class fbl 
	{
  		function fbl()
		{
			add_action('admin_init', array(&$this, 'options'));
			
			$this->path = plugins_url('/fbl/');
			$this->options = get_option('fbl');
			
			// display it!
			add_action('the_posts', array(&$this, 'initialize'));
			
			// admin stuff
			add_action('admin_menu', array(&$this, 'menu'));
			add_action('admin_head', array(&$this, 'admin_css'));
			add_action('admin_head', array(&$this, 'admin_js'));
		}
		
		function initialize($posts) {
			if(is_front_page() && $this->options['index'] == 'yes')
			{
				$this->display();
			}
			
			if(is_page() && $this->options['page'] == 'yes')
			{
				$this->display();
			}
			
			if(is_single() && $this->options['post'] == 'yes')
			{
				$this->display();
			}
			
			return $posts;
		}
		
		function display()
		{
			add_filter('the_content', array(&$this, 'show_fbl'));
		}
		
		function options()
		{
			register_setting('fbl_settings', 'fbl');
		}
		
		function show_fbl($content)
		{
			if($this->options['show_faces'] == "yes")
			{
				$height = '';
			} else {
				$height = '25';
			}
			
			$iframe = '<iframe src="http://www.facebook.com/plugins/like.php?href=' . urlencode(get_permalink($id)) . '&amp;layout=' . $this->options['layout_style'] . '&amp;show_faces=' . $this->options['show_faces'] . '&amp;width=' . $this->options['width'] . '&amp;action=' . $this->options['verb'] . '&amp;font=' . $this->options['font'] . '&amp;colorscheme=' . $this->options['color_scheme'] . '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' . $this->options['width'] . 'px; height:' . $height . 'px"></iframe>';
			
			if($this->options['position'] == 'below')
			{
				return $content . $iframe;
			} else {
				return $iframe . $content;
			}
		}

		function menu() {
		  add_options_page('fbl Options', 'Facebook Like Button', 'update_plugins', 'fbl_menu', array(&$this, 'fbl_settings'));
		}
		
		function fbl_settings() {
		  include( dirname(__FILE__) . '/options.php');
		}
		
		function admin_css() {
			echo '<link rel="stylesheet" href="' . $this->path . 'css/admin.css" type="text/css" />';
		}
		
		function admin_js()
		{
			echo '<script type="text/javascript" src="' . $this->path . 'js/fbl_admin.js"></script>';
		}

	}
}

if (class_exists("fbl")) {
  add_action('plugins_loaded', create_function('', 'global $fbl; $fbl = new fbl();'));
}
?>