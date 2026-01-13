<?php
/**
 * Plugin Name: Hello rtCamp Training
 * Description: Modular training plugin demonstrating separation of concerns, DB handling, and standard hooks.
 * Version: 1.2.0
 * Author: Shivam Pawar
 * Text Domain: rtcamp-training
 *
 * @package rtCamp_Training
 */

// Security: Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants for paths.
define( 'RTCAMP_TRAINING_PATH', plugin_dir_path( __FILE__ ) );

// Load the modular files.
require_once RTCAMP_TRAINING_PATH . 'includes/class-rtcamp-db.php';
require_once RTCAMP_TRAINING_PATH . 'includes/class-rtcamp-core.php';

/**
 * Initialize the plugin modules.
 */
function rtcamp_training_init() {
	// Initialize Database Module
	new RtCamp_Training_DB();

	// Initialize Core Logic (Hooks & Filters)
	new RtCamp_Training_Core();
}
add_action( 'plugins_loaded', 'rtcamp_training_init' );
