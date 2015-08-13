<?php
/**
 * Auxiliary Methods
 *
 * @package ManyTipsTogether
 */
class B5F_MTT_Utils
{
	/**
	 * Initial values
	 *
	 * @type array
	 */
	public static $default_options = 
	array (
	  'multisite_active_plugins_widget' => false,
	  'multisite_blogname_column' => false,
	  'multisite_redirect_new_site' => false,
	  'multisite_site_id_column' => false,
	  'multisite_sort_sites_names' => false,
	  'multisite_user_role_column' => false,
	  'multisite_themes_column' => false,
	  'multisite_block_signup' => false,
	  'wpenable_custom_gravatars_enable' => 
	  array (
		'img' => 
		array (
		  'id' => '',
		  'src' => '',
		),
	  ),
	  'adminbar_completely_disable' => false,
	  'adminbar_disable' => false,
	  'adminbar_howdy_enable' => 
	  array (
		'howdy' => '',
	  ),
	  'adminbar_sitename_enable' => 
	  array (
		'title' => '',
		'icon' => 
		array (
		  'id' => '',
		  'src' => '',
		),
		'url' => '',
	  ),
	  'adminbar_custom_enable' => 
	  array (
		'bar_0_title' => '',
		'bar_0_url' => '',
	  ),
	  'admin_menus_hoverintent' => false,
	  'admin_menus_enable_link_manager' => false,
	  'admin_menus_sort_wordpress' => false,
	  'admin_menus_sort_plugins' => false,
	  'admin_menus_sort_cpts' => false,
	  'plugins_acf_show_only' => 
	  array (
		'for_user' => 'none',
	  ),
	  'plugins_acf_hide_options' => 
	  array (
		'for_user' => 'none',
	  ),
	  'posts_rename_enable' => 
	  array (
		'name' => '',
		'singular_name' => '',
		'add_new' => '',
		'edit_item' => '',
		'view_item' => '',
		'search_items' => '',
		'not_found' => '',
		'not_found_in_trash' => '',
	  ),
	  'appearance_hide_help_tab' => false,
	  'appearance_hide_screen_options_tab' => false,
	  'admin_notice_header_settings_enable' => 
	  array (
		'text' => '',
	  ),
	  'admin_notice_header_allpages_enable' => 
	  array (
		'text' => '',
	  ),
	  'admin_notice_footer_hide' => false,
	  'admin_notice_footer_message_enable' => 
	  array (
		'left' => '',
		'right' => '',
	  ),
	  'admin_global_css' => '.class-name {}',
	  'dashboard_add_cpt_enable' => false,
	  'dashboard_remove_footer_rightnow' => false,
	  'wpdisable_version_full' => false,
	  'wpdisable_version_number' => false,
	  'wpblock_update_wp' => false,
	  'wpblock_update_wp_all' => false,
	  'wpblock_update_screen' => false,
	  'wpdisable_nourl' => false,
	  'wpdisable_selfping' => false,
	  'wpdisable_redirect_disallow' => false,
	  'wptaxonomy_columns' => false,
	  'wprss_delay_publish_enable' => 
	  array (
		'time' => '',
		'period' => 'MINUTE',
	  ),
	  'wpdisable_smartquotes' => false,
	  'wpdisable_capitalp' => false,
	  'wpdisable_autop' => false,
	  'wpdisable_wptitle' => false,
	  'login_redirect_enable' => 
	  array (
		'url' => '',
	  ),
	  'logout_redirect_enable' => 
	  array (
		'url' => '',
	  ),
	  'loginpage_errors' => 
	  array (
		'msg_login' => '',
	  ),
	  'loginpage_disable_shaking' => false,
	  'loginpage_form_noshadow' => false,
	  'loginpage_form_border' => false,
	  'loginpage_form_bg_color' => '#',
	  'loginpage_body_color' => '#',
	  'loginpage_body_position' => 'empty',
	  'loginpage_body_repeat' => 'empty',
	  'loginpage_body_attachment' => 'empty',
	  'loginpage_backsite_hide' => false,
	  'loginpage_text_shadow' => false,
	  'loginpage_extra_css' => '.class-name {}',
	  'maintenance_mode_enable' => 
	  array (
		'title' => '',
		'line0' => '',
		'line1' => '',
		'line2' => '',
		'html_img' => 
		array (
		  'id' => '',
		  'src' => '',
		),
		'body_img' => 
		array (
		  'id' => '',
		  'src' => '',
		),
		'level' => 'Administrator',
		'extra_css' => '.class-name {}',
	  ),
	  'media_image_bigger_thumbs' => false,
	  'media_image_id_column_enable' => false,
	  'media_image_size_column_enable' => false,
	  'media_image_thubms_list_column_enable' => false,
	  'media_download_link' => false,
	  'media_better_attachment' => false,
	  'media_uploaded_to_this_post' => false,
	  'media_include_extras_sizes' => false,
	  'media_sanitize_filename' => false,
	  'media_jpg_sharpen' => false,
	  'plugins_block_update_notice' => false,
	  'plugins_block_update_inactive_plugins' => false,
	  'plugins_remove_plugin_edit' => false,
	  'plugins_remove_description' => false,
	  'plugins_remove_plugin_notice' => false,
	  'plugins_add_last_updated' => false,
	  'plugins_inactive_bg_color' => '#',
	  'plugins_my_plugins_bg_color' => 
	  array (
		'names' => '',
		'color' => '#',
	  ),
	  'postpages_enable_page_excerpts' => false,
	  'postpages_enable_category_count' => false,
	  'postpages_enable_category_fixed' => false,
	  'postpages_enable_category_noparent' => false,
	  'postpages_move_author_metabox' => false,
	  'postpages_move_comments_metabox' => false,
	  'postpages_disable_mbox_author' => 'none',
	  'postpages_disable_mbox_comment_status' => 'none',
	  'postpages_disable_mbox_comment' => 'none',
	  'postpages_disable_mbox_custom_fields' => 'none',
	  'postpages_disable_mbox_featured_image' => 'none',
	  'postpages_disable_mbox_revisions' => 'none',
	  'postpages_disable_mbox_slug' => 'none',
	  'postpages_disable_mbox_attributes' => false,
	  'postpages_disable_mbox_format' => false,
	  'postpages_disable_mbox_category' => false,
	  'postpages_disable_mbox_excerpt' => false,
	  'postpages_disable_mbox_tags' => false,
	  'postpages_disable_mbox_trackbacks' => false,
	  'postpageslist_persistent_list_view' => false,
	  'postpageslist_enable_category_count' => false,
	  'postpageslist_template_filter_enable' => false,
	  'postpageslist_duplicate_del_revisions' => false,
	  'postpageslist_move_views_row' => false,
	  'postpageslist_enable_id_column' => false,
	  'postpageslist_enable_thumb_column' => 
	  array (
		'proportion' => '',
		'width' => '',
	  ),
	  'postpageslist_status_draft' => '#',
	  'postpageslist_status_pending' => '#',
	  'postpageslist_status_future' => '#',
	  'postpageslist_status_private' => '#',
	  'postpageslist_status_password' => '#',
	  'postpageslist_status_others' => '#',
	  'profile_h3_titles' => false,
	  'profile_descriptions' => false,
	  'profile_slim' => false,
	  'profile_hidden' => false,
	  'profile_display_name' => false,
	  'profile_nickname' => false,
	  'profile_website' => false,
	  'profile_social' => false,
	  'profile_none' => false,
	  'profile_bio' => false,
	  'profile_css' => '.class-name {}',
	  'shortcodes_everywhere' => false,
	  'shortcodes_tube' => false,
	  'shortcodes_gdocs' => false,
	  'widget_meta_slim' => false,
	  'widgets_non_default' => array()
	);

