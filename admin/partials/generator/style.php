#wow-form-parent-<?php echo $val->id;?> {
	width: <?php if($param['form_width'] == ""){ echo "100"; } else{ echo $param['form_width'];} ?><?php if($param['form_width_par'] == "" || $param['form_width_par'] == "%"){echo "%"; } else{ echo "px";} ?>;
	<?php if(empty($param['form_align'] ) || $param['form_align'] == "left"){echo "margin: 0;"; }
	else if ($param['form_align'] == "center") {echo "margin:0 auto;";}else {echo "margin-left: auto;";} ?>	
}
#wow-form-id-<?php echo $val->id;?> { 	
	font-size: <?php if($param['font_size'] == ""){echo "16";}else{echo $param['font_size'];}?>px !important;
	padding: <?php if($param['form_padding_top'] == ""){echo "0";}else{echo $param['form_padding_top'];}?>px <?php if($param['form_padding_left'] == ""){echo "0";}else{echo $param['form_padding_left'];}?>px;
	background: <?php if($param['form_background_color'] == ""){echo "#eeeeee";}else{echo $param['form_background_color'];}?>; 
	margin: <?php if($param['form_margin_top'] == ""){echo "0";}else{echo $param['form_margin_top'];}?>px <?php if($param['form_margin_left'] == ""){echo "0";}else{echo $param['form_margin_left'];}?>px;
	border-radius: <?php if($param['form_border_radius'] == ""){echo "5";}else{echo $param['form_border_radius'];}?>px;
	border: <?php if(empty($param['form_border'])){echo "0";}else{echo $param['form_border'];}?>px solid <?php if(empty($param['form_border_color'])){echo "#ffffff";}else{echo $param['form_border_color'];}?>;
	 <?php if (!empty($param['background_img'])){?>
	 background-image: url(<?php echo $param['background_img'];?>);
	 background-size:cover;
	 <?php } ;?>
	overflow: auto
}
#wow-form-id-<?php echo $val->id;?> .title{
	font-size: <?php if($param['font_size_label'] == ""){echo "18";}else{echo $param['font_size_label'];}?>px;
	color: <?php if($param['font_color_label'] == ""){echo "#000";}else{echo $param['font_color_label'];}?>;
	display:block;
	text-align:<?php if($param['title_position'] == ""){echo "left";}else{echo $param['title_position'];}?>;
	
}

#wow-form-id-<?php echo $val->id;?> input[type=text],#wow-form-id-<?php echo $val->id;?> textarea, #wow-form-id-<?php echo $val->id;?> select{ 
	background: <?php if($param['field_background_color']  == ""){echo "#fcfcfc";}else{echo $param['field_background_color'];}?>; 
	border: <?php if($param['field_border']  == ""){echo "1";}else{echo $param['field_border'];}?>px solid <?php if($param['field_border_color']  == ""){echo "#cecece";}else{echo $param['field_border_color'];}?>; 
	 
	display: block; 
	font-size: <?php if($param['font_size']  == ""){echo "16";}else{echo $param['font_size'];}?>px; 
	color: <?php if($param['field_text_color']  == ""){echo "#555555";}else{echo $param['field_text_color'];}?>; 
	border-radius: <?php if($param['field_border_radius']  == ""){echo "0";}else{echo $param['field_border_radius'];}?>px; 
	-moz-border-radius: <?php if($param['field_border_radius']  == ""){echo "0";}else{echo $param['field_border_radius'];}?>px; 
	-o-border-radius: <?php if($param['field_border_radius']  == ""){echo "0";}else{echo $param['field_border_radius'];}?>px; 
	-webkit-border-radius: <?php if($param['field_border_radius']  == ""){echo "0";}else{echo $param['field_border_radius'];}?>px; 
	height:<?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	line-height: <?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	max-width: none; 
	width: 100%; 
	-moz-box-sizing: border-box; 
	box-sizing: border-box;	
	text-align:<?php if($param['text_position']  == ""){echo "left";}else{echo $param['text_position'];}?>;
}
#wow-form-id-<?php echo $val->id;?> select{
	padding-left:6px;
}
#wow-form-id-<?php echo $val->id;?> textarea{
	height:<?php if($param['height_textarea']  == ""){echo "72";}else{echo $param['height_textarea'];}?>px; 	
}
#wow-form-id-<?php echo $val->id;?> input[type=text], #wow-form-id-<?php echo $val->id;?> select{
	height:<?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	line-height: <?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px; 
}
#wow-form-id-<?php echo $val->id;?> input[type=text]::-webkit-input-placeholder,#wow-form-id-<?php echo $val->id;?> textarea::-webkit-input-placeholder {
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]:-moz-placeholder,#wow-form-id-<?php echo $val->id;?> textarea:-moz-placeholder { /* Firefox 18- */
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]::-moz-placeholder,#wow-form-id-<?php echo $val->id;?> textarea::-moz-placeholder {  /* Firefox 19+ */
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]:-ms-input-placeholder,.#wow-form-id-<?php echo $val->id;?> textarea:-ms-input-placeholder {
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type="checkbox"], #wow-form-id-<?php echo $val->id;?> input[type="radio"] {
	vertical-align: middle;
}

