<?php if ( ! defined( 'ABSPATH' ) ) exit; 

//* Add page in admin menu
add_action('admin_menu', 'wow_admin_menu_fp', 999);
function wow_admin_menu_fp() {
	add_menu_page(WOW_FP_NAME, __( WOW_FP_NAME, "wow-fp-lang"), 'manage_options', WOW_FP_BASENAME, 'wow_admin_fp', 'dashicons-feedback', null);
	
}

function wow_admin_fp() {
	global $wow_plugin;	
	$wow_plugin = true;	
	include_once( 'partials/main.php' );	
	wp_enqueue_script(WOW_FP_BASENAME, plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'));	
	wp_enqueue_style(WOW_FP_BASENAME.'-style', plugin_dir_url(__FILE__) . 'css/style.css');	
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('wp-color-picker');
	wp_enqueue_script( 'wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ));
}





//* Save all parametrs in the database
if ( ! function_exists ( 'wow_plugin_nonce_check' ) ) {
	
	add_action( 'plugins_loaded', 'wow_plugin_nonce_check' );	
	function wow_plugin_nonce_check() {
		if (isset($_POST['wow_plugin_nonce_field'])) {
			if ( !empty($_POST) && wp_verify_nonce($_POST['wow_plugin_nonce_field'],'wow_plugin_action') && current_user_can('manage_options')){
				wow_plugin_run_data();
			}
		}
	}
	function wow_plugin_run_data(){
		global $wpdb;
		$objItem = new WOW_DATA();
		$add = (isset($_REQUEST["add"])) ? sanitize_text_field($_REQUEST["add"]) : '';
		$data = (isset($_REQUEST["data"])) ? sanitize_text_field($_REQUEST["data"]) : '';
		$page = sanitize_text_field($_REQUEST["page"]);
		$id = absint($_POST['id']);
		$post = array();		
		if (isset($_POST["submit"])) {
			if (sanitize_text_field($_POST["add"]) == "1") {
				$objItem->addNewItem($data, $_POST);
				header("Location:admin.php?page=".$page."&info=saved");
				exit;
			} 
			else if (sanitize_text_field($_POST["add"]) == "2") {
				$objItem->updItem($data, $_POST);
				header("Location:admin.php?page=".$page."&tool=add&act=update&id=".$id."&info=update");
				exit;
			}
		}
	}
}
//* Footer text

if ( ! function_exists ( 'wow_plugins_admin_footer_text' ) ) {
	add_filter( 'admin_footer_text', 'wow_plugins_admin_footer_text' );
	function wow_plugins_admin_footer_text( $footer_text ) {
		global $wow_plugin;
		if ( $wow_plugin == true ) {
			$rate_text = sprintf( '<span id="footer-thankyou">Developed by <a href="http://wow-company.com/" target="_blank">Wow-Company</a> | <a href="https://wordpress.org/support/plugin/wpcalc" target="_blank">Support </a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a></span>');
			return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
		}
		else {
			return $footer_text;
		}
	}
}