	/**
	 * Get all users by user_login=>display_name
	 * 
	 * @param  many $field Value of the custom field
	 * @param  str  $name  Name of property
	 * @param  str  $type  Type of custom field
	 * @return prints Html/JS code
	 */
	public static function get_users_array()
	{
		$default = array( 'none'		 => 'None' );
		$user_arr	 = array( );
		$users = get_users();
		if( count( $users ) > 1 )
		{
			foreach( $users as $user )
			{
				$u_login = isset( $user->data ) ? $user->data->user_login : $user->user_login;
				$u_name = isset( $user->data ) ? $user->data->display_name : $user->display_name;
				$user_arr[$u_login] = ucwords( $u_name );
			}
		}
		else
		{
			return false;
		}

		return array_merge( $default, $user_arr );
	}


	/**
	 * Validate URLs and '#'
	 * 
	 * @param string $url
	 * @param boolean $allow_dash
	 * @return boolean
	 */
	public static function check_url( $url, $allow_dash = false )
	{
		if( $allow_dash && $url == "#" )
			return true;

		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}


	/**
	 * Position element at the end of array
	 * 
	 * @param array $src
	 * @param array $in
	 * @param number $pos
	 * @return array
	 */
	public static function array_push_after( $src, $in, $pos )
	{
		if( is_int( $pos ) )
			$R = array_merge( array_slice( $src, 0, $pos + 1 ), $in, array_slice( $src, $pos + 1 ) );
		else
		{
			foreach( $src as $k => $v )
			{
				$R[$k]	 = $v;
				if( $k == $pos )
					$R		 = array_merge( $R, $in );
			}
		}
		return $R;
	}


	/**
	 * Get capability from role name
	 * 
	 * @param string $opt
	 * @return string
	 */
	public static function maintenance_user_level( $opt = null )
	{
		$level	 = 'delete_plugins';
		if( $opt == 'Editor' )
			$level	 = 'delete_pages';
		elseif( $opt == 'Author' )
			$level	 = 'publish_posts';
		elseif( $opt == 'Contributor' )
			$level	 = 'delete_posts';
		elseif( $opt == 'Subscriber' )
			$level	 = 'read';
		return $level;
	}


	/**
	 * Make rating like in the Repo
	 * cents: 0=never, 1=if needed, 2=always
	 * 
	 * @param number $number
	 * @param number $cents
	 * @return number
	 */
	public static function formatRating( $number, $cents = 1 )
	{
		if( is_numeric( $number ) )
		{
			if( !$number )
			{
				$rating = ($cents == 2) ? '0.00' : '0';
			}
			else
			{
				if( floor( $number ) == $number )
				{
					$rating = number_format( $number, ($cents == 2 ? 2 : 0 ) );
				}
				else
				{
					$rating = number_format( round( $number, 2 ), ($cents == 0 ? 0 : 2 ) );
				}
			}
			return $rating;
		}
	}


	/**
	 * Function name grabbed from: http://core.trac.wordpress.org/ticket/22624
	 * 2 lines of code from TutPlus: http://goo.gl/X4lmf
	 * 
	 * Usage: current_user_has_role( 'editor' );
	 * 
	 * @param string $role
	 * @return boolean
	 */
	public static function current_user_has_role( $role )
	{
		$current_user	 = new WP_User( wp_get_current_user()->ID );
		$user_roles		 = $current_user->roles;
		$is_or_not		 = in_array( $role, $user_roles );
		return $is_or_not;
	}


