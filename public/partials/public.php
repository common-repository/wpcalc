<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	
	$count_i = count($param['item_type']);
	
		
	$wowform = '';
	$wowform .= '<div id="wow-form-parent-'.$val->id.'"><form metod="post" id="wow-form-id-'.$val->id.'" onkeypress="if(event.keyCode == 13) return false;"><div id="wowformconfirm-'.$val->id.'" class="wow-col">';
	
	ksort($param['item_order']);
	foreach ($param['item_order'] as $key => $i) { 
		if(empty($param['width_col'][$i])){
			$col = "12"; 
		}
		else{
			$col = $param['width_col'][$i];
		}
		
		
		$wowform .= '<div class="wow-col-'.$col.'">';
		
		if (!empty($param['include_field_name'][$i])){
			$wowform .= '<div class="title">'.$param['name_item'][$i].'</div>';			
		}
		$wowform .= '<input type="hidden" name="wow-field-'.$i.'" value="'.$param['name_item'][$i].'">';
		if ($param['item_type'][$i] == 'input') {
			$required = (!empty($param['field_required'][$i])) ? 'wowrequired' : '';
			$calc = (!empty($param['calc'][$i])) ? 'onkeyup="calculate'.$val->id.'();"' : '';
			
			
			
			if ($param['input_validator'][$i] == 'number'){
				$wowform .= '<input class="wow-forms-'.$param['input_validator'][$i].' '.$required.' field_'.($key+1).'" type="text" name="wow-forms-input-'.$i.'" placeholder="'.$param['input_placeholder'][$i].'" value="'.$param['input_value'][$i].'" '.$calc.'>';
			}
			else {
				$wowform .= '<input class="wow-forms-'.$param['input_validator'][$i].' '.$required.' field_'.($key+1).'" type="text" name="wow-forms-input-'.$i.'" placeholder="'.$param['input_placeholder'][$i].'" '.$calc.'>';
			}
		}
		if ($param['item_type'][$i] == 'textarea') {
			if(!empty($param['field_required'][$i])){
				$required = 'wowrequired';
			}
			else {
				$required = '';
			}
			$wowform .= '<textarea name="wow-forms-textarea-'.$i.'" class="'.$required.'" placeholder="'.$param['input_placeholder'][$i].'"></textarea>';
		}
		if ($param['item_type'][$i] == 'select') {	
			$calc = (!empty($param['calc'][$i])) ? 'onchange="calculate'.$val->id.'();"' : '';
			$wowform .= '<select name="wow-forms-select-'.$i.'" class="field_'.($key+1).'" '.$calc.'>';
			$count_list = count($param['list_value'][$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (!empty($param['list_checkbox'][$i][$ii])){
						$wowform .= '<option selected value="'.$param['list_value'][$i][$ii].'">'.$param['list_text'][$i][$ii].'</option>';
					}
					else {
						$wowform .= '<option value="'.$param['list_value'][$i][$ii].'">'.$param['list_text'][$i][$ii].'</option>';
					}
					
					
				}
			}			  
			$wowform .= '</select>';
		}
		
		if ($param['item_type'][$i] == 'radio') {		
			$calc = (!empty($param['calc'][$i])) ? 'onchange="calculate'.$val->id.'();"' : '';
			$count_list = count($param['list_value'][$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (empty ($param['check_style'][$i])){
						$param['check_style'][$i] = 'colom';
					}
					if ($param['check_style'][$i] == 'colom'){
						$check_style = '<br/>';						
					}
					else {
						$check_style = '&emsp;';	
					}
					
					if (!empty($param['list_checkbox'][$i][$ii])){
						$wowform .= '<input checked="checked" class="field_'.($key+1).'" type="radio" value="'.$param['list_value'][$i][$ii].'" name="wow-forms-radio-'.$i.'" id="field-'.$i.'-'.$ii.'" '.$calc.'> <label for="field-'.$i.'-'.$ii.'">'.$param['list_text'][$i][$ii].'</label>'.$check_style;  
					}
					else {  
						$wowform .= '<input type="radio" class="field_'.($key+1).'" value="'.$param['list_value'][$i][$ii].'" name="wow-forms-radio-'.$i.'" id="field-'.$i.'-'.$ii.'" '.$calc.'> <label for="field-'.$i.'-'.$ii.'">'.$param['list_text'][$i][$ii].'</label>'.$check_style;
					}
				}
			}				  
		}
		
		if ($param['item_type'][$i] == 'checkbox') {		
			$calc = (!empty($param['calc'][$i])) ? 'onchange="calculate'.$val->id.'();"' : '';
			$count_list = count($param['list_value'][$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (empty ($param['check_style'][$i])){
						$param['check_style'][$i] = 'colom';
					}
					if ($param['check_style'][$i] == 'colom'){
						$check_style = '<br/>';						
					}
					else {
						$check_style = '&emsp;';	
					}
					
					if (!empty($param['list_checkbox'][$i][$ii])){
						$wowform .= '<input class="field_'.($key+1).' '.$calc.'" checked="checked" type="checkbox" value="'.$param['list_value'][$i][$ii].'" name="wow-forms-checkbox-'.$i.'-'.$ii.'" id="field-'.$i.'-'.$ii.'" '.$calc.'> <label for="field-'.$i.'-'.$ii.'">'.$param['list_text'][$i][$ii].'</label>'.$check_style;
					}						  
					else {
						$wowform .= '<input class="field_'.($key+1).' '.$calc.'" type="checkbox" value="'.$param['list_value'][$i][$ii].'" name="wow-forms-checkbox-'.$i.'-'.$ii.'" id="field-'.$i.'-'.$ii.'" '.$calc.'> <label for="field-'.$i.'-'.$ii.'">'.$param['list_text'][$i][$ii].'</label>'.$check_style;
					}
				}
			}				  
		}
		
		if ($param['item_type'][$i] == 'result') {
			$wowform .= str_replace('{result}', '<span id="text-result-'.$i.'"></span>', $param['result'][$i]);
			$wowform .= '<input class="wow-result-'.$i.'" type="hidden" name="wow-forms-result-'.$i.'" value="">';
		}
		
		$wowform .= '</div>';
		
	}
	$wowform .= '</div></form></div>';
	echo $wowform;	 
?>