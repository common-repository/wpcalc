<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$table = $wpdb->prefix . 'wow_fp';	
	$sql = "CREATE TABLE {$table} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title VARCHAR(200) NOT NULL,  
		param TEXT,  
		UNIQUE KEY id (id)
	) DEFAULT CHARSET=utf8;";
	dbDelta($sql);		
