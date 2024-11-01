jQuery(document).ready(function($) {
	//* Vertical table
	$('.tab-nav li:first').addClass('select'); 
	$('.tab-panels>div').hide().filter(':first').show();    
	$('.tab-nav a').click(function(){
		$('.tab-panels>div').hide().filter(this.hash).show(); 
		$('.tab-nav li').removeClass('select');
		$(this).parent().addClass('select');
		return (false); 
	})
	
	$('.item-title').children('.toggle').click(function(){ 		
		var par = $(this).closest('.items');
		$(par).children(".inside").toggle();
		if($(this).hasClass('togglehide')){
			$(this).removeClass('togglehide');
			$(this).addClass( "toggleshow" );
			$(this).attr('title', 'Show');
		}
		else {
			$(this).removeClass('toggleshow');
			$(this).addClass( "togglehide" );
			$(this).attr('title', 'Hide');
			}

	});
	
	//* Include colorpicker
	$('.wp-color-picker-field').wpColorPicker();
	
	$( "#sortable" ).sortable().disableSelection();
	
	$('form').submit(function () {		
		var counttitle = jQuery(".titltform").length;
		error = 0;
		var i;			
		for (i = 0; i <= counttitle; i++) {
			var title = jQuery('.titltform:eq('+i+')').val();
			if (title != ""){
				jQuery('.titltform:eq('+i+')').removeAttr('style');
				jQuery('.fieldtitle'+i).remove();
				
			}
			if (title == ""){
				jQuery('body,html').animate({scrollTop: jQuery('.titltform:eq('+i+')').offset().top - 100}, 500);
				jQuery('.titltform:eq('+i+')').css({"border-color": "#e54c3a"});
				jQuery('.titltform:eq('+i+')').focus();
				$('.titltform:eq('+i+')').after("<br><span class='err fieldtitle"+i+"'>Please Enter Title</span>");
				error=1;
			}
			
		}	
		if(error==0){
			return true;
		}
		else{
            
            return false; 
		}
		
		
	});
	
	if ($('input[name="param[field_height_par]"]:checked').val() == "auto"){
		$('[name="param[field_height]"]').val('');
		$('[name="param[field_height]"]').attr('placeholder', 'auto');
		$('[name="param[field_height]"]').attr("disabled", "disabled");
	}
	$('[name="param[field_height_par]"]').click(function(){		
		var height_par = $('input[name="param[field_height_par]"]:checked').val();		
		if (height_par == 'auto'){
			$('[name="param[field_height]"]').val('');
			$('[name="param[field_height]"]').attr('placeholder', 'auto');
			$('[name="param[field_height]"]').attr("disabled", "disabled");			
		}
		else {
			$('[name="param[field_height]"]').val('0');
			$('[name="param[field_height]"]').removeAttr("disabled");
		}
	});
	
	var max = 0,
    cv = 0;
	$('[name="param[item_order][]"]').each(function(){
		cv = $(this).val() * 1;
		max = max < cv ? cv : max;
	});	
	
	var i = 0;	
	while (i <= max) {
		changetype(i);
		masked(i);
		i++;
	}
	
	jQuery('body').on('click', '.value_text_remove',  function() {
		$(this).closest('.wow-admin-col').remove();
	});
	
	jQuery('body').on('click', '.handlediv', function() {
		$(this).closest('.itembox').remove();
	});
	
	mailtoadmin();
	mailtouser();
	autoclose();
	insertservise();
	chooseservice();
	closeconfirmation();
	typeconfirmation();
	recaptcha();
	
	
});
function mailtouser(){
	if (jQuery('[name="param[send_to_user]"]').is(':checked')){
		jQuery('#mail_to_user').css('display', '');
	}
	else {
		jQuery('#mail_to_user').css('display', 'none');
	}
}
function mailtoadmin(){
	if (jQuery('[name="param[send_to_admin]"]').is(':checked')){
		jQuery('.sendtoadmin').css('display', '');
	}
	else {
		jQuery('.sendtoadmin').css('display', 'none');
	}
}
function recaptcha(){
	if (jQuery('[name="param[recaptcha]"]').is(':checked')){
		jQuery('.recaptcha').css('display', '');
	}
	else {
		jQuery('.recaptcha').css('display', 'none');
	}
}
function autoclose(){
	if (jQuery('[name="param[close_modal]"]').is(':checked')){
		jQuery('#modal_block').css('display', '');
	}
	else {
		jQuery('#modal_block').css('display', 'none');
	}
}
function insertservise(){
	if (jQuery('[name="param[integration]"]').is(':checked')){
		jQuery('#integration').css('display', '');
	}
	else {
		jQuery('#integration').css('display', 'none');
	}
}

