<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	$act = (isset($_REQUEST["act"])) ? $_REQUEST["act"] : '';
	if ($act == "update") {
		$recid = $_REQUEST["id"];
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
		if ($result){
			$id = $result->id;
			$title = $result->title;
			$param = unserialize($result->param);
			$count_i = count($param['item_order']);
			$param['content_width_par'] = (!empty($param['content_width_par'])) ? $param['content_width_par'] : 'pr';
			$param['after_mail'] = (!empty($param['after_mail'])) ? $param['after_mail'] : '1';
			$param['captcha_them'] = (!empty($param['captcha_them'])) ? $param['captcha_them'] : 'light';
			$param['captcha_error'] = (!empty($param['captcha_error'])) ? $param['captcha_error'] : '<p style="text-align: center;"><span style="color: #ff0000;">Please retry CAPTCHA</span></p>';
			$param['error_notice'] = (!empty($param['error_notice'])) ? $param['error_notice'] : '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';
			$param['button_width_col'] = (!empty($param['button_width_col'])) ? $param['button_width_col'] : '12';
			$param['recaptcha_width_col'] = (!empty($param['recaptcha_width_col'])) ? $param['recaptcha_width_col'] : '12';
			$btn = __("Update", "marketing-wp");
			$hidval = 2;
		}
	}
	else if ($act == "duplicate") {
		$recid = $_REQUEST["id"];
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
		if ($result){
			$id = "";
			$title = "";
			$param = unserialize($result->param);
			$count_i = count($param['item_order']);
			$param['content_width_par'] = (!empty($param['content_width_par'])) ? $param['content_width_par'] : 'pr';
			$param['after_mail'] = (!empty($param['after_mail'])) ? $param['after_mail'] : '1';
			$param['captcha_them'] = (!empty($param['captcha_them'])) ? $param['captcha_them'] : 'light';
			$param['captcha_error'] = (!empty($param['captcha_error'])) ? $param['captcha_error'] : '<p style="text-align: center;"><span style="color: #ff0000;">Please retry CAPTCHA</span></p>';
			$param['error_notice'] = (!empty($param['error_notice'])) ? $param['error_notice'] : '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';
			$param['button_width_col'] = (!empty($param['button_width_col'])) ? $param['button_width_col'] : '12';
			$param['recaptcha_width_col'] = (!empty($param['recaptcha_width_col'])) ? $param['recaptcha_width_col'] : '12';
			$btn = __("Save", "marketing-wp");
			$hidval = 1;
		}
	}
	else {
		$btn = __("Save", "marketing-wp");
		$id = "";
		$title = "";
		$param['include_field_name'] = "";
		$param['field_name'] = "";
		$param['include_field_mail'] = "";
		$param['field_mail'] = "";
		$param['include_field_phone'] = "";
		$param['field_phone'] = "";
		$param['include_field_review'] = "";
		$param['field_review'] = "";
		$param['form_align'] = "";
		$param['form_width'] = "400";
		$param['form_padding_top'] = "0";
		$param['form_padding_bottom'] = "0";
		$param['form_padding_left'] = "0";
		$param['form_padding_right'] = "0";
		$param['field_border'] = "";
		$param['field_border_radius'] = "";
		$param['field_button'] = "";
		$param['button_size'] = "";
		$param['form_button_width'] = "";
		$param['button_width_par'] = "auto";
		$param['button_position'] = "";
		$param['form_background_color'] = "rgba(255,255,255,0)";
		$param['field_text_color'] = "";
		$param['field_placeholder_color'] = "";
		$param['field_border_color'] = "";
		$param['field_background_color'] = "";
		$param['button_text_color'] = "#ffffff";
		$param['button_background_color'] = "#e95645";
		$param['button_hover_color'] = "#d45041";
		$param['send_to_admin'] = "1";
		$param['send_to_user'] = "";
		$param['add_to_listing'] = "";	
		$param['mail_send_error_text'] = '';
		$param['mail_send_error_size'] = '';
		$param['mail_send_error_color'] = '';
		$param['mail_send_send_timer'] = '3';
		$param['mail_send_admin_mail'] = '';
		$param['mail_send_mail_subject'] = '';
		$param['confirmation'] = 'Thank you. We will contact you shortly.';	
		$param['form_margin_top'] = "10";
		$param['form_margin_bottom'] = "0";
		$param['form_margin_left'] = "0";
		$param['form_margin_right'] = "0";
		$param['usercontent'] = "";
		$param['mail_send_text'] = '<p style="text-align: center;"><span style="color: #000000;">Thank you</span></p>';
		$param['form_width_par'] = "px";
		$param['height_input'] = "";
		$param['height_textarea'] = "";
		$param['font_size'] = "";
		$param['close_modal'] = "";
		$param['wow_modal_id '] = "";
		$param['font_color_label'] = "#000";
		$param['font_size_label'] = "18";
		$param['screen_size'] = "";
		$param['mobile_width'] = "";
		$param['mobile_width_par'] = "px";
		$param['title_position'] = "";
		$param['text_position'] = "";
		$param['integration'] = "";
		$param['choosservice'] = "";
		$param['mailchimp_api'] = "";
		$param['mailchimp_list'] = "";
		$param['getresponse_api'] = "";
		$param['getresponse_list'] = "";
		$param['after_post_content'] = "";
		$param['check_style'][0] = "colom";
		$param['after_mail'] = '1';
		$param['captcha_them'] = 'light';
		$param['captcha_error'] = '<p style="text-align: center;"><span style="color: #ff0000;">Please retry CAPTCHA</span></p>';
		$param['error_notice'] = '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';		
		$param['button_width_col'] = '12';
		$param['recaptcha_width_col'] = '12';
		$count_i = 0;
		$hidval = 1;
	}
	
	$usersettings = array(
    'textarea_name' => 'param[usercontent]',
	'textarea_rows' => '10',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
	
	$confsettings = array(
    'textarea_name' => 'param[mail_send_text]',
	'textarea_rows' => '',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
	
	$captchatings = array(
    'textarea_name' => 'param[captcha_error]',
	'textarea_rows' => '',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
	
	$errorsetings = array(
    'textarea_name' => 'param[error_notice]',
	'textarea_rows' => '',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
?>