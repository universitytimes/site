<?php
/*
  Plugin Name: Use Google Libraries
  Plugin URI: http://jasonpenney.net/wordpress-plugins/use-google-libraries/
  Description: Allows your site to use common javascript libraries from Google's AJAX Libraries CDN, rather than from WordPress's own copies.
  Version: 1.5.2
  Author: Jason Penney
  Author URI: http://jasonpenney.net/
*/

/*  Copyright 2008-2013  Jason Penney (email : jpenney@jczorkmid.net )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation using version 2 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


*/

if ( !class_exists( 'JCP_UseGoogleLibraries' ) ) {

	class JCP_UseGoogleLibraries {

		private static $instance;
		private static $version = '1.5.2';
		public static function get_instance() {
			if ( !isset( self::$instance ) ) {
				self::$instance =  new JCP_UseGoogleLibraries();
			}
			return self::$instance;
		}
		
		/**
		 * Registry of script replacement rules
		 * 
		 * Entries are formatted as follows:
		 * <code>
		 *     'script-handle' => array( 
		 *         'google-lib-path', 
		 *         'google-file-name', 
		 *         'google-combined-into')
		 * </code>
		 *
		 * - 'script-handle' -- the handle used by WordPress script 
		 *   registration
		 * - 'google-lib-path' -- path to location on Google CDN( empty
		 *   string if script has been combined).
		 * - 'google-file-name' -- file name (minus .js) on Google CDN (empty
		 *   string if script has been combined).
		 * - 'google-combined-into' -- If not empty string, then the given 
		 *   handle has been combined into a file loaded by this handle.
		 *   
		 * @var array
		 */
		protected $google_scripts;
		
		/**
		 * Used internally to ensure jQuery.noconflict is executed as close to
		 * how core WordPress would.
		 * 
		 * @var bool
		 */
		protected $noconflict_next;

		/**
		 * script id used for actual jquery script
		 *
		 * @var string
		 *
		 * @since 5.2
		 */
		protected $jquery_tag;
		
		/**
		 * True if using a version of WordPress that allows 
		 * `wp_register_script` to take protocol-relative URLs, otherwise False
		 * 
		 * @since 1.5.2
		 * 
		 * @var bool
		 */
		protected $protocol_relative_supported;
		
		/**
		 * transient name used when caching
		 * 
		 * @var string
		 */
		protected static $cache_id = 'JCP_UseGoogleLibraries_cache';
		
		/**
		 * transient expiration
		 * 
		 * @var int
		 */
		protected static $cache_len = 90000; // 25 hours
		
		/**
		 * Message displayed and logged when a WP_Scripts has been created before it's time
		 * 
		 * @var unknown_type
		 */
		protected static $script_before_init_notice =
			'Another plugin has registered or enqued a script before the "init" action.  Attempting to work around it.';
		
		/**
		 * PHP 4 Compatible Constructor
		 */
		function JCP_UseGoogleLibraries() {$this->__construct();}

		/**
		 * PHP 5 Constructor
		 */
		function __construct() {
			$this->jquery_tag = 'jquery';
			$this->google_scripts =
				array(
				// any extra scripts listed here not provided by WordPress
				// or another plugin will not be registered.  This list
				// is just used to chancge where things load from.

				// 'script-handle' => ( 'google-lib-path', 'google-file-name', 'google-combined-into')
				/* jQuery */
				'jquery' => array( 'jquery', 'jquery.min', '' ),

				/* jQuery UI */
				'jquery-ui-core' => array( 'jqueryui', 'jquery-ui.min', '' ),
				'jquery-ui-accordion' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-autocomplete' => array( '', '', 'jquery-ui-core' ), /* jQueri UI 1.8 */
				'jquery-ui-button' => array( '', '', 'jquery-ui-core' ), /* jQuery UI 1.8 */
				'jquery-ui-datepicker' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-dialog' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-draggable' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-droppable' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-menu' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-mouse' => array( '', '', 'jquery-ui-core' ),  /* jQuery UI 1.8 */
				'jquery-ui-position' => array( '', '', 'jquery-ui-core' ),  /* jQuery UI 1.8 */
				'jquery-ui-progressbar' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-resizable' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-selectable' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-slider' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-sortable' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-tabs' => array( '', '', 'jquery-ui-core' ),
				'jquery-ui-widget' => array( '', '', 'jquery-ui-core' ),  /* jQuery UI 1.8 */

				/* jQuery Effects */
				'jquery-effects-core' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-blind' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-bounce' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-clip' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-drop' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-explode' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-fade' => array( '', '', 'jquery-ui-core' ),  /* jQuery UI 1.8 */
				'jquery-effects-fold' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-highlight' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-pulsate' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-scale' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-shake' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-slide' => array( '', '', 'jquery-ui-core' ),
				'jquery-effects-transfer' => array( '', '', 'jquery-ui-core' ),

				/* prototype */
				'prototype' => array( 'prototype', 'prototype', '' ),

				/* scriptaculous */
				'scriptaculous-root' => array( 'scriptaculous', 'scriptaculous', '' ),
				'scriptaculous-builder' => array( '', '', 'scriptaculous-root' ),
				'scriptaculous-effects' => array( '', '', 'scriptaculous-root' ),
				'scriptaculous-dragdrop' => array( '', '', 'scriptaculous-root' ),
				'scriptaculous-controls' => array( '', '', 'scriptaculous-root' ),
				'scriptaculous-slider' => array( '', '', 'scriptaculous-root' ),
				'scriptaculous-sound' => array( '', '', 'scriptaculous-root' ),

				/* moo tools */
				'mootools' => array( 'mootools', 'mootools-yui-compressed', '' ),

				/* Dojo */
				'dojo' => array( 'dojo', 'dojo.xd', '' ),

				/* swfobject */
				'swfobject' => array( 'swfobject', 'swfobject', '' ),

				/* YUI */
				'yui' => array( 'yui', 'build/yuiloader/yuiloader-min', '' ),

				/* Ext Core */
				'ext-core' => array( 'ext-core', 'ext-core', '' )

			);
			$this->noconflict_next = FALSE;
			// protocol-relative URLS accepted by `wp_register_scripts` 
			// starting with version 3.5
			$this->protocol_relative_supported = version_compare( get_bloginfo( 'version' ), '3.5', '>=' );
		}

		static function configure_plugin() {
			add_action( 'wp_default_scripts',
				array( 'JCP_UseGoogleLibraries',
					'replace_default_scripts_action' ),
				1000 );
			add_filter( 'script_loader_src',
				array( "JCP_UseGoogleLibraries", "remove_ver_query_filter" ),
				1000 );
			add_filter( 'init', array( "JCP_UseGoogleLibraries", "setup_filter" ) );

			// There's a chance some plugin has called wp_enqueue_script outside
			// of any hooks, which means that this plugin's 'wp_default_scripts'
			// hook will never get a chance to fire.  This tries to work around
			// that.
			global $wp_scripts;
			if ( is_a( $wp_scripts, 'WP_Scripts' ) ) {
				self::debug( self::$script_before_init_notice );
				$ugl = self::get_instance();
				$ugl->replace_default_scripts( $wp_scripts );
			}
		}

		/**
		 * Get markup to show error message in admin when $WP_Script created befor it's time 
		 * @returns string markup for notice display 
		 */
		static function script_before_init_admin_notice() {
			echo '<div class="error fade"><p>Use Google Libraries: ' . self::$script_before_init_notice . '</p></div>';
		}

		static function setup_filter() {
			$ugl = self::get_instance();
			$ugl->setup();
		}

		/**
		 * Log message if `WP_DEBUG` enabled.
		 *
		 * @since 1.5
		 *
		 * @param mixed   $message string to log, or object to log via `print_r`
		 */
		static function debug( $message ) {
			if ( WP_DEBUG !== false ) {
				if ( is_array( $message ) || is_object( $message ) ) {
					$message = print_r( $message, true );
				}
				error_log( "Use Google Libraries: " . $message );
			}
		}

		/**
		 * Disables script concatination, which breaks when dependencies are not
		 * all loaded locally.
		 */
		function setup() {
			global $concatenate_scripts;
			$concatenate_scripts = false;

		}


		static function replace_default_scripts_action( &$scripts ) {
			$ugl = self::get_instance();
			$ugl->replace_default_scripts( $scripts );
		}

		/**
		 * Collects replacement script registration data.
		 *
		 * Processes standard WordPress script registrations against list of
		 * scripts hosted on Google's CDN.  Will exclude any scripts that
		 * contain '-' in the version number (used by WordPress devs to signify
		 * a non-standard version). Also, the new url will be queried to ensure
		 * it's valid (via `wp_remote_head`).
		 *
		 * @since 1.5
		 *
		 * @param object  $scripts WP_Scripts object
		 * @return array updated script registration data
		 */
		function build_newscripts( &$scripts ) {
			$newscripts = array();
			$combine_ok = array();
			
			// jquery may really be loaded under jquery-core
			// if so, we'll adjust google_scripts here
			if ( $scripts->query( 'jquery-core' ) && array_key_exists( 'jquery', $this->google_scripts ) ) {
				$this->google_scripts['jquery-core'] = $this->google_scripts['jquery'];
				unset($this->google_scripts['jquery']);
				$this->jquery_tag = 'jquery-core';
			}
			
			foreach ( $this->google_scripts as $name => $values ) {
				if ( $script = $scripts->query( $name ) ) {
					$lib = $values[0];
					$js = $values[1];
					$combined = $values[2];
					// default to requested ver
					$ver = $script->ver;

					if ( strpos( $ver, '-' ) !== false ) {
						self::debug( "WordPress appears to be requesting a non-standard version of $name (version $ver). Using version provided by WordPress to ensure compatability." );
						continue;
					}

					// TODO: replace with more flexible option
					// quick and dirty work around for scriptaculous 1.8.0
					if ( $name == 'scriptaculous-root' && $ver == '1.8.0' ) {
						$ver = '1.8';
					}

					if ( $combined !== '' ) {
						if ( ! in_array( $combined, $combine_ok ) ) {
							self::debug( "Google servers not hosting combined library for $name (version $ver). Using version provided by WordPress to ensure compatability." );
							continue;
						}
						if ( ! in_array( $combined, $script->deps ) ) {
							// if this script has been combined into another script
							// ensure this handle depends on the combined handle
							$script->deps[] = $combined;
						}
					}

					// if $lib is empty, then this script does not need to be
					// exlicitly loaded when using googleapis.com, but we need to keep
					// it around for dependencies
					if ( $lib != '' ) {
						// build new URL
						$url = "//ajax.googleapis.com/ajax/libs/$lib/$ver/$js.js";
						if ( wp_remote_retrieve_response_code( wp_remote_head( "http:$url" ) ) !== 200 ) {
							self::debug( "Google servers do not seem to be hosting requested version of $name (version $ver). Using version provided by WordPress." );
							continue;
						}
						if ( ! $this->protocol_relative_supported ) {
							$url = "http:$url";
						}
						$script->src = $url;
					} else {
						$script->src = "";
					}
					$newscripts[] = $script;
					$combine_ok[] = $name;
				}
			}
			return $newscripts;

		}


		/**
		 * Get new script registration data.
		 *
		 * Attempts to load script registration data from the transient cache.
		 * If not in cache, or if cached data is from a different version of
		 * either WordPress or this plug-in, then it will be rebuilt.  Also
		 * handles forcing URLS to use SSL if site is currently loaded over
		 * SSL.
		 *
		 * @since 1.5
		 *
		 * @param object  $scripts WP_Scripts object
		 * @return array updated script registration data
		 */
		function get_newscripts( &$scripts ) {
			$wp_ver = get_bloginfo( 'version' );
			if ( false === ( $cache = get_transient( self::$cache_id ) ) ) {
				$cache = array();
			}
			if ( ( ! isset( $cache['ugl_ver'] ) ) || ( $cache['ugl_ver'] !== self::$version ) ||
				( ! isset( $cache['wp_ver'] ) ) || ( $cache['wp_ver'] !== $wp_ver ) ||
				( ! isset( $cache['newscripts'] ) ) ) {
				$newscripts = $this->build_newscripts( $scripts );
				$cache = array(
					'ugl_ver' => self::$version,
					'wp_ver' => $wp_ver,
					'newscripts' => $newscripts,
				);
				set_transient( self::$cache_id, $cache, self::$cache_len );
			} else {
				$newscripts = $cache['newscripts'];
			}
			// need to handle ssl after cache load, because it may swap
			// back and forth depending on the site config/usage
			if ( ( ! $this->protocol_relative_supported ) && ( is_ssl() ) ) {
				foreach ( $newscripts as $script ) {
					$script->src = preg_replace( '/^http:/', 'https:', $script->src );
				}
			}
			return $newscripts;
		}

		/**
		 * Replace as many of the WordPress default script registrations as
		 * possible with ones from Google
		 *
		 * @param object  $scripts WP_Scripts object.
		 */
		function replace_default_scripts( &$scripts ) {
			$newscripts = $this->get_newscripts( $scripts );
			foreach ( $newscripts as $script ) {
				$olddata = $this->WP_Dependency_get_data( $scripts, $script->handle );
				$scripts->remove( $script->handle );
				// re-register with original ver
				$scripts->add( $script->handle, $script->src, $script->deps, $script->ver );
				if ( $olddata ) {
					foreach ( $olddata as $data_name => $data ) {
						$scripts->add_data( $script->handle, $data_name, $data );
					}
				}
			}
		}


		function WP_Dependency_get_data( $dep_obj, $handle, $data_name = false ) {

			if ( !method_exists( $dep_obj, 'add_data' ) )
				return false;

			if ( !isset( $dep_obj->registered[$handle] ) )
				return false;

			if ( !$data_name )
				return $dep_obj->registered[$handle]->extra;

			if ( !method_exists( $dep_obj, 'get_data' ) )
				return $dep_obj->registered[$handle]->extra[$data_name];
			
			return $dep_obj->get_data( $handle, $data_name );
		}


		/**
		 * Remove 'ver' from query string for scripts loaded from Google's
		 * CDN
		 *
		 * @param string  $src src attribute of script tag
		 * @return string Updated src attribute
		 */
		function remove_ver_query( $src ) {
			if ( $this->noconflict_next ) {
				$this->noconflict_next = FALSE;
				echo "<script type='text/javascript'>try{jQuery.noConflict();}catch(e){};</script>\n";
			}
			if ( preg_match( '/ajax\.googleapis\.com\//', $src ) ) {
				$src = remove_query_arg( 'ver', $src );
				if ( strpos( $src, $this->google_scripts[$this->jquery_tag][1] . ".js" ) ) {
					$this->noconflict_next = TRUE;
				}
			}
			return $src;
		}

		static function remove_ver_query_filter( $src ) {
			$ugl =  self::get_instance();
			return $ugl->remove_ver_query( $src );
		}
	}
}

//instantiate the class
if ( class_exists( 'JCP_UseGoogleLibraries' ) ) {
	JCP_UseGoogleLibraries::configure_plugin();
}
