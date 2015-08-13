<?php
/**
 * Plugin Name: Admin Tweaks
 * Plugin URI: http://wordpress.org/extend/plugins/many-tips-together
 * Description: Tweak, style, remove and modify several aspects of your WordPress administrative interface.
 * Version: 2.3.8
 * Author: Rodolfo Buaiz
 * Author URI: http://brasofilo.com/
 * Text Domain: mtt
 * Domain Path: /languages
 * License: GPLv2 or later
 */

/**
 *	This program is free software; you can redistribute it and/or
 *	modify it under the terms of the GNU General Public License
 *	as published by the Free Software Foundation; either version 2
 *	of the License, or (at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */


/**
 * SETUP & INIT PLUGIN
 * 
 */
add_action( 'plugins_loaded', array( B5F_MTT_Init::get_instance(), 'plugin_setup' ) );


/**
 * In depth customization of WordPress administrative interface, plus some other goodies.
 * 
 * @author Rodolfo Buaiz
 * @since 2.0
 * @version 2.0
 * @package Admin Tweaks
 * @subpackage 
 */
class B5F_MTT_Init
{
	/**
	 * Plugin instance.
	 *
	 * @see get_instance()
	 * @type object
	 */
	protected static $instance = NULL;

    
	/**
	 * Container for Plugin Settings
	 * 
	 * @since 2.0
	 * @type array
	 */
	public $options;

    
	/**
	 * Options name
	 *
	 * @since 2.0
	 * @type string
	 */
	public static $opt_name		 = 'ManyTipsTogether';

    
	/**
	 * Plugin version
	 *
	 * @since 1.0
	 * @type string
	 */
	public static $version		 = '2.3.8';

    
	/**
	 * Development only, no cache for styles/scripts
	 * @var boolean 
	 */
	public static $disable_scripts_cache = false;

    
	/**
	 * Plugin dirname/filename.php
	 * @var string 
	 */
    public $plugin_basename;
    
    
    /**
	 * Plugin directory name
	 * @var string 
	 */
    public $plugin_slug;
    
    
    /**
	 * Plugin URL
	 * @var string 
	 */
    public $plugin_url;
    
    
	/**
	 * Plugin system path
	 * @var string 
	 */
    public $plugin_path;

    
	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @since   2.0
	 * @return  object of this class
	 */
	public static function get_instance()
	{
		NULL === self::$instance and self::$instance = new self;
		return self::$instance;
	}


	 /**
	 * Used for regular plugin work.
	 *
	 * @wp-hook plugins_loaded
	 * @since   2.0
	 * @return  void
	 */
	public function plugin_setup()
	{
        $this->plugin_basename = plugin_basename( __FILE__ );
        $this->plugin_slug = dirname( plugin_basename( __FILE__ ) );
        $this->plugin_url = plugins_url( '/', __FILE__ );
        $this->plugin_path = plugin_dir_path( __FILE__ );
		# Utilities
		include_once plugin_dir_path( __FILE__ ) . 'inc/class-plugin-utils.php';

		# Plugin Metabox
		include_once plugin_dir_path( __FILE__ ) . 'inc/class-plugin-metabox.php';

		# Admin-Page-Class library
		require_once plugin_dir_path( __FILE__ ) . 'inc/admin-page-class/admin-page-class.php';

		# Admin interface class
		require_once plugin_dir_path( __FILE__ ) . 'inc/class-admin.php';

		# Validation
		include_once plugin_dir_path( __FILE__ ) . 'inc/class-admin-validate.php';

		add_filter( "plugin_action_links_$this->plugin_basename", array( $this, 'settings_plugin_link' ), 10, 2 );
		
		add_filter( 'apc_theme_export_filename', array( $this, 'theme_export_name' ) );

        foreach( array( 'plugin', 'bulk_plugins' ) as $hook )
            add_filter( "update_{$hook}_complete_actions", array( $this, 'update_msg' ), 10, 2 );

        add_filter( 'plugin_row_meta', array( $this, 'donate_link' ), 10, 4 );
        $this->load_language( 'mtt' );

		$this->setup_options();

		new B5F_MTT_Admin( $this->options );
	}
		
		
	/**
	 * Constructor. Intentionally left empty and public.
	 *
	 * @see plugin_setup()
	 * @since 2.0
	 */
	public function __construct(){ }

	

