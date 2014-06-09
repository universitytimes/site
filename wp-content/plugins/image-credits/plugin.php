<?php
/**
 * Plugin Name: Image Credits
 * Plugin URI: http://adamcap.com/code/add-image-credit-fields-for-attachments-in-wordpress/
 * Description: Adds source name and URL fields for media uploads along with a shortcode for displaying image credits.
 * Version: 1.1
 * Author: Adam Capriola
 * Author URI: http://adamcap.com/
 * License: GPLv2
 */

class AC_Image_Credits {

	var $instance;

	public function __construct() {
		$this->instance =& $this;
		add_action( 'init', array( $this, 'init' ) );
	}

	public function init() {

		// Translations
		load_plugin_textdomain( 'image-credits', false, basename( dirname( __FILE__ ) ) . '/lib/languages' );

		// Add source fields
		add_filter( 'attachment_fields_to_edit', array( $this, 'add_source_fields' ), 10, 2 );

		// Save source fields
		add_filter( 'attachment_fields_to_save', array( $this, 'save_source_fields' ), 10 , 2 );

		// Shortcode
		add_shortcode( 'image-credits', array( $this, 'image_credits_shortcode' ) );

	}

	/**
	 * Add fields for media source name + URL
	 *
	 * @link http://konstruktors.com/blog/wordpress/3203-how-to-automatically-add-image-credit-or-source-url-to-photo-captions-in-wordpress/
	 * @link http://www.billerickson.net/wordpress-add-custom-fields-media-gallery/
	 * 
	 */
	public function add_source_fields( $form_fields, $post ) {

		$form_fields['source_name'] = array(
			'label' => __( 'Source Name', 'image-credits' ),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, '_wp_attachment_source_name', true ),
			'helps' => __( 'Name of the image source', 'image-credits' )
		);

		$form_fields['source_url'] = array(
			'label' => __( 'Source URL', 'image-credits' ),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, '_wp_attachment_source_url', true ),
			'helps' => __( 'URL where the original image was found', 'image-credits' )
		);

		return $form_fields;

	}

	/**
	 * Save source fields
	 * 
	 */
	public function save_source_fields( $post, $attachment ) {

		if ( isset( $attachment['source_name'] ) ) {
			$source_name = get_post_meta( $post['ID'], '_wp_attachment_source_name', true );
			if ( $source_name != esc_attr( $attachment['source_name'] ) ) {
				if ( empty( $attachment['source_name'] ) )
					delete_post_meta( $post['ID'], '_wp_attachment_source_name' );
				else
					update_post_meta( $post['ID'], '_wp_attachment_source_name', esc_attr( $attachment['source_name'] ) );
			}
		}

		if ( isset( $attachment['source_url'] ) ) {
			$source_url = get_post_meta( $post['ID'], '_wp_attachment_source_url', true );
			if ( $source_url != esc_url( $attachment['source_url'] ) ) {
				if ( empty( $attachment['source_url'] ) )
					delete_post_meta( $post['ID'], '_wp_attachment_source_url' );
				else
					update_post_meta( $post['ID'], '_wp_attachment_source_url', esc_url( $attachment['source_url'] ) );
			}
		}

		return $post;

	}

	/**
	 * Get credits for all used images within an entry, including the featured image
	 * 
	 */
	public function get_image_credits( $seperator ) {

		global $post;

		// Need to define a couple variables as arrays before in_array usage to prevent errors
		$attachment_ids = array();
		$source_urls = array();

		// First check for post thumbnail and save its ID in an array
		if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $post->ID ) ) {

			$attachment_ids[] = get_post_thumbnail_id( $post->ID );

		}

		// Next look in post content and check for instances of wp-image-[digits]
		if ( preg_match_all( '/wp-image-[0-9]+/', $post->post_content, $matches ) ) {

			foreach ( $matches[0] as $id ) {

				// Then match the digits, aka the attachment IDs, and save those IDs in the array
				if ( preg_match( '/[0-9]+/', $id, $match ) ) {

					$id = $match[0];

					if ( in_array( $id, $attachment_ids ) )
						continue;

					$attachment_ids[] = $id;

				}

			}

		}

		// Now go through all our attachments IDs and generate credit URLs
		if ( !empty( $attachment_ids ) ) {

			foreach ( $attachment_ids as $key => $id ) {
				
				$source_name = esc_attr( get_post_meta( $id, '_wp_attachment_source_name', true ) );
				$source_url = esc_url( get_post_meta( $id, '_wp_attachment_source_url', true ) );

				// !in_array() part is to make sure we don't list the same source twice
				if ( !empty( $source_name ) && !empty( $source_url ) && !in_array( $source_url, $source_urls ) ) {

					// Separate credits
					if ( !empty( $i ) ) {

						// Default
						if ( empty( $seperator ) )
							$sep = ', ';
						// Defined
						else
							$sep = $seperator;

					}

					$out .= $sep . '<a href="' . $source_url . '">' . $source_name . '</a>';

					$i = true;
					$source_urls[] = $source_url;

				}

			}

		}

		return $out;

	}

	/**
	 * Image credits shortcode
	 * 
	 */
	public function image_credits_shortcode( $atts ) {

		$defaults = array(
			'sep' => ', ',
			'before' => __( 'Image Credits: ', 'image-credits' ),
			'after'  => '',
		);
		$atts = shortcode_atts( $defaults, $atts );

		$credits = $this->get_image_credits( trim( $atts['sep'] ) . ' ' );

		if ( empty( $credits ) ) return;

		$out = sprintf( '<span class="image-credits">%2$s%1$s%3$s</span>', $credits, $atts['before'], $atts['after'] );

		return $out;

	}

}

global $ac_image_credits;
$ac_image_credits = new AC_Image_Credits;