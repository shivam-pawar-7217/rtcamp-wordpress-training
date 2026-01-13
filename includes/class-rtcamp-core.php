<?php
/**
 * Core Logic Class
 * Handles basic hooks and filters for the training plugin.
 *
 * @package rtCamp_Training
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class RtCamp_Training_Core {

	/**
	 * Constructor: Hooks into WordPress.
	 */
	public function __construct() {
		// Action: Add footer signature
		add_action( 'wp_footer', array( $this, 'render_footer_signature' ) );

		// Filter: Modify post titles
		add_filter( 'the_title', array( $this, 'modify_post_title' ) );
	}

	/**
	 * Renders a training signature in the site footer.
	 */
	public function render_footer_signature() {
		if ( ! is_admin() ) {
			echo '<div style="text-align: center; font-size: 12px; color: #666;">';
			echo '<p>🚀 rtCamp Training Module Active</p>';
			echo '</div>';
		}
	}

	/**
	 * Appends a training tag to post titles.
	 *
	 * @param string $title The original title.
	 * @return string The modified title.
	 */
	public function modify_post_title( $title ) {
		if ( in_the_loop() && is_main_query() ) {
			return $title . ' [Training-Mode]';
		}
		return $title;
	}
}
