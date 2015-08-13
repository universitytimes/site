<?php
/**
 * Dashboard hooks
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

class MTT_Hook_Dashboard
{
	// store the options
	protected $params;
	
	private $dashboard_widgets = array();

	/**
	 * Check options and dispatch hooks
	 * 
	 * @param  array $options
	 * @return void
	 */
	public function __construct( $options )
	{
		$this->params = $options;

		$welcome = 
				!empty( $this->params['dashboard_remove'] ) 
				? in_array( 'welcome', $this->params['dashboard_remove'] ) 
				: false;
		if( $welcome )
			add_action( 'admin_head-index.php', array( $this, 'remove_welcome' ) );

		if( !empty( $this->params['dashboard_remove_footer_rightnow'] ) )
			add_action( 'admin_head-index.php', array( $this, 'right_now_footer' ) );

		if( !empty( $this->params['dashboard_add_cpt_enable'] ) )
			add_action( 'right_now_content_table_end', array( $this, 'right_now_cpt' ) );

		if( !empty( $this->params['dashboard_remove'] ) )
			add_action( 'wp_dashboard_setup', array( $this, 'remove_widgets' ), 0 );
		
		if( isset( $this->params['dashboard_add_widgets'] ) )
			add_action( 'wp_dashboard_setup', array( $this, 'add_widgets' ), 0 );
        
		if( !empty( $this->params['dashboard_folder_size'] ) )
        {
            require_once 'class-widget-folder-size.php';
            B5F_Folder_Size_Widgets::init( $this->params['dashboard_folder_size'] );
        }
	}


	public function remove_welcome()
	{
		?>
		<style type="text/css">

			#welcome-panel {display:none}
		</style>
		<script type="text/javascript">
			jQuery(document).ready( function($) 
			{
				$("label[for='wp_welcome_panel-hide']").remove();
			});     
		</script>
		<?php

	}


	public function right_now_footer()
	{
		echo '<script type="text/javascript">jQuery(document).ready( function($) { $(".versions").html("") });</script>';
	}


	public function right_now_cpt()
	{
		$args = array(
			'public'	 => true,
			'show_ui'	 => true,
			'_builtin'	 => false
		);
		$output		 = 'object';
		$operator	 = 'and';

		$post_types = get_post_types( $args, $output, $operator );
		foreach( $post_types as $post_type )
		{
			$num_posts	 = wp_count_posts( $post_type->name );
			$num		 = number_format_i18n( $num_posts->publish );
			$text		 = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
			if( current_user_can( 'edit_posts' ) )
			{
				$num		 = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
				$text		 = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
			}
			echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td>';
			echo '<td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
		}
		$taxonomies	 = get_taxonomies( $args, $output, $operator );
		foreach( $taxonomies as $taxonomy )
		{
			$num_terms	 = wp_count_terms( $taxonomy->name );
			$num		 = number_format_i18n( $num_terms );
			$text		 = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, intval( $num_terms ) );
			if( current_user_can( 'manage_categories' ) )
			{
				$num	 = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num</a>";
				$text	 = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$text</a>";
			}
			echo '<tr><td class="first b b-' . $taxonomy->name . '">' . $num . '</td>';
			echo '<td class="t ' . $taxonomy->name . '">' . $text . '</td></tr>';
		}
	}


	public function remove_widgets()
	{
        $base = array(
            'quick_press' => 'side',
            'incoming_links' => 'normal',
            'right_now' => 'normal',
            'plugins' => 'normal',
            'recent_drafts' => 'side',
            'recent_comments' => 'normal',
            'primary' => 'side', // other news
            'secondary' => 'side', // official blog
        );
        foreach( $base as $mb => $place )
            if( in_array( $mb, $this->params['dashboard_remove'] ) )
                remove_meta_box( "dashboard_$mb", 'dashboard', $place );
	}
	
	public function add_widgets()
	{	
		$i = 0;
		foreach( $this->params['dashboard_add_widgets'] as $dash_widg )
		{
			$ucan = 
					empty( $dash_widg['roles'] ) 
					? true 
					: B5F_MTT_Utils::current_user_has_role_array( $dash_widg['roles'] );
			
			if( $ucan && !empty( $dash_widg['enabled'] ) )
			{
				$title = 
						( $dash_widg['title'] == '') 
						? '&nbsp;&nbsp;' 
						: stripslashes( $dash_widg['title'] );

				wp_add_dashboard_widget( "mtt_widget_$i", $title, array( $this, 'add_dashboard_content' ) );
			}
			$i++;
		}
	}


	public function add_dashboard_content( $object, $box )
	{
		$id = str_replace('mtt_widget_', '', $box['id'] );
		echo do_shortcode( stripslashes( 
				$this->params['dashboard_add_widgets'][$id]['content'] 
		));
	}
}