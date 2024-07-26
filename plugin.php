<?php
/**
 * Author URI:        https://functionsfile.com/
 * Author:            Functions File, Barry Ceelen
 * Description:       Display the current site ID in the WordPress admin bar on multisite networks.
 * Domain Path:       /languages
 * License:           GPLv3+
 * Plugin Name:       Admin Bar Site ID
 * Plugin URI:        https://github.com/functionsfile/admin-bar-site-id/
 * Text Domain:       functionsfile-admin-bar-site-id
 * Version:           1.0.0
 * Requires PHP:      5.3.0
 * Requires at least: 3.1.0
 * GitHub Plugin URI: functionsfile/admin-bar-site-id
 *
 * @package FunctionsFile\AdminBarSiteId
 */

namespace PluginPizza\AdminBarSiteId;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Maybe add an admin bar item that shows the current site ID.
add_action( 'admin_bar_menu', __NAMESPACE__ . '\maybe_add_admin_bar_item', 99 );

/**
 * Maybe add an admin bar item that shows the current site ID.
 *
 * @param WP_Admin_Bar $wp_admin_bar The WP_Admin_Bar instance, passed by reference.
 * @return void
 */
function maybe_add_admin_bar_item( $wp_admin_bar ) {

	if ( ! is_multisite() ) {
		return;
	}

	if ( ! current_user_can(
		/**
		 * Filters the capability required to add the admin bar menu item.
		 *
		 * @param string $capability The capability required to add the admin bar menu item, default "manage_options".
		 */
		apply_filters( 'functions_file_admin_bar_site_id_capability', 'manage_options' )
	) ) {
		return;
	}

	$current_blog_id = absint( get_current_blog_id() );

	$args = array(
		'id'    => 'functionsfile-admin-bar-site-id',
		'title' => sprintf(
			/* translators: %d: current blog ID */
			esc_html__( 'Site ID: %d', 'functionsfile-admin-bar-site-id' ),
			$current_blog_id
		),
	);

	if ( current_user_can( 'manage_sites' ) ) {

		$args['href'] = esc_url(
			admin_url( '/network/site-info.php?id=' . $current_blog_id )
		);
	}

	$wp_admin_bar->add_node( $args );
}
