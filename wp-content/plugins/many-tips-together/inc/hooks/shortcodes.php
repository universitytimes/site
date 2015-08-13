<?php
/**
 * Shortcodes hooks
 *
 * @package    ManyTipsTogether
 * @subpackage B5F_MTT_Admin
 */

class MTT_Hook_Shortcodes
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

		if( !empty( $this->params['shortcodes_everywhere'] ) )
			$this->enable_shortcodes_everywhere();

		if( !empty( $this->params['shortcodes_tube'] ) )
			add_shortcode( 'poptube', array( $this, 'youtube' ) );

		if( !empty( $this->params['shortcodes_gdocs'] ) )
			add_shortcode( 'gdocs', array( $this, 'googledocs' ) );
	}


	/**
	 * Enable Shortcodes everywhere.
	 *
	 * Found in: https://github.com/toscho/WordPress-Shortcodes/
	 * For Details
	 * @see http://sillybean.net/?p=2719
	 * of Stephanie C. Leary.
	 *
	 * @return void
	 */
	public function enable_shortcodes_everywhere()
	{
		foreach(
		array(
			'the_excerpt'
			, 'widget_text'
			, 'term_description'
			, 'the_content'
		)
		as $filter )
		{
			add_filter( $filter, 'shortcode_unautop' );
			add_filter( $filter, 'do_shortcode', 11 );
		}

		return;
	}


	/**
	 * Youtube
	 * 
	 * @param type $atts
	 * @param type $content
	 * @return type
	 */
	public function youtube( $atts, $content = null )
	{
		$atts = array_map( 'html_entity_decode', $atts );

		//$teste = get_page_by_path($atts['id'],'OBJECT','post');
		$img	 = "http://i3.ytimg.com/vi/{$atts['id']}/default.jpg";
		$yt		 = "http://www.youtube.com/watch_popup?v={$atts['id']}";
		$color	 = ($atts['color'] && $atts['color'] != '') ? ';color:' . $atts['color'] : '';
		$html	 = <<<HTML
    <div class="mtt-poptube" style="text-align:center;">
    <h2 class="mtt-poptube" style="text-shadow:none;padding:0px{$color}">{$atts['title']}</h2>
    <a href="{$yt}" target="_blank"><img class="mtt-poptube" src="{$img}" style="margin-bottom:-19px"/></a><br />
    <a class="mtt-poptube button-secondary" href="{$yt}" target="_blank">{$atts['button']}</a></div>
HTML;
		return $html;
	}


	/**
	 * Google document preview
	 * 
	 * @param type $atts
	 * @param type $content
	 * @return type
	 */
	public function googledocs( $atts, $content )
	{
		extract( shortcode_atts( array(
					"class"	 => '',
					"url"	 => ''
						), $atts ) );

		$class = ($class) ? $class : 'google-docs-viewer';
		return '<a class="'
				. $class
				. '" href="http://docs.google.com/viewer?url='
				. $url
				. '" target="_blank">'
				. $content
				. '</a>';
	}

}