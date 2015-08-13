<?php
/**
 * Post Listing hooks
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

class MTT_Hook_Post_Listing
{
	// store the options
	protected $params;

	
	/**
	 * Check options and dispatch hooks
	 * 
	 * @param  array $options
	 * @return void
	 */
	public function __construct( $options )
	{
		$this->params = $options;

		// PERSISTENT LIST VIEW
		// promissed to 3.5, but did't came
		if( !empty( $options['postpageslist_persistent_list_view'] ) )
			add_action(
					'load-edit.php', array( $this, 'persistent_posts_list_mode' )
			);

		// CATEGORY COUNT
		if( !empty( $options['postpageslist_enable_category_count'] ) )
			add_action(
					'load-edit.php', array( $this, 'category_count_load' )
			);

		// FILTER PAGES BY TEMPLATE
		if( !empty( $options['postpageslist_template_filter_enable'] ) )
		{
			// Class for sorting pages by template
			include_once plugin_dir_path( __FILE__ ) . 'class-pages-filter-by-template.php';
			add_action(
					'admin_init', array( 'MTT_Page_Template_Filter', 'init' )
			);
		}

		// MAKE DUPLICATE AND DELETE REVISIONS
		if( !empty( $options['postpageslist_duplicate_del_revisions'] ) )
		{
			// Class for removing revisions and making duplicates (posts and pages)
			include_once plugin_dir_path( __FILE__ ) . 'class-posts-revisions-duplicate.php';

			add_action(
					'admin_init', array( 'MTT_Manage_Duplicates_Revisions', 'init' )
			);
		}

		// ADD ID COLUMN
		if( !empty( $options['postpageslist_enable_id_column'] ) )
			add_action(
					'admin_init', array( $this, 'init_id_column' ), 999
			);

		// ADD THUMBNAIL COLUMN
		if( !empty( $options['postpageslist_enable_thumb_column']['enabled'] ) )
		{
			add_action(
					'admin_init', array( $this, 'init_thumb_column' ), 999
			);
		}

		// CSS FOR CUSTOM COLUMNS
		add_action(
				'admin_head-edit.php', array( $this, 'id_width_and_status_colors' )
		);
		
		// CSS FOR MOVE ROW OF POST STATUSES
		if( !empty( $options['postpageslist_move_views_row'] ) )
		{
			foreach( array( 'upload.php', 'edit.php' ) as $hook )
				add_action(
						"admin_footer-$hook", array( $this, 'init_row_status' ), 999
				);
		}
	}


	/**
	 * Persistent Post list mode
	 * 
	 * @author http://wordpress.stackexchange.com/a/47417/12615
	 * @return type
	 */
	public function persistent_posts_list_mode()
	{
		global $typenow;

		if( is_post_type_hierarchical( $typenow ) )
			return; // don't care

		if( isset( $_REQUEST['mode'] ) )
		{
			// save the list mode
			update_user_meta( 
					get_current_user_id(), 
					'posts_list_mode' . $typenow, 
					$_REQUEST['mode'] 
			);
			return;
		}

		// retrieve the list mode
		$mode = get_user_meta( get_current_user_id(), 'posts_list_mode' . $typenow, true );
		if( $mode )
			$_REQUEST['mode'] = $mode;
	}

	/**
	 * Add category count to the dropdown selector
	 */
	public function category_count_load()
	{
		global $typenow;
		if( !in_array( $typenow, apply_filters( 'mtt_category_counts_cpts', array( 'post' ) ) ) )
			return;

		add_filter( 'wp_dropdown_cats', array( $this, 'category_count_do' ) );
	}
	
	/**
	 * TODO: document
	 * 
	 * @global type $cat
	 * @param type $output
	 * @return string
	 */
	public function category_count_do( $output )
	{
		global $cat;
		$args = array(
			'show_option_all' => __( 'View all categories' ),
			'hide_empty' => 0,
			'hierarchical' => 1,
			'show_count' => 1,
			'orderby' => 'name',
			'selected' => $cat
		);
		$defaults = array(
			'show_option_all' => '', 
			'show_option_none' => '',
			'orderby' => 'id', 
			'order' => 'ASC',
			'show_count' => 0,
			'hide_empty' => 1, 
			'child_of' => 0,
			'exclude' => '', 
			'echo' => 1,
			'selected' => 0, 
			'hierarchical' => 0,
			'name' => 'cat', 
			'id' => '',
			'class' => 'postform', 
			'depth' => 0,
			'tab_index' => 0, 
			'taxonomy' => 'category',
			'hide_if_empty' => false
		);

		$defaults['selected'] = ( is_category() ) ? get_query_var( 'cat' ) : 0;

		$r = wp_parse_args( $args, $defaults );

		if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
			$r['pad_counts'] = true;
		}

		extract( $r );

		$tab_index_attribute = '';
		if ( (int) $tab_index > 0 )
			$tab_index_attribute = " tabindex=\"$tab_index\"";

		$categories = get_terms( $taxonomy, $r );
		$name = esc_attr( $name );
		$class = esc_attr( $class );
		$id = $id ? esc_attr( $id ) : $name;

		if ( ! $r['hide_if_empty'] || ! empty($categories) )
			$output = "<select name='$name' id='$id' class='$class' $tab_index_attribute>\n";
		else
			$output = '';

		if ( empty($categories) && ! $r['hide_if_empty'] && !empty($show_option_none) ) {
			$show_option_none = apply_filters( 'list_cats', $show_option_none );
			$output .= "\t<option value='-1' selected='selected'>$show_option_none</option>\n";
		}

		if ( ! empty( $categories ) ) {

			if ( $show_option_all ) {
				$show_option_all = apply_filters( 'list_cats', $show_option_all );
				$selected = ( '0' === strval($r['selected']) ) ? " selected='selected'" : '';
				$output .= "\t<option value='0'$selected>$show_option_all</option>\n";
			}

			if ( $show_option_none ) {
				$show_option_none = apply_filters( 'list_cats', $show_option_none );
				$selected = ( '-1' === strval($r['selected']) ) ? " selected='selected'" : '';
				$output .= "\t<option value='-1'$selected>$show_option_none</option>\n";
			}

			if ( $hierarchical )
				$depth = $r['depth'];  // Walk the full depth.
			else
				$depth = -1; // Flat.

			$output .= walk_category_dropdown_tree( $categories, $depth, $r );
		}

		if ( ! $r['hide_if_empty'] || ! empty($categories) )
			$output .= "</select>\n";

		return $output;
	}
	
	
	/**
	 * Dispatch ID custom column
	 * 
	 */
	public function init_id_column()
	{
		add_filter( 
				'manage_pages_columns', array( $this, 'id_column_define' )
		);
		add_filter( 
				'manage_posts_columns', array( $this, 'id_column_define' )
		);
		add_action( 
				'manage_pages_custom_column', array( $this, 'id_column_display' ), 10, 2
		);
		add_action( 
				'manage_posts_custom_column', array( $this, 'id_column_display' ), 10, 2
		);
	}


	/**
	 * Dispatch Thumbnail custom column
	 * 
	 */
	public function init_thumb_column()
	{
		add_filter(
				'manage_posts_columns', array( $this, 'thumb_column_define' )
		);
		add_filter(
				'manage_pages_columns', array( $this, 'thumb_column_define' )
		);
		add_action(
				'manage_posts_custom_column', array( $this, 'thumb_column_display' ), 10, 2
		);
		add_action(
				'manage_pages_custom_column', array( $this, 'thumb_column_display' ), 10, 2
		);
	}


	/**
	 * Add ID column
	 * 
	 * @param type $cols
	 * @return type
	 */
	public function id_column_define( $cols )
	{
		$in = array( "id" => "ID" );
		$cols = B5F_MTT_Utils::array_push_after( $cols, $in, 0 );

		return $cols;
	}


	/**
	 * Add Thumbnail column
	 * 
	 * @param type $col_name
	 * @param type $id
	 */
	public function id_column_display( $col_name, $id )
	{
		if( $col_name == 'id' )
			echo $id;
	}


	/**
	 * Register Thumbnail column
	 * 
	 * @param array $cols
	 * @return type
	 */
	public function thumb_column_define( $cols )
	{

		$cols['thumbnail'] = __( 'Thumbnail', 'mtt' );

		return $cols;
	}


	/**
	 * Render Thumbnail column
	 * 
	 * @param type $column_name
	 * @param type $post_id
	 */
	public function thumb_column_display( $column_name, $post_id )
	{
		$width = $height = 
				!empty( $this->params['postpageslist_enable_thumb_column']['proportion'] ) 
				? $this->params['postpageslist_enable_thumb_column']['proportion'] : '50';

		if( 'thumbnail' == $column_name )
		{
			// FEATURED IMAGE
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );

			// ATTACHED IMAGE
			$attachments = get_children( array(
				'post_parent'	 => $post_id,
				'post_type'		 => 'attachment',
				'post_mime_type' => 'image',
				'numberposts'	 => -1,
				'orderby'		 => 'menu_order' )
			);
			$count = '';
			// Show only if option is set
			if( $attachments && count($attachments)>1 && !empty( $this->params['postpageslist_enable_thumb_column']['count'] ) )
				$count = '<br><small>total: '. count($attachments) . '</small>';
			if( $thumbnail_id )
			{
				$thumb = sprintf(
						'%s<br>%s %s',
						__( 'Featured', 'mtt' ),
						wp_get_attachment_image( $thumbnail_id, array( $width, $height ), true ),
						$count
				);
				
			}
			elseif( $attachments )
			{
				$att_id = key( $attachments );
				$thumb = sprintf(
						'%s<br>%s %s',
						__( 'Attached', 'mtt' ),
						wp_get_attachment_image( $att_id, array( $width, $height ), true ),
						$count
				); 
			}

			if( isset( $thumb ) )
				echo $thumb;
		}
	}


	/**
	 * Print CSS to Post listing screen
	 * 
	 */
	public function id_width_and_status_colors()
	{
		$output = '';
		if( !empty( $this->params['postpageslist_enable_id_column'] ) )
			$output .= "\t" . '.column-id{width:3em} ' . "\r\n";

		if( !empty( $this->params['postpageslist_enable_thumb_column']['enabled'] ) )
			$output .= "\t" 
				. '.column-thumbnail{width:' 
				. $this->params['postpageslist_enable_thumb_column']['width'] 
				. '} .thumbnail.column-thumbnail img { max-width: '
				. $this->params['postpageslist_enable_thumb_column']['proportion'] 
				.'px; }' . "\r\n";

		if( !empty( $this->params['postpageslist_title_column_width'] ) )
			$output .= "\t" 
				. '.column-title {width: ' 
				. $this->params['postpageslist_title_column_width'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_draft'] ) 
				&& '#' != $this->params['postpageslist_status_draft'] 
			)
			$output .= "\t" 
				. '.status-draft {background: ' 
				. $this->params['postpageslist_status_draft'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_pending'] ) 
				&& '#' != $this->params['postpageslist_status_pending'] 
			)
			$output .= "\t" 
				. '.status-pending {background: ' 
				. $this->params['postpageslist_status_pending'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_future'] ) 
				&& '#' != $this->params['postpageslist_status_future'] 
			)
			$output .= "\t" 
				. '.status-future {background: ' 
				. $this->params['postpageslist_status_future'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_private'] ) 
				&& '#' != $this->params['postpageslist_status_private'] 
			)
			$output .= "\t" 
				. '.status-private {background: ' 
				. $this->params['postpageslist_status_private'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_password'] ) 
				&& '#' != $this->params['postpageslist_status_password'] 
			)
			$output .= "\t" 
				. '.post-password-required {background: ' 
				. $this->params['postpageslist_status_password'] 
				. '} ' . "\r\n";

		if( 
				!empty( $this->params['postpageslist_status_others'] ) 
				&& '#' != $this->params['postpageslist_status_others'] 
			)
			$output .= "\t" 
				. '.author-other {background: ' 
				. $this->params['postpageslist_status_others'] 
				. '} ' . "\r\n";

		if( '' != $output )
			echo '<style type="text/css">' . "\r\n" . $output . '</style>' . "\r\n";
	}

	/**
	 * Print CSS to Post listing screen
	 * 
	 */
	public function init_row_status()
	{
		$left = function_exists( 'mp6_register_admin_color_schemes' ) ? '0' : '44px';
		echo "<style>ul.subsubsub {margin: -3px 0 25px $left !important;}</style>"; 
	}
}