	/**
	 * Current user has role
	 * Modified to work with Array
	 * http://wordpress.stackexchange.com/q/53675/12615
	 * 
	 * @param array $role
	 * @return boolean
	 */
	public static function current_user_has_role_array( $role )
	{
		$current_user	 = new WP_User( wp_get_current_user()->ID );
		$user_roles		 = $current_user->roles;
		$arrtolower		 = array_map( 'strtolower', $role );
		$search			 = array_intersect( $user_roles, $arrtolower );
		if( count( $search ) > 0 )
			return true;
		return false;
	}


	/**
	 * Helper for making external links
	 *
	 * @param str  $name  Name of the link
	 * @param str  $url   Address of the link
	 * @param bool $blank Open in new window
	 * @return str Html content
	 */
	public static function make_tip_credit( $name, $url, $blank = true )
	{
		$target	 = $blank ? 'target="_blank"' : '';
		$html	 = '<a href="' . $url . '" ' . $target . '>' . $name . '</a>';
		return $html;
	}


	/**
	 * Consult Repo for plugin info
	 * 
	 * @return object/boolean
	 */
	public static function get_repository_info()
	{

		$plugin_url = 'http://wpapi.org/api/plugin/many-tips-together.json';

		$cache = get_transient( 'mttdlcounter2' );
		if( false !== $cache )
			return $cache;

		// Fetch the data
		if( $response = wp_remote_retrieve_body( wp_remote_get( $plugin_url ) ) )
		{
			// Decode the json response
			if( $response = json_decode( $response, true ) )
			{
				// Double check we have all our data
				if( !empty( $response['added'] ) )
				{
					set_transient( 'mttdlcounter2', $response, 720 );
					return $response;
				}
			}
		}
		return false;
	}


	/**
	 * Print HTML with Repo info
	 * 
	 * @param boolean $echo
	 * @return string
	 */
	public static function print_repository_info( $echo = true )
	{
		$mttotal = self::get_repository_info();
		if( false === $mttotal )
			return;
		
		$rat			 = $mttotal['rating'] . '%';
		$num_rating		 = number_format_i18n( $mttotal['num_ratings'] );
		$totr			 = sprintf( __( '%s votes', 'mtt' ), $num_rating );
		$tot			 = __( 'Downloads', 'mtt' );
		$upd			 = __( 'Updated', 'mtt' );
		$img1			 = plugins_url( 'many-tips-together' ) . '/images/star_x_grey.gif';
		$img2			 = plugins_url( 'many-tips-together' ) . '/images/star_x_orange.gif';

		if( isset($mttotal['total_downloads']) )
		{
			$total_base = number_format_i18n( $mttotal['total_downloads'] );
			$total_downloads = "<span style='color:#b0b0b0'>$tot:</span> <em style='color:#ccbb8d;'>$total_base</em><br>";
		}
		else 
		{
			$total_downloads = '';
		}
		
		//$rating          = self::formatRating( $mttotal['rating'] / 20 );
		$updated		 = date_i18n( get_option( 'date_format' ), strtotime( $mttotal['updated'] ) );

		if( !$echo )
			return $mttotal;

		$print = <<<HTML
		    <div style="float:right;text-align:right"><div style="width:55px;background:url($img1) 0 0 repeat-x;">
<div style="height: 12px; background: url($img2) repeat-x scroll 0px 0px transparent; width: $rat "></div>$totr</div>
</div>
			$total_downloads
		    <span style="color:#b0b0b0">$upd:</span> <em style="color:#ccbb8d;">$updated</em>
HTML;
		echo $print;
	}


	/**
	 * Validate CSS numbers, strips 'px', 'em' and '%' from string
	 * 
	 * @param string $val
	 * @return int/boolean False or Integer without decimals
	 */
	public static function validate_css_number( $val )
	{
		$number = preg_replace( '/[^0-9]/', '', $val );
		if( is_numeric( $number ) || !empty( $number ) )
		{
			return (int) $number;
		}
		
		return false;
	}


	/**
	 * Validate -1, 0, etc number
	 * 
	 * @param string $val
	 * @return int/boolean False or Integer without decimals
	 */
	public static function validate_pos_neg_number( $val )
	{
		$number = preg_replace( '/[^0-9\-]/', '', $val );
		
		if( is_numeric( $number ) || !empty( $number ) )
		{
			return (int) $number;
		}
		
		return false;
	}

	
	/**
	 * Validate CSS numbers, keeps 'px' and '%' in the string
	 * 
	 * @param string $val
	 * @return int/boolean False or Integer without decimals and sign
	 */
	public static function validate_css_px_percent( $val )
	{

		if( self::endswith( $val, '%' ) )
		{
			$num = str_replace( '%', '', $val );
			if( is_numeric( $num ) )
				return $num . '%';
			else
				return false;
		}
		elseif( self::endswith( $val, 'px' ) )
		{
			$num = str_replace( 'px', '', $val );
			if( is_numeric( $num ) )
				return $num . 'px';
			else
				return false;
		}
		elseif( self::endswith( $val, 'em' ) )
		{
			$num = str_replace( 'em', '', $val );
			if( is_numeric( $num ) )
				return $num . 'em';
			else
				return false;
		}
		else
		{
			return false;
		}
	}

	
	/**
	 * 
	 * @param string $needle
	 * @param array $haystack
	 * @return boolean or current_key
	 */
	public static function recursive_array_search( $needle, $haystack ) 
	{
		foreach( $haystack as $key => $value ) 
		{
			$current_key = $key;
			if( 
				$needle === $value 
				OR ( 
					is_array( $value )
					&& self::recursive_array_search( $needle, $value ) !== false 
				)
			) 
			{
				return $current_key;
			}
		}
		return false;
	}


