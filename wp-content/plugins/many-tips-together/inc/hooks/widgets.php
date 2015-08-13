<?php
/**
 * Widgets hooks
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

class MTT_Hook_Widgets
{
	# store the options
	protected $params;
	

	/**
	 * Check options and dispatch hooks
	 * 
	 * @param  array $options
	 * @return void
	 */
	public function __construct( $options )
	{
		global $pagenow;

		$this->params = $options;

		# REMOVE WIDGETS
		if( isset( $options['widget_remove'] ) )
			add_action(
					'widgets_init', array( $this, 'remove_widgets' ), 15
			);

		# FIRST SIDEBAR CLOSED AS DEFAULT
		if( !empty( $options['widget_close_first_sidebar'] ) )
        {
			add_action( 'admin_head-widgets.php', array( $this, 'close_sidebar_css' ) );
			add_action( 'admin_footer-widgets.php', array( $this, 'close_sidebar_js' ) );
        }
        
        
		# SIMPLE META WIDGET
		if( !empty( $options['widget_meta_slim'] ) )
		{
			$can_do = !empty( $this->params['widget_remove'] ) ? !in_array( 'meta', $this->params['widget_remove'] ) : true;
			if( $can_do )
			{
				require_once ('class-widget-meta-slim.php');
				add_action(
						'widgets_init', array( $this, 'meta_slim' )
				);
			}
		}

		# CHANGE RSS UPDATE TIMER
		if( !empty( $options['widget_rss_update_timer'] ) )
			add_filter(
					'wp_feed_cache_transient_lifetime', array( $this, 'widgetsRss_update_timer' )
			);

		# CHANGE RSS UPDATE TIMER
		if( !empty( $options['widget_break_title_long_lines'] ) )
			add_action(
					'admin_head-widgets.php', array( $this, 'css_break_lines' )
			);

		# SIMPLE META WIDGET
		if( 'widgets.php' == $pagenow && !empty( $options['widget_hide_description'] ) )
			add_action( 'admin_head', array( $this, 'hide_descriptions' ) );

	}


    /**
     * Hide the whole right column to let JS close the first sidebar
     * http://wordpress.stackexchange.com/q/114716/12615
     */
    public function close_sidebar_css()
    {
        echo '<style type="text/css">#widgets-right {display:none}</style>';
    }
    
    /**
     * Close the first sidebar and show the right column
     * http://wordpress.stackexchange.com/q/114716/12615
     */
    public function close_sidebar_js()
    {
        ?>
       <script type="text/javascript">
       jQuery(document).ready(function($) {
           $('#widgets-right .widgets-holder-wrap:first').addClass('closed');
           $('#widgets-right').show('fast'); 
       });
       </script>
       <?php
    }
    
	/**
	 * Remove selected widgets
	 */
	function remove_widgets()
	{
		$can_do = false;
		
		if( empty( $this->params['widget_remove_role'] ) )
			$can_do = true;
		elseif ( !current_user_can( 'add_users' ) )
			$can_do = true;
		
		if( in_array( 'akismet', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'Akismet_Widget' );

		if( in_array( 'pages', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Pages' );

		if( in_array( 'calendar', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Calendar' );

		if( in_array( 'archives', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Archives' );

		if( in_array( 'links', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Links' );

		if( in_array( 'meta', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Meta' );

		if( in_array( 'search', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Search' );

		if( in_array( 'text', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Text' );

		if( in_array( 'categories', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Categories' );

		if( in_array( 'recent_posts', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Recent_Posts' );

		if( in_array( 'recent_comments', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Recent_Comments' );

		if( in_array( 'rss', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_RSS' );

		if( in_array( 'tag_cloud', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Widget_Tag_Cloud' );

		if( in_array( 'nav_menu', $this->params['widget_remove'] ) && $can_do )
			unregister_widget( 'WP_Nav_Menu_Widget' );
		
		if( !empty( $this->params['widgets_non_default'] ) )
		{
			foreach( $this->params['widgets_non_default'] as $k => $v )
				if( in_array( $k, $this->params['widget_remove'] ) && $can_do )
					unregister_widget( $k );
		}
			
	}


	/**
	 * New meta widget, without WordPress stuff
	 */
	function meta_slim()
	{
		unregister_widget( 'WP_Widget_Meta' );
		register_widget( 'WP_Widget_Meta_Slim' );
	}


	/**
	 * Change RSS update timer
	 * 
	 * @return ing Timer in minutes
	 */
	function rss_update_timer()
	{
		$num = (int) $this->params['widget_rss_update_timer'] * 60;
		return $num;
	}
	
	/**
	 * Break long titles into new lines
     * http://wordpress.stackexchange.com/a/98598/12615
	 * 
	 * @return void
	 */
	function css_break_lines()
	{
        echo "<style>
            .widget-top{height:auto !important;}
            .widget-title h4, .widget-title span.in-widget-title{ white-space:normal; }
        </style>";
	}
	
	public function hide_descriptions()
	{
		echo '<style type="text/css">.widget-description {display: none !important;}</style>';
	}
}