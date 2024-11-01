<?php
/**
 * Plugin Name:       WPcalc
 * Plugin URI:        https://wordpress.org/plugins/wpcalc/
 * Description:       Easily creating custom calculators
 * Version:           2.1
 * Author:            Wow-Company
 * Author URI:        http://wow-company.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wow-fp-lang
  */
  if ( ! defined( 'WPINC' ) ) {die;}


if ( ! defined( 'WOW_FP_NAME' ) ) {	
	define( 'WOW_FP_NAME', 'WPcalc' );
	define( 'WOW_FP_VERSION', '2.1' );
	define( 'WOW_FP_BASENAME', dirname(plugin_basename(__FILE__)) );
	define( 'WOW_FP_DIR', plugin_dir_path( __FILE__ ) );
	define( 'WOW_FP_URL', plugin_dir_url( __FILE__ ) );
	
}

// Activate-Diactivate plugin
function wow_plugin_activate_fp() {
	require_once plugin_dir_path( __FILE__ ) . 'include/activator.php';	
}	
register_activation_hook( __FILE__, 'wow_plugin_activate_fp' );

function wow_plugin_deactivate_fp() {	
	require_once plugin_dir_path( __FILE__ ) . 'include/deactivator.php';
}
register_deactivation_hook( __FILE__, 'wow_plugin_deactivate_fp' );



// Include class for plugin
if( !class_exists( 'JavaScriptPacker' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/class/packer.php';
}

if( !class_exists( 'WOW_DATA' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/class/data.php';
}

require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';

require_once plugin_dir_path( __FILE__ ) . 'public/public.php';



add_filter( 'plugin_row_meta', 'wow_row_meta_fp', 10, 4 );
function wow_row_meta_fp( $meta, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $meta;

	$meta[] = '<a href="https://wordpress.org/support/plugin/wpcalc" target="_blank">Support </a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a>';
	return $meta;
}

add_filter( 'plugin_action_links', 'wow_action_links_fp', 10, 2 );
function wow_action_links_fp( $actions, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $actions;

	$settings_link = '<a href="admin.php?page='. WOW_FP_BASENAME .'">Settings</a>'; 
	array_unshift( $actions, $settings_link ); 
	return $actions; 
}

add_filter( 'admin_init', 'wow_asset_folder_fp');
function wow_asset_folder_fp(){
	$path = plugin_dir_path( __FILE__ ).'asset';
	if (!is_writable($path)) {
		echo "<div class='error' id='message'><p>".__("Please set the 775 access rights (chmod 775) for the '".$path."' folder.", "wow-fp-lang")."</p> </div>";
	} 
}