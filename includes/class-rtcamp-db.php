<?php
/**
 * Database Handler Class
 * Manages custom table creation and $wpdb interactions.
 *
 * @package rtCamp_Training
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class RtCamp_Training_DB {

	/**
	 * Constructor: Registers activation hooks.
	 */
	public function __construct() {
		// We use the main plugin file path for the activation hook
		$main_plugin_file = dirname( __DIR__ ) . '/hello-rtcamp.php';
		register_activation_hook( $main_plugin_file, array( $this, 'create_log_table' ) );
	}

	/**
	 * Creates a custom table for storing training logs.
	 * Uses dbDelta() for safe schema updates.
	 */
	public function create_log_table() {
		global $wpdb;

		$table_name      = $wpdb->prefix . 'rtcamp_assignment_logs';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			log_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			activity_name tinytext NOT NULL,
			user_id mediumint(9) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}
}
