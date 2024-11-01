<?php if ( ! defined( 'ABSPATH' ) ) exit; 

//* Form shortcode
add_shortcode('WPcalc', 'wow_shortcode_fp');
function wow_shortcode_fp($atts) {
    extract(shortcode_atts(array('id' => ""), $atts));		
    global $wpdb;
	$table = $wpdb->prefix . "wow_fp";
	$sSQL = $wpdb->prepare("select * from $table WHERE id = %d", $id);    
    $arrresult = $wpdb->get_results($sSQL); 
    if (count($arrresult) > 0) {
        foreach ($arrresult as $key => $val) {
			$param = unserialize($val->param);		
			ob_start();
			include( 'partials/public.php' );
			$form = ob_get_contents();
			ob_end_clean();			
			$path_style = WOW_FP_DIR.'/asset/css/style-'.$val->id.'.css';
			$path_script = WOW_FP_DIR.'/asset/js/script-'.$val->id.'.js';
			$file_style = WOW_FP_DIR.'/admin/partials/generator/style.php';		
			$file_script = WOW_FP_DIR.'/admin/partials/generator/script.php';
			if (file_exists($file_style) && !file_exists($path_style)){
				ob_start();
				include ($file_style);
				$content_style = ob_get_contents();
				ob_end_clean();
				file_put_contents($path_style, $content_style);
			}			
			if (file_exists($path_style)) {				
				wp_enqueue_style( WOW_FP_BASENAME.'-'.$val->id, WOW_FP_URL. 'asset/css/style-'.$val->id.'.css');
			}
			if (file_exists($file_script) && !file_exists($path_script)){
					ob_start();
					include ($file_script);
					$content_script = ob_get_contents();
					$packer = new JavaScriptPacker($content_script, 'Normal', true, false);
					$packed = $packer->pack();
					ob_end_clean();
					file_put_contents($path_script, $packed);				
				}				
				wp_enqueue_script( WOW_FP_BASENAME.'-'.$val->id, WOW_FP_URL. 'asset/js/script-'.$val->id.'.js', array( 'jquery' ) );	
			
        }
    } 
	else {		
		$form = "<p><strong>No Records</strong></p>";       
    }		
	return $form;
}

