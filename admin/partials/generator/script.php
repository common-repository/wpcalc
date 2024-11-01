jQuery(document).ready(function($) {

<?php 
	ksort($param['item_order']);
	foreach ($param['item_order'] as $key => $i) {
		if($param['item_type'][$i] == 'input' && $param['input_validator'][$i] == 'text' && !empty($param['input_mask'][$i])){ ?>
		jQuery("#wow-form-id-<?php echo $val->id;?> [name='wow-forms-input-<?php echo $i;?>']").mask("<?php echo $param['input_mask'][$i]; ?>");
		<?php				
		}
		
	}
	
	if(count($param['calc']) > 1){
		echo 'calculate'.$val->id.'();';
	}
	
	?>
	
		
}); 

<?php if(count($param['calc']) > 1){ ?>

function calculate<?php echo $val->id;?> (){
	<?php 
		ksort($param['item_order']);
	foreach ($param['item_order'] as $key => $i) {
		if(!empty($param['calc'][$i])){
		
			if ($param['item_type'][$i] == 'input' || $param['item_type'][$i] == 'select') {			
			?>
			
		var field_<?php echo ($key+1);?> = jQuery("#wow-form-id-<?php echo $val->id;?> .field_<?php echo ($key+1);?>").val()*1;	
		<?php	
			}
			if ($param['item_type'][$i] == 'radio') { ?>
		var field_<?php echo ($key+1);?> = jQuery("#wow-form-id-<?php echo $val->id;?> [name='wow-forms-radio-<?php echo $i;?>']:checked").val()*1;	
			<?php
			}
			if ($param['item_type'][$i] == 'checkbox') { ?>
			
		var field_<?php echo ($key+1);?> = 0;	
		jQuery("#wow-form-id-<?php echo $val->id;?> .field_<?php echo ($key+1);?>:checked").each(function(){
		field_<?php echo ($key+1);?>+= jQuery(this).val()*1;
		});
			<?php
			}
			if ($param['item_type'][$i] == 'result') { 				
			?>
			var result<?php echo $i;?> = <?php echo $param['formula'][$i];?>;			
			jQuery("#wow-form-id-<?php echo $val->id;?> .wow-result-<?php echo $i;?>").val(result<?php echo $i;?>);
			jQuery("#wow-form-id-<?php echo $val->id;?> #text-result-<?php echo $i;?>").text(result<?php echo $i;?>);
			
			<?php
			}
			
		}
		}	?>
	
}
<?php } ?>

