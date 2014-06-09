<?php
/*
Plugin Name: Search box on Navigation Menu
Plugin URI: http://wordpress.org/extend/plugins/search-box-on-navigation-menu/
Description: This plugin will add the default search box on main navigation menu that will save the space and flexibly fit with the menu. 
Version: 1.1 
Author: Nazmul Hasan Rupok
Author URI: http://www.zovoxz.com/rupok
*/
/*  Copyright 2013  Nazmul Hasan Rupok  (email : rupok@zovoxz.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.  

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {

        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li>' . $searchform . '</li>';

    return $items;
}
?>
