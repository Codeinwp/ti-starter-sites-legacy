<?php
/**
 * Plugin Name:       Themeisle Starter Sites Legacy
 * Description:       Allow template patterns collection to show legacy starter sites for Neve
 * Version:           1.0.0
 * Author:            Themeisle
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Activation function for the plugin.
 * We remove the TPC transient so that a new call to the API is triggered.
 */
function ti_starter_sites_legacy_plugin_clear_transient() {
	delete_transient( 'tiob_sites' );
}
register_activation_hook( __FILE__, 'ti_starter_sites_legacy_plugin_clear_transient' );
register_deactivation_hook( __FILE__, 'ti_starter_sites_legacy_plugin_clear_transient' );

/**
 * @param array $query_args A list of query arguments for the API request.
 *
 * @return array
 */
function ti_api_request_show_legacy( $query_args ) {
	$query_args['show-legacy-sites'] = true;
	return $query_args;
}

add_filter( 'tpc_starter_api_query_filter', 'ti_api_request_show_legacy', 10, 1 );