	/**
	 * Check ending of string
	 *  
	 * @param type $string
	 * @param type $test
	 * @return boolean
	 */
	private static function endswith( $string, $test )
	{
		$strlen	 = strlen( $string );
		$testlen = strlen( $test );
		if( $testlen > $strlen )
			return false;
		return substr_compare( $string, $test, -$testlen ) === 0;
	}

	/**
	 * Convert letter code into role name
	 * 
	 * @param string $opt
	 * @return string
	 */
	private static function get_user_level( $opt ) 
	{
		$ritorna = array();
		switch ( $opt ) {
			case 'a':
				$ritorna[] = 'Administrator';
				break;
			case 'e':
				$ritorna[] = 'Editor';
				break;
			case 't':
				$ritorna[] = 'Author';
				break;
			case 'c':
				$ritorna[] = 'Contributor';
				break;
			case 's':
				$ritorna[] = 'Subscriber';
				break;
		}
		return $ritorna;
	}

	
	/**
	 * Testing update from fixed to repeatable
	 * 
	 * @param type $old_options
	 * @return type
	 */
	public static function update_plugin_2_3( $old_options )
	{
		// CONVERT DASHBOARD WIDGET INTO REPEATABLE
		$new_dash_widget = array();
		if( !empty( $old_options['dashboard_mtt1_enable']['title'] ) 
			|| !empty( $old_options['dashboard_mtt1_enable']['content'] )
		)
		{
			$enabled = isset($old_options['dashboard_mtt1_enable']['enabled']) 
					? $old_options['dashboard_mtt1_enable']['enabled']
					: null;
			$new_dash_widget[] = array(
				'enabled' => $enabled,
				'title' => $old_options['dashboard_mtt1_enable']['title'],
				'content' => $old_options['dashboard_mtt1_enable']['content'],
			);
		}
		if( !empty( $old_options['dashboard_mtt2_enable']['title'] ) 
			|| !empty( $old_options['dashboard_mtt2_enable']['content'] )
		)
		{
			$enabled = isset($old_options['dashboard_mtt2_enable']['enabled']) 
					? $old_options['dashboard_mtt2_enable']['enabled']
					: null;
			$new_dash_widget[] = array(
				'enabled' => $enabled,
				'title' => $old_options['dashboard_mtt2_enable']['title'],
				'content' => $old_options['dashboard_mtt2_enable']['content'],
			);
		}
		if( !empty( $old_options['dashboard_mtt3_enable']['title'] ) 
			|| !empty( $old_options['dashboard_mtt3_enable']['content'] )
		)
		{
			$enabled = isset($old_options['dashboard_mtt3_enable']['enabled']) 
					? $old_options['dashboard_mtt3_enable']['enabled']
					: null;
			$new_dash_widget[] = array(
				'enabled' => $enabled,
				'title' => $old_options['dashboard_mtt3_enable']['title'],
				'content' => $old_options['dashboard_mtt3_enable']['content'],
			);
		}
		
		// CONVERT ADMINBAR SUBMENUS INTO REPEATABLE
		$new_adminbar_submenus = array();
		for ( $i = 1; $i < 6; $i++ )
		{
			if( !empty( $old_options['adminbar_custom_enable']["bar_{$i}_title"] ) 
				|| !empty( $old_options['adminbar_custom_enable']["bar_{$i}_url"] )
			)
			{
				$new_adminbar_submenus[] = array(
					'title' => $old_options['adminbar_custom_enable']["bar_{$i}_title"],
					'url' => $old_options['adminbar_custom_enable']["bar_{$i}_url"],
				);
			}
		}
		unset( $old_options['adminbar_custom_enable']
				, $old_options['dashboard_mtt1_enable'] 
				, $old_options['dashboard_mtt2_enable'] 
				, $old_options['dashboard_mtt3_enable'] 
		);
		$return = array_merge( 
				$old_options, 
				array( 
					'dashboard_add_widgets' => $new_dash_widget,
					'adminbar_custom_submenus' => $new_adminbar_submenus
				) 
		);
		return $return;
	}
	
	
	/**
	 * Update old options
	 * 
	 * @param type $old_options
	 * @return type
	 */
	public static function update_plugin_options( $old_options )
	{
		$admin_menus_remove = array( );
		if( $old_options['admin_menus_remove_posts'] )
			$admin_menus_remove[]	 = 'posts';
		if( $old_options['admin_menus_remove_media'] )
			$admin_menus_remove[]	 = 'media';
		if( $old_options['admin_menus_remove_links'] )
			$admin_menus_remove[]	 = 'links';
		if( $old_options['admin_menus_remove_pages'] )
			$admin_menus_remove[]	 = 'pages';
		if( $old_options['admin_menus_remove_comments'] )
			$admin_menus_remove[]	 = 'comments';
		if( $old_options['admin_menus_remove_appearence'] )
			$admin_menus_remove[]	 = 'appearence';
		if( $old_options['admin_menus_remove_plugins'] )
			$admin_menus_remove[]	 = 'plugins';
		if( $old_options['admin_menus_remove_users'] )
			$admin_menus_remove[]	 = 'users';
		if( $old_options['admin_menus_remove_tools'] )
			$admin_menus_remove[]	 = 'tools';


		$admin_footer_notice = array( );
		if( $old_options['admin_notice_footer_message_enable'] )
			$admin_footer_notice['enabled'] = 'on';

		if( !empty( $old_options['admin_notice_footer_message_left'] ) )
			$admin_footer_notice['left'] = $old_options['admin_notice_footer_message_left'];

		if( !empty( $old_options['admin_notice_footer_message_right'] ) )
			$admin_footer_notice['right'] = $old_options['admin_notice_footer_message_right'];


		$admin_notice_header_all = array( );
		if( $old_options['admin_notice_header_allpages_enable'] )
			$admin_notice_header_all['enabled'] = 'on';

		if( !empty( $old_options['admin_notice_header_allpages_text'] ) )
			$admin_notice_header_all['text'] = $old_options['admin_notice_header_allpages_text'];

		if( !empty( $old_options['admin_notice_header_allpages_level'] ) )
			$admin_notice_header_all['level'] = self::get_user_level( $old_options['admin_notice_header_allpages_level'] );

		$admin_notice_header_sett = array( );
		if( $old_options['admin_notice_header_settings_enable'] )
			$admin_notice_header_sett['enabled'] = 'on';

		if( !empty( $old_options['admin_notice_header_settings_text'] ) )
			$admin_notice_header_sett['text'] = $old_options['admin_notice_header_settings_text'];

		$adminbar_custom = array( );
		if( $old_options['adminbar_custom_enable'] )
			$adminbar_custom['enabled'] = 'on';

		if( !empty( $old_options['adminbar_custom_0_title'] ) )
			$adminbar_custom['bar_0_title'] = $old_options['adminbar_custom_0_title'];

		if( !empty( $old_options['adminbar_custom_0_url'] ) )
			$adminbar_custom['bar_0_url'] = $old_options['adminbar_custom_0_url'];

		if( !empty( $old_options['adminbar_custom_1_title'] ) )
			$adminbar_custom['bar_1_title'] = $old_options['adminbar_custom_1_title'];

		if( !empty( $old_options['adminbar_custom_1_url'] ) )
			$adminbar_custom['bar_1_url'] = $old_options['adminbar_custom_1_url'];

		if( !empty( $old_options['adminbar_custom_2_title'] ) )
			$adminbar_custom['bar_2_title'] = $old_options['adminbar_custom_2_title'];

		if( !empty( $old_options['adminbar_custom_2_url'] ) )
			$adminbar_custom['bar_2_url'] = $old_options['adminbar_custom_2_url'];

		if( !empty( $old_options['adminbar_custom_3_title'] ) )
			$adminbar_custom['bar_3_title'] = $old_options['adminbar_custom_3_title'];

		if( !empty( $old_options['adminbar_custom_3_url'] ) )
			$adminbar_custom['bar_3_url'] = $old_options['adminbar_custom_3_url'];

		if( !empty( $old_options['adminbar_custom_4_title'] ) )
			$adminbar_custom['bar_4_title'] = $old_options['adminbar_custom_4_title'];

		if( !empty( $old_options['adminbar_custom_4_url'] ) )
			$adminbar_custom['bar_4_url'] = $old_options['adminbar_custom_4_url'];

		if( !empty( $old_options['adminbar_custom_5_title'] ) )
			$adminbar_custom['bar_5_title'] = $old_options['adminbar_custom_5_title'];

		if( !empty( $old_options['adminbar_custom_5_url'] ) )
			$adminbar_custom['bar_5_url'] = $old_options['adminbar_custom_5_url'];

		$howdy = array( );
		if( $old_options['wpdisable_howdy_enable'] )
			$howdy['enabled'] = 'on';

		if( !empty( $old_options['wpdisable_howdy_replace'] ) )
			$howdy['howdy'] = $old_options['wpdisable_howdy_replace'];

		$adminbar_remove = array( );
		if( !empty( $old_options['adminbar_remove_comments'] ) )
			$adminbar_remove[] = 'comments';

		if( !empty( $old_options['adminbar_remove_my_account'] ) )
			$adminbar_remove[] = 'my_account';

		if( !empty( $old_options['adminbar_remove_new_content'] ) )
			$adminbar_remove[] = 'new_content';

		if( !empty( $old_options['adminbar_remove_site_name'] ) )
			$adminbar_remove[] = 'site_name';

		if( !empty( $old_options['adminbar_remove_theme_options'] ) )
			$adminbar_remove[] = 'theme_options';

		if( !empty( $old_options['adminbar_remove_updates'] ) )
			$adminbar_remove[] = 'updates';

		if( !empty( $old_options['adminbar_remove_wp_logo'] ) )
			$adminbar_remove[] = 'wp_logo';

		if( !empty( $old_options['adminbar_remove_seo_by_yoast'] ) )
			$adminbar_remove[] = 'seo_by_yoast';

		$adminbar_sitename = array( );
		if( $old_options['adminbar_sitename_enable'] )
			$adminbar_sitename['enabled'] = 'on';

		if( !empty( $old_options['adminbar_sitename_icon'] ) )
			$adminbar_sitename['icon'] = array( 'id'	 => '', 'src'	 => $old_options['adminbar_sitename_icon'] );

		if( !empty( $old_options['adminbar_sitename_title'] ) )
			$adminbar_sitename['title'] = $old_options['adminbar_sitename_title'];

		if( !empty( $old_options['adminbar_sitename_url'] ) )
			$adminbar_sitename['url'] = $old_options['adminbar_sitename_url'];

		$help_texts = array( );
		if( $old_options['wpdisable_help_texts_enable'] )
			$help_texts['enabled'] = 'on';

		if( !empty( $old_options['wpdisable_help_texts_level'] ) )
			$help_texts['level'] = self::get_user_level( $old_options['wpdisable_help_texts_level'] );

		$dash_widg_1 = array( );
		if( $old_options['dashboard_mtt1_enable'] )
			$dash_widg_1['enabled'] = 'on';

		if( !empty( $old_options['dashboard_mtt1_title'] ) )
			$dash_widg_1['title'] = $old_options['dashboard_mtt1_title'];

		if( !empty( $old_options['dashboard_mtt1_content'] ) )
			$dash_widg_1['content'] = $old_options['dashboard_mtt1_content'];

		$dash_widg_2 = array( );
		if( $old_options['dashboard_mtt2_enable'] )
			$dash_widg_2['enabled'] = 'on';

		if( !empty( $old_options['dashboard_mtt2_title'] ) )
			$dash_widg_2['title'] = $old_options['dashboard_mtt2_title'];

		if( !empty( $old_options['dashboard_mtt2_content'] ) )
			$dash_widg_2['content'] = $old_options['dashboard_mtt2_content'];

		$dash_widg_3 = array( );
		if( $old_options['dashboard_mtt3_enable'] )
			$dash_widg_3['enabled'] = 'on';

		if( !empty( $old_options['dashboard_mtt3_title'] ) )
			$dash_widg_3['title'] = $old_options['dashboard_mtt3_title'];

		if( !empty( $old_options['dashboard_mtt3_content'] ) )
			$dash_widg_3['content'] = $old_options['dashboard_mtt3_content'];

		$dash_remove = array( );
		if( $old_options['dashboard_remove_plugins'] )
			$dash_remove[] = 'plugins';

		if( $old_options['dashboard_remove_incoming_links'] )
			$dash_remove[] = 'incoming_links';

		if( $old_options['dashboard_remove_primary'] )
			$dash_remove[] = 'primary';

		if( $old_options['dashboard_remove_quick_press'] )
			$dash_remove[] = 'quick_press';

		if( $old_options['dashboard_remove_recent_comments'] )
			$dash_remove[] = 'recent_comments';

		if( $old_options['dashboard_remove_recent_drafts'] )
			$dash_remove[] = 'recent_drafts';

		if( $old_options['dashboard_remove_right_now'] )
			$dash_remove[] = 'right_now';

		if( $old_options['dashboard_remove_secondary'] )
			$dash_remove[] = 'secondary';

		$login_redirect = array( );
		if( $old_options['logout_redirect_enable'] )
			$login_redirect['enabled'] = 'on';

		if( !empty( $old_options['logout_redirect_url'] ) )
			$login_redirect['url'] = $old_options['logout_redirect_url'];

		$login_error = array( );
		if( $old_options['loginpage_errors'] )
			$login_error['enabled'] = 'on';

		if( !empty( $old_options['loginpage_error_msg'] ) )
			$login_error['msg_login'] = $old_options['loginpage_error_msg'];

		$maintenance = array( );
		if( $old_options['maintenance_mode_enable'] )
			$maintenance['enabled'] = 'on';

		if( !empty( $old_options['maintenance_mode_title'] ) )
			$maintenance['title'] = $old_options['maintenance_mode_title'];

		if( !empty( $old_options['maintenance_mode_line0'] ) )
			$maintenance['line0'] = $old_options['maintenance_mode_line0'];

		if( !empty( $old_options['maintenance_mode_line1'] ) )
			$maintenance['line1'] = $old_options['maintenance_mode_line1'];

		if( !empty( $old_options['maintenance_mode_line2'] ) )
			$maintenance['line2'] = $old_options['maintenance_mode_line2'];

		$maintenance['html_img'] = array( );
		$maintenance['body_img'] = array( );

		if( !empty( $old_options['maintenance_mode_level'] ) )
			$maintenance['level'] = self::get_user_level( $old_options['maintenance_mode_level'] );

		if( !empty( $old_options['maintenance_mode_admin'] ) )
			$maintenance['other_options'][] = 'only_admin';

		if( !empty( $old_options['maintenance_mode_extra_css'] ) )
			$maintenance['extra_css'] = $old_options['maintenance_mode_extra_css'];

		$thumb_column = array( );
		if( $old_options['postpageslist_enable_thumb_column'] )
			$thumb_column['enabled'] = 'on';

		$posts_rename = array( );
		if( $old_options['posts_rename_enable'] )
			$posts_rename['enabled'] = 'on';

		if( !empty( $old_options['posts_rename_name'] ) )
			$posts_rename['name'] = $old_options['posts_rename_name'];

		if( !empty( $old_options['posts_rename_singular_name'] ) )
			$posts_rename['singular_name'] = $old_options['posts_rename_singular_name'];

		if( !empty( $old_options['posts_rename_add_new'] ) )
			$posts_rename['add_new'] = $old_options['posts_rename_add_new'];

		if( !empty( $old_options['posts_rename_edit_item'] ) )
			$posts_rename['edit_item'] = $old_options['posts_rename_edit_item'];

		if( !empty( $old_options['posts_rename_view_item'] ) )
			$posts_rename['view_item'] = $old_options['posts_rename_view_item'];

		if( !empty( $old_options['posts_rename_search_items'] ) )
			$posts_rename['search_items'] = $old_options['posts_rename_search_items'];

		if( !empty( $old_options['posts_rename_not_found'] ) )
			$posts_rename['not_found'] = $old_options['posts_rename_not_found'];

		if( !empty( $old_options['posts_rename_not_found_in_trash'] ) )
			$posts_rename['not_found_in_trash'] = $old_options['posts_rename_not_found_in_trash'];

		$widgets_remove = array( );
		if( $old_options['widget_remove_pages'] )
			$widgets_remove[]	 = 'pages';
		if( $old_options['widget_remove_calendar'] )
			$widgets_remove[]	 = 'calendar';
		if( $old_options['widget_remove_archives'] )
			$widgets_remove[]	 = 'archives';
		if( $old_options['widget_remove_links'] )
			$widgets_remove[]	 = 'links';
		if( $old_options['widget_remove_meta'] )
			$widgets_remove[]	 = 'meta';
		if( $old_options['widget_remove_search'] )
			$widgets_remove[]	 = 'search';
		if( $old_options['widget_remove_text'] )
			$widgets_remove[]	 = 'text';
		if( $old_options['widget_remove_categories'] )
			$widgets_remove[]	 = 'categories';
		if( $old_options['widget_remove_recent_posts'] )
			$widgets_remove[]	 = 'recent_posts';;
		if( $old_options['widget_remove_recent_comments'] )
			$widgets_remove[]	 = 'recent_comments';
		if( $old_options['widget_remove_rss'] )
			$widgets_remove[]	 = 'rss';;
		if( $old_options['widget_remove_tag_cloud'] )
			$widgets_remove[]	 = 'tag_cloud';
		if( $old_options['widget_remove_nav_menu'] )
			$widgets_remove[]	 = 'nav_menu';
		if( $old_options['widget_remove_akismet'] )
			$widgets_remove[]	 = 'akismet';

		$rss_delay = array( );
		if( $old_options['wprss_delay_publish_enable'] )
			$rss_delay['enabled'] = 'on';

		if( !empty( $old_options['wprss_delay_publish_time'] ) )
			$rss_delay['time'] = $old_options['wprss_delay_publish_time'];

		if( !empty( $old_options['wprss_delay_publish_period'] ) )
			$rss_delay['period'] = $old_options['wprss_delay_publish_period'];


		$v2_options = array(
			'admin_menus_remove'					 => $admin_menus_remove,
			'admin_notice_footer_hide'				 => $old_options['admin_notice_footer_hide'],
			'admin_notice_footer_message_enable'	 => $admin_footer_notice,
			'admin_notice_header_allpages_enable'	 => $admin_notice_header_all,
			'admin_notice_header_settings_enable'	 => $admin_notice_header_sett,
			'adminbar_custom_enable'				 => $adminbar_custom,
			'adminbar_disable'						 => $old_options['adminbar_disable'],
			'adminbar_howdy_enable'					 => $howdy,
			'adminbar_remove'						 => $adminbar_remove,
			'adminbar_sitename_enable'				 => $adminbar_sitename,
			'appearance_help_texts_enable'			 => $help_texts,
			'dashboard_add_cpt_enable'				 => $old_options['dashboard_add_cpt_enable'],
			'dashboard_mtt1_enable'					 => $dash_widg_1,
			'dashboard_mtt2_enable'					 => $dash_widg_2,
			'dashboard_mtt3_enable'					 => $dash_widg_3,
			'dashboard_remove'						 => $dash_remove,
			'dashboard_remove_footer_rightnow'		 => $old_options['dashboard_remove_footer_rightnow'],
			'login_redirect_enable'					 => $login_redirect,
			'loginpage_backsite_hide'				 => $old_options['loginpage_backsite_hide'],
			'loginpage_body_attachment'				 => $old_options['loginpage_body_attachment'],
			'loginpage_body_color'					 => $old_options['loginpage_body_color'],
			'loginpage_body_img'					 => array( 'id'						 => '', 'src'						 => $old_options['loginpage_body_img'] ),
			'loginpage_body_position'	 => '', // V2 - RESETING THIS
			'loginpage_body_repeat'		 => '', // V2 - RESETING THIS
			'loginpage_errors'			 => $login_error,
			'loginpage_extra_css'		 => $old_options['loginpage_extra_css'],
			'loginpage_form_bg_color'	 => $old_options['loginpage_form_bg_color'],
			'loginpage_form_bg_img'		 => array( 'id'						 => '', 'src'						 => $old_options['loginpage_form_bg_img'] ),
			'loginpage_form_height'		 => $old_options['loginpage_form_height'],
			'loginpage_form_noshadow'	 => $old_options['loginpage_form_noshadow'],
			'loginpage_form_rounded'	 => $old_options['loginpage_form_rounded'],
			'loginpage_form_width'		 => $old_options['loginpage_form_width'],
			'loginpage_logo_height'		 => $old_options['loginpage_logo_height'],
			'loginpage_logo_img'		 => array( 'id'									 => '', 'src'									 => $old_options['loginpage_logo_img'] ),
			'loginpage_logo_tooltip'				 => $old_options['loginpage_logo_tooltip'],
			'loginpage_logo_url'					 => $old_options['loginpage_logo_url'],
			'loginpage_text_shadow'					 => $old_options['loginpage_text_shadow'],
			'maintenance_mode_enable'				 => $maintenance,
			'media_better_attachment'				 => $old_options['media_better_attachment'],
			'media_image_id_column_enable'			 => $old_options['media_image_id_column_enable'],
			'media_image_size_column_enable'		 => $old_options['media_image_size_column_enable'],
			'media_jpg_quality'						 => $old_options['media_jpg_quality'],
			'media_jpg_sharpen'						 => $old_options['media_jpg_sharpen'],
			'media_sanitize_filename'				 => $old_options['media_sanitize_filename'],
			'plugins_block_update_notice'			 => $old_options['wpblock_update_plugins'],
			'plugins_inactive_bg_color'				 => $old_options['plugins_inactive_bg_color'],
			'plugins_remove_plugin_edit'			 => $old_options['plugins_remove_plugin_edit'],
			'plugins_remove_plugin_notice'			 => $old_options['plugins_remove_plugin_notice'],
			'postpages_disable_mbox_attributes'		 => $old_options['postpages_disable_mbox_attributes'],
			'postpages_disable_mbox_author'			 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_author'] ),
			'postpages_disable_mbox_category'		 => $old_options['postpages_disable_mbox_category'],
			'postpages_disable_mbox_comment'		 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_comment'] ),
			'postpages_disable_mbox_comment_status'	 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_comment_status'] ),
			'postpages_disable_mbox_custom_fields'	 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_custom_fields'] ),
			'postpages_disable_mbox_excerpt'		 => $old_options['postpages_disable_mbox_excerpt'],
			'postpages_disable_mbox_featured_image'	 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_featured_image'] ),
			'postpages_disable_mbox_revisions'		 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_revisions'] ),
			'postpages_disable_mbox_slug'			 => str_replace( ' ', '_', $old_options['postpages_disable_mbox_slug'] ),
			'postpages_disable_mbox_tags'			 => $old_options['postpages_disable_mbox_tags'],
			'postpages_disable_mbox_trackbacks'		 => $old_options['postpages_disable_mbox_trackbacks'],
			'postpages_enable_page_excerpts'		 => $old_options['postpages_enable_page_excerpts'],
			'postpages_move_author_metabox'			 => $old_options['postpages_move_author_metabox'],
			'postpages_move_comments_metabox'		 => $old_options['postpages_move_comments_metabox'],
			'postpages_post_autosave'				 => $old_options['postpages_post_autosave'],
			'postpages_post_revision'				 => $old_options['postpages_post_revision'],
			'postpageslist_duplicate_del_revisions'	 => $old_options['postpageslist_duplicate_del_revisions'],
			'postpageslist_enable_id_column'		 => $old_options['postpageslist_enable_id_column'],
			'postpageslist_enable_thumb_column'		 => $thumb_column,
			'postpageslist_persistent_list_view'	 => $old_options['postpageslist_persistent_list_view'],
			'postpageslist_status_draft'			 => $old_options['postpageslist_status_draft'],
			'postpageslist_status_future'			 => $old_options['postpageslist_status_future'],
			'postpageslist_status_others'			 => $old_options['postpageslist_status_others'],
			'postpageslist_status_password'			 => $old_options['postpageslist_status_password'],
			'postpageslist_status_pending'			 => $old_options['postpageslist_status_pending'],
			'postpageslist_status_private'			 => $old_options['postpageslist_status_private'],
			'postpageslist_template_filter_enable'	 => $old_options['postpageslist_template_filter_enable'],
			'postpageslist_title_column_width'		 => $old_options['postpageslist_title_column_width'],
			'posts_rename_enable'					 => $posts_rename,
			'profile_bio'							 => $old_options['profile_bio'],
			'profile_css'							 => $old_options['profile_css'],
			'profile_descriptions'					 => $old_options['profile_descriptions'],
			'profile_display_name'					 => $old_options['profile_display_name'],
			'profile_h3_titles'						 => $old_options['profile_h3_titles'],
			'profile_hidden'						 => $old_options['profile_hidden'],
			'profile_nickname'						 => $old_options['profile_nickname'],
			'profile_none'							 => $old_options['profile_none'],
			'profile_slim'							 => $old_options['profile_slim'],
			'profile_social'						 => $old_options['profile_social'],
			'profile_website'						 => $old_options['profile_website'],
			'shortcodes_gdocs'						 => $old_options['shortcodes_gdocs'],
			'shortcodes_tube'						 => $old_options['shortcodes_tube'],
			'shortcodes_everywhere'					 => $old_options['widget_text_enable_shortcodes'],
			'widget_meta_slim'						 => $old_options['widget_meta_enable'],
			'widget_rss_update_timer'				 => $old_options['widget_rss_update_timer'],
			'widget_remove'							 => $widgets_remove,
			'wpblock_update_wp'						 => $old_options['wpblock_update_wp'],
			'wpdisable_autop'						 => $old_options['wpdisable_autop'],
			'wpdisable_capitalp'					 => $old_options['wpdisable_capitalp'],
			'wpdisable_nourl'						 => $old_options['wpdisable_nourl'],
			'wpdisable_selfping'					 => $old_options['wpdisable_selfping'],
			'wpdisable_smartquotes'					 => $old_options['wpdisable_smartquotes'],
			'wpdisable_version_full'				 => $old_options['wpdisable_version_full'],
			'wpdisable_version_number'				 => $old_options['wpdisable_version_number'],
			'wprss_delay_publish_enable'			 => $rss_delay,
		);
		$v2_options = array_merge( self::$default_options, $v2_options );
		$update_2_3 = self::update_plugin_2_3( $v2_options );
		return $update_2_3;
	}

}