function masked(count){
	var mask = jQuery('[name="param[input_validator]['+count+']"]').val();
	var type = jQuery('[name="param[item_type]['+count+']"]').val();
	
	if (mask == 'text' && type == 'input' ){
		jQuery('#input_mask_'+count).css('display', '');
		jQuery('#input_number_'+count).css('display', 'none');
	}
	else if (mask == 'number' && type == 'input' ){
		jQuery('#input_mask_'+count).css('display', 'none');
		jQuery('#input_number_'+count).css('display', '');
	}	
	else {
		jQuery('#input_mask_'+count).css('display', 'none');
		jQuery('#input_number_'+count).css('display', 'none');
		
	}
}

function chooseservice(){
	var service = jQuery('[name="param[choosservice]"]').val();		
	if (service == 'mailchimp'){		
		jQuery('.mailchimp').css('display', '');
		jQuery('.getresponse').css('display', 'none');
		jQuery('#registr').html('<a href="https://mailchimp.com/" target="_blank">Register now</a>');
	}
	if (service == 'getresponse'){
		jQuery('.mailchimp').css('display', 'none');
		jQuery('.getresponse').css('display', '');
		jQuery('#registr').html('<a href="http://www.getresponse.com/" target="_blank">Register now</a>');
		
	}
}

function changetype(count){
	var type = jQuery('[name="param[item_type]['+count+']"]').val();	
	if (type == 'input'){
		jQuery('#block_input_'+count).css('display', 'block');		
		jQuery('#block_noinput_'+count).css('display', 'none');	
		jQuery('[name="param[input_validator]['+count+']"]').removeAttr( "disabled");
		jQuery('#check_'+count).css('display', 'none');
		jQuery('#block_result_'+count).css('display', 'none');
		jQuery('#block_calculate_'+count).css('display', 'none');
		masked(count);
		return;
	}
	else if (type == 'textarea'){
		jQuery('#block_input_'+count).css('display', 'block');		
		jQuery('#block_noinput_'+count).css('display', 'none');	
		jQuery('[name="param[input_validator]['+count+']"]').attr( "disabled", "disabled");
		jQuery('#check_'+count).css('display', 'none');
		jQuery('#block_result_'+count).css('display', 'none');
		jQuery('#block_calculate_'+count).css('display', 'none');
		masked(count);
		return;
	}
	if (type == 'radio' || type == 'checkbox'){ 
		jQuery('#check_'+count).css('display', 'block');
		jQuery('#block_input_'+count).css('display', 'none');		
		jQuery('#block_noinput_'+count).css('display', 'block');
		jQuery('#block_result_'+count).css('display', 'none');
		jQuery('#block_calculate_'+count).css('display', 'none');
		return;
		
	}
	if (type == 'select'){
		jQuery('#block_input_'+count).css('display', 'none');		
		jQuery('#block_noinput_'+count).css('display', 'block');
		jQuery('#check_'+count).css('display', 'none');
		jQuery('#block_result_'+count).css('display', 'none');
		jQuery('#block_calculate_'+count).css('display', 'none');
	}
	if (type == 'result'){
		jQuery('#block_input_'+count).css('display', 'none');		
		jQuery('#block_noinput_'+count).css('display', 'none');
		jQuery('#check_'+count).css('display', 'none');
		jQuery('#block_result_'+count).css('display', 'block');
		jQuery('#block_calculate_'+count).css('display', 'none');
	}
	if (type == 'calculate'){
		jQuery('#block_input_'+count).css('display', 'none');		
		jQuery('#block_noinput_'+count).css('display', 'none');
		jQuery('#check_'+count).css('display', 'none');
		jQuery('#block_result_'+count).css('display', 'none');
		jQuery('#block_calculate_'+count).css('display', '');
	}
	
}
function closeconfirmation(){
	if (jQuery('[name="param[close_confirmation]"]').is(':checked')){
		jQuery('#closeconfirmation').css('display', '');
	}
	else {
		jQuery('#closeconfirmation').css('display', 'none');
	}
}

function typeconfirmation(){
	var type = jQuery('[name="param[after_mail]"]:checked').val();	
	if (type == 1){
		jQuery('.confirmationtext').css('display', '');
		jQuery('.redirect').css('display', 'none');
	}
	else {
		jQuery('.confirmationtext').css('display', 'none');
		jQuery('.redirect').css('display', '');
	}
	
}