#wow-form-id-<?php echo $val->id;?> .wow-col {	
	position:relative;
	width: 100%;
	float: left;	
	min-height: 1px;	
	white-space: normal;
	
	
	}  
#wow-form-id-<?php echo $val->id;?> .wow-col-1, .wow-col-2, .wow-col-3, .wow-col-4, .wow-col-5, .wow-col-6, .wow-col-7, .wow-col-8, .wow-col-9, .wow-col-10, .wow-col-11, .wow-col-12 {
	float: left;
	white-space: normal;
	display: inline-block;
	vertical-align: middle;	
	box-sizing: initial;
	padding: <?php if(empty($param['content_top'])){echo "5";} else {echo $param['content_top'];} ?>px 1%;
	height: <?php if($param['field_height_par'] == 'auto'){echo "auto";} else {echo $param['field_height'].'px';} ?>;
	}    
#wow-form-id-<?php echo $val->id;?> .wow-col-12 {width: 98%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-11 {width: 89.66666666666666%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-10 {width: 81.33333333333334%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-9 {width: 73%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-8 {width: 64.66666666666666%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-7 {width: 56.333333333333336%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-6 {width: 48%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-5 {width: 39.66666666666667%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-4 {width: 31.33333333333333%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-3 {width: 23%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-2 {width: 14.666666666666664%;}
#wow-form-id-<?php echo $val->id;?> .wow-col-1 {width: 6.333333333333332%;}

<?php if(!empty($param['recaptcha'])){ ?>
.g-recaptcha{
transform:scale(<?php if(empty($param['scale'])){echo "0.77";} else {echo $param['scale'];} ?>);
-webkit-transform:scale(<?php if(empty($param['scale'])){echo "0.77";} else {echo $param['scale'];} ?>);
transform-origin:0 0;
-webkit-transform-origin:0 0;
}

<?php } ?>

@media only screen and (max-width: <?php if($param['screen_size']  == ""){echo "480";}else{echo $param['screen_size'];}?>px){
	#wow-form-parent-<?php echo $val->id;?> {
		width: <?php if(empty($param['mobile_width'])){echo "85"; } else{ echo $param['mobile_width'];} ?><?php if($param['mobile_width_par']  == "pr"){echo "%"; } else{ echo "px";} ?>;		
	}
	#wow-form-id-<?php echo $val->id;?> .wow-col-1, .wow-col-2, .wow-col-3, .wow-col-4, .wow-col-5, .wow-col-6, .wow-col-7, .wow-col-8, .wow-col-9, .wow-col-10, .wow-col-11, .wow-col-12 {
		width: 98%;
	}
}
