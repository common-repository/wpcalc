<?php if ( ! defined( 'ABSPATH' ) ) exit; 
$recid = $_REQUEST["id"];
$result = $wpdb->get_row("SELECT * FROM $data_mails WHERE id=$recid");   
    if ($result){
        $id = $result->id;
        $email = $result->email;
		$name = $result->name;
		$form = $result->form;		
		$param = unserialize($result->param);		
		$btn = __("Update", "wow-marketings");
        $hidval = 2;
    }


?>