function newlist(count) {	
	var type = jQuery('[name="param[item_type]['+count+']"]').val();
	jQuery('#value_text_'+count).append('<div class="wow-admin-col"><div class="wow-admin-col-4"><input type="text" name="param[list_value]['+count+'][]" value="" /> </div> <div class="wow-admin-col-4"><input type="text" name="param[list_text]['+count+'][]" value="" /></div> <div class="wow-admin-col-3"><input type="checkbox" name="param[list_checkbox]['+count+'][]" value="1" /></div> <div class="wow-admin-col-1 value_text_remove"></div></div>');
}

function itemadd(){   
	var max = 0,
    cv = 0;
	jQuery('[name^="param[item_order]"]').each(function(){
		cv = jQuery(this).val() * 1;
		max = max < cv ? cv : max;
	});	
	var icount = max*1+1;  
	var nexticount = jQuery('.icount').length*1+1;  
jQuery("#sortable").append('<div class="items-'+nexticount+' itembox"><div class="item-title"> <h3>Field <span class="icount">'+nexticount+'</span></h3><input type="hidden" name="param[item_order][]" value="'+icount+'"><div class="handlediv"></div><div class="toggle togglehide" title="Hide"></div></div><div class="inside" style="display: block;"> <div class="wow-admin-col"> <div class="wow-admin-col-4">Title<span class="err">*</span>: show <input name="param[include_field_name]['+icount+']" type="checkbox" value="1"> <br/> <input  placeholder="Title/Required" type="text" name="param[name_item]['+icount+']" value="" class="titltform"/> </div> <div class="wow-admin-col-4">Item type: <input name="param[calc]['+icount+']" type="hidden" value="1"><br/> <select name="param[item_type]['+icount+']" onchange="changetype('+icount+');"> <option value="input">Input</option><option value="select">Select</option> <option value="radio">Radio</option> <option value="checkbox">Checkbox</option> <option value="result">Result</option> </select> </div> <div class="wow-admin-col-4">Field width <br/> <select name="param[width_col]['+icount+']"> <option value="12">12/12</option> <option value="11">11/12</option> <option value="10">10/12</option> <option value="9">9/12</option> <option value="8" >8/12</option> <option value="7" >7/12</option> <option value="6" >6/12</option> <option value="5" >5/12</option> <option value="4" >4/12</option> <option value="3" >3/12</option> <option value="2" >2/12</option> <option value="1" >1/12</option> </select></div> </div> <div class="wow-admin-col" id="block_input_'+icount+'"> <div class="wow-admin-col-4">Validation:<br/> <select name="param[input_validator]['+icount+']" onchange="masked('+icount+');"><option value="number">Number</option></select> </div> <div class="wow-admin-col-4">Placeholder:<br/> <input type="text" name="param[input_placeholder]['+icount+']" value="" /> </div> <div class="wow-admin-col-4" id="input_number_'+icount+'">Value:<br/><input type="text" name="param[input_value]['+icount+']" value="" /></div> <div class="wow-admin-col-4"></div> </div> <div class="wow-admin-col" id="block_noinput_'+icount+'"> <div class="wow-admin-col-4">Value:</div> <div class="wow-admin-col-4">Text:</div> <div class="wow-admin-col-3">Selected:</div> <div class="wow-admin-col-1"></div>  <div id="value_text_'+icount+'"> <div class="wow-admin-col"> <div class="wow-admin-col-4"> <input type="text" name="param[list_value]['+icount+'][]" value="" /> </div> <div class="wow-admin-col-4"> <input type="text" name="param[list_text]['+icount+'][]" value="" /> </div> <div class="wow-admin-col-3"> <input type="checkbox" name="param[list_checkbox]['+icount+'][]" value="1"/> </div> <div class="wow-admin-col-1"></div> </div>  </div> <div class="wow-admin-col"> <div class="wow-admin-col-4"><a href="javascript:void(0);" onclick="newlist('+icount+');">Add new value</a></div> <div class="wpcalc-admin-col-4" id="check_'+icount+'"> <input name="param[check_style]['+icount+']" type="radio" value="colom" checked="checked"> Colom <input name="param[check_style]['+icount+']" type="radio" value="inline"> Inline </div>  </div> </div> <div id="block_result_'+icount+'"><div class="wow-admin-col"><div class="wow-admin-col-12">Formula:<br/><textarea name="param[formula]['+icount+']" class="input-12"/></textarea></div>  <div class="wow-admin-col-12">Result:<br/><textarea name="param[result]['+icount+']" class="input-12"></textarea><br/>Use <b>{result}</b> for display the calculated result</div>  </div></div>  </div></div>');
	changetype(icount);
	
}