	/**
	 * First Run <-> Updating Plugin <-> Regular Use 
	 * 
	 * @see plugin_setup()
	 */
	public function setup_options()
	{
		$mtt = get_option( self::$opt_name );
		
		# FIRST INSTALL
		if( !$mtt )
		{
			$this->options = array_merge( 
					B5F_MTT_Utils::$default_options, 
					array( 'mtt_version' => B5F_MTT_Init::$version ) 
			);
			update_option( self::$opt_name, $this->options );
		}
		# PRE 2.0
		elseif( version_compare( $mtt['mtt_version'], '2.0', '<' )  )
		{
			$this->options	 = array_merge( 
					B5F_MTT_Utils::update_plugin_options( $mtt ),
					array( 'mtt_version' => B5F_MTT_Init::$version ) 
			);
			update_option( self::$opt_name, $this->options );
		}
		# PRE 2.3
		elseif( version_compare( $mtt['mtt_version'], '2.3', '<' )  )
		{
			$this->options	 = array_merge( 
					B5F_MTT_Utils::update_plugin_2_3( $mtt ),
					array( 'mtt_version' => B5F_MTT_Init::$version ) 
			);
			update_option( self::$opt_name, $this->options );
		}
		else
		{
			$this->options['mtt_version'] = B5F_MTT_Init::$version;
			$this->options	 = $mtt;
		}
	}


	/**
	 * Add link to settings in Plugins list page
	 * 
	 * @wp-hook plugin_action_links
	 * @return Plugin link
	 */
	public function settings_plugin_link( $links, $file )
	{
        $links[] = sprintf(
            '<a href="%s">%s</a>',
                admin_url( 'options-general.php?page=options-general.php_admin_tweaks' ),
                __( 'Settings' )
        );
		return $links;
	}


    /**
     * Add plugin link in update screen
     * 
     * @param array        $actions
     * @param string/array $info
     * @return array
     */
    public function update_msg( $actions, $info )
    {
       # The Bulk update $info is an array
       # use the Plugin URI
       $bulk = isset( $info['PluginURI'] ) 
           && 'http://wordpress.org/extend/plugins/many-tips-together' == $info['PluginURI'];
 
       # Single update $info is a string
       # use the plugin slug
       if( $this->plugin_basename == $info || $bulk )
       {
			$in = sprintf(
                '<a href="%s" style="font-weight:bold" target="_parent">%s</a>',
                    admin_url( 'options-general.php?page=options-general.php_admin_tweaks' ),
                    __( 'Go to Admin Tweaks settings page', 'mtt' )
            );
           array_unshift( $actions, $in );
       }

        return $actions;
    }


    /**
     * Add donate link to plugin description in /wp-admin/plugins.php
     * 
     * @param array $plugin_meta
     * @param string $plugin_file
     * @param string $plugin_data
     * @param string $status
     * @return array
     */
    public function donate_link( $plugin_meta, $plugin_file, $plugin_data, $status ) 
	{
        if( $plugin_file == $this->plugin_basename )
            $plugin_meta[] = '&hearts; <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=JNJXKWBYM9JP6&lc=ES&item_name=Admin%20Tweaks%20%3a%20Rodolfo%20Buaiz&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted">Buy me a beer :o)</a>';
		return $plugin_meta;
	}

    
    /**
	 * File name for the exported plugin options
	 * @return string
	 */
	public function theme_export_name()
	{
		$http = is_ssl() ? 'https://' : 'http://'; 
		$blogname = str_replace( $http, '', get_option('siteurl' ) );
		return "MTT-$blogname.txt";
	}

	
	/**
	 * Loads translation file.
	 * Accessible to other classes to load different language files (admin and
	 * front-end for example).
	 * References:
	 * http://core.trac.wordpress.org/ticket/18960
	 * http://www.geertdedeckere.be/article/loading-wordpress-language-files-the-right-way
	 *
	 * @see plugin_setup()
	 * @param   string $domain
	 * @since   2.0
	 * @return  void
	 */
	public function load_language( $domain )
	{
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		$mo_name = $domain . '-' . $locale . '.mo';
		$mo_path = WP_LANG_DIR . '/plugins/' . $this->plugin_slug . '/' . $mo_name;

		load_textdomain( $domain, $mo_path );
		load_plugin_textdomain( $domain, FALSE, $this->plugin_slug . '/languages' );
	}


}
