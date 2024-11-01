<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include ('include/data.php'); ?>

<form action="admin.php?page=<?php echo WOW_FP_BASENAME;?>" method="post">
	<div class="wowcolom">	
		<div id="wow-leftcol">			
			<div class="wow-admin">			
				<input placeholder="Name is used only for admin purposes" type='text' name='title' value="<?php echo $title; ?>" class="input-100 wow-title"/>
			</div>		
			
			<div class="tab-box ">
				
				<ul class="tab-nav">
					
					<li><a href="#t1"><span class="dashicons dashicons-feedback"></span> <?php esc_attr_e("Form", "wow-fp-lang") ?></a></li>
					<li><a href="#t2"><span class="dashicons dashicons-admin-appearance"></span> <?php esc_attr_e("Style", "wow-fp-lang") ?></a></li>					
				</ul>
				<div class="tab-panels wow-admin">
					
					<div id="t1" class="tab-content">
						<div id="sortable">							
							<?php if ($count_i > 0){
								ksort($param['item_order']);
								foreach ($param['item_order'] as $key => $i) { ?>							
								<div class="items itembox">									
									<div class="item-title">
										<h3><?php esc_attr_e("Field", "wow-marketings") ?> <span class="icount"><?php echo $key+1;?></span></h3>
										<input type="hidden" name="param[item_order][]" value="<?php echo $i;?>">
										<div class="handlediv" title="Delete"></div>
										<div class="toggle togglehide" title="Hide"></div>
									</div>
									
									<div class="inside" style="display: block;">
										<div class="wow-admin-col">									
											<div class="wow-admin-col-4">
												<?php esc_attr_e("Title", "wow-marketings") ?><span class="err">*</span>: <?php esc_attr_e("show", "wow-fp-lang") ?> 
												<input name="param[include_field_name][<?php echo $i;?>]" type="checkbox" value="1" <?php if(!empty($param['include_field_name'][$i])) { echo 'checked="checked"'; } ?> > <br/>
												<input  placeholder="Title/Required" type='text' name="param[name_item][<?php echo $i;?>]" value="<?php echo $param['name_item'][$i]; ?>" class="titltform"/>
											</div>
											
											<div class="wow-admin-col-4">
												<?php esc_attr_e("Item type", "wow-fp-lang") ?>: <input name="param[calc][<?php echo $i;?>]" type="hidden" value="1"><br/>
												<select name="param[item_type][<?php echo $i;?>]" onchange="changetype(<?php echo $i;?>);">
													<option value="input" <?php if($param['item_type'][$i]=='input') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Input", "wow-fp-lang") ?></option>													
													<option value="select" <?php if($param['item_type'][$i]=='select') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Select", "wow-fp-lang") ?></option>
													<option value="radio" <?php if($param['item_type'][$i]=='radio') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Radio", "wow-fp-lang") ?></option>
													<option value="checkbox" <?php if($param['item_type'][$i]=='checkbox') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Checkbox", "wow-fp-lang") ?></option>	
													<option value="result" <?php if($param['item_type'][$i]=='result') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Result", "wow-fp-lang") ?></option>													
												</select>
											</div>
											
											<div class="wow-admin-col-4">
												<?php esc_attr_e("Field width", "wow-fp-lang") ?>:<br/>
												<select name="param[width_col][<?php echo $i;?>]">														
													<option value="12" <?php if($param['width_col'][$i]=='12') { echo 'selected="selected"'; } ?>>12/12</option>
													<option value="11" <?php if($param['width_col'][$i]=='11') { echo 'selected="selected"'; } ?>>11/12</option>
													<option value="10" <?php if($param['width_col'][$i]=='10') { echo 'selected="selected"'; } ?>>10/12</option>
													<option value="9" <?php if($param['width_col'][$i]=='9') { echo 'selected="selected"'; } ?>>9/12</option>
													<option value="8" <?php if($param['width_col'][$i]=='8') { echo 'selected="selected"'; } ?>>8/12</option>
													<option value="7" <?php if($param['width_col'][$i]=='7') { echo 'selected="selected"'; } ?>>7/12</option>
													<option value="6" <?php if($param['width_col'][$i]=='6') { echo 'selected="selected"'; } ?>>6/12</option>
													<option value="5" <?php if($param['width_col'][$i]=='5') { echo 'selected="selected"'; } ?>>5/12</option>
													<option value="4" <?php if($param['width_col'][$i]=='4') { echo 'selected="selected"'; } ?>>4/12</option>
													<option value="3" <?php if($param['width_col'][$i]=='3') { echo 'selected="selected"'; } ?>>3/12</option>
													<option value="2" <?php if($param['width_col'][$i]=='2') { echo 'selected="selected"'; } ?>>2/12</option>
													<option value="1" <?php if($param['width_col'][$i]=='1') { echo 'selected="selected"'; } ?>>1/12</option>													
												</select>
											</div>
											
											
										</div>
										
										<div class="wow-admin-col" id="block_input_<?php echo $i;?>">
											<div class="wow-admin-col-4"><?php esc_attr_e("Validation", "wow-fp-lang") ?>:<br/>
												<select name="param[input_validator][<?php echo $i;?>]" onchange="masked(<?php echo $i;?>);"> 
													<?php $input_validator = (!empty($param['input_validator'][$i])) ? $param['input_validator'][$i] : 'text' ?>													
													<option value="number" <?php if($input_validator=='number') { echo 'selected="selected"'; } ?>><?php esc_attr_e("Number", "wow-fp-lang") ?></option>																									
												</select>
											</div>	
											
											<div class="wow-admin-col-4">
												<?php esc_attr_e("Placeholder", "wow-fp-lang") ?>:<br/>
												<input type='text' name="param[input_placeholder][<?php echo $i;?>]" value="<?php echo $param['input_placeholder'][$i]; ?>" />
											</div>
											
											<div class="wow-admin-col-4" id="input_number_<?php echo $i;?>">
												<?php esc_attr_e("Value", "wow-fp-lang") ?>:<br/>
												<input type='text' name="param[input_value][<?php echo $i;?>]" value="<?php if(!empty($param['input_value'][$i])) echo $param['input_value'][$i]; ?>" />
											</div>											
											
										</div>
										
										<div id="block_noinput_<?php echo $i;?>">
											
											<div class="wow-admin-col">
												
												<div class="wow-admin-col-4">
													<?php esc_attr_e("Value", "wow-fp-lang") ?>:
												</div>
												
												<div class="wow-admin-col-4">
													<?php esc_attr_e("Text", "wow-fp-lang") ?>:
												</div>
												
												<div class="wow-admin-col-3">
													<?php esc_attr_e("Selected", "wow-fp-lang") ?>:
												</div>
												
												<div class="wow-admin-col-1"></div>
											</div>
											
											<div id="value_text_<?php echo $i;?>">							
												<?php 
													$count_list = count($param['list_value'][$i]);
													if ($count_list > 0) {
														for ($ii = 0; $ii < $count_list; $ii++) { ?>
														
														<div class="wow-admin-col">
															
															<div class="wow-admin-col-4">
																<input type='text' name="param[list_value][<?php echo $i;?>][<?php echo $ii;?>]" value="<?php echo $param['list_value'][$i][$ii]; ?>" />
															</div>
															
															<div class="wow-admin-col-4">
																<input type='text' name="param[list_text][<?php echo $i;?>][<?php echo $ii;?>]" value="<?php echo $param['list_text'][$i][$ii]; ?>" />
															</div>
															
															<div class="wow-admin-col-3">
																<input type='checkbox' name="param[list_checkbox][<?php echo $i;?>][<?php echo $ii;?>]" value="1" <?php if(!empty($param['list_checkbox'][$i][$ii])) { echo 'checked="checked"'; } ?>/>
															</div>
															
															<div class="wow-admin-col-1 value_text_remove">
																
															</div>
															
														</div> 
														<?php 
														}	
													} 
												?>							
											</div>
											<div class="wow-admin-col">
												<div class="wow-admin-col-4">
													<a href="javascript:void(0);" onclick="newlist(<?php echo $i;?>);"><?php esc_attr_e("Add new value", "wow-fp-lang") ?></a>
												</div>
												<div class="wpcalc-admin-col-4" id="check_<?php echo $i;?>">
													<?php if (empty($param['check_style'][$i])){ $param['check_style'][$i] = 'colom';} ?>
													<input name="param[check_style][<?php echo $i;?>]" type="radio" value="colom" <?php if($param['check_style'][$i]=='colom') { echo 'checked="checked"'; } ?>> Colom <input name="param[check_style][<?php echo $i;?>]" type="radio" value="inline" <?php if($param['check_style'][$i]=='inline') { echo 'checked="checked"'; } ?>> Inline
												</div>
											</div>
										</div>
										<div id="block_result_<?php echo $i;?>">
											<div class="wow-admin-col">
												<div class="wow-admin-col-12">
													<?php esc_attr_e("Formula", "wow-fp-lang") ?>:<br/>
													<textarea name="param[formula][<?php echo $i;?>]" class="input-12"><?php if (!empty($param['formula'][$i])) echo $param['formula'][$i]; ?></textarea>													
												</div>
												<div class="wow-admin-col-12">
													<b><?php esc_attr_e("Result", "wow-fp-lang") ?></b>:<br/>
													<?php $result = (!empty($param['result'][$i])) ? $param['result'][$i] : '';?>
													<?php echo wp_editor($result, 'result_'.$i, array('textarea_name' => 'param[result]['.$i.']',)); ?><br/>Use <b>{result}</b> for display the calculated result
												</div>
											</div>
										</div>										
									</div>
									</div>
									<?php	
									} 
								} ?>
								
							</div>
							<div class="submit-bottom">
								<input type="button" value="Add new field" class="formsub fully-rounded" onclick="itemadd()"> 								
							</div>
														
						</div>
						
						<div id="t2" class="tab-content">
							<div class="itembox">
								<div class="item-title">
									<h3>Form Style</h3>									
								</div>
								<div class="inside" style="display: block;">
									<div class="wow-admin-col">	
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Width", "wow-fp-lang") ?>: <br/>
											<input type='text' placeholder="100" name='param[form_width]' value="<?php echo $param['form_width']; ?>"/> <br/> 
											<input name="param[form_width_par]" type="radio" value="px" <?php if($param['form_width_par']=='px') { echo 'checked="checked"'; } ?>>px 
											<input name="param[form_width_par]" type="radio" value="%" <?php if($param['form_width_par']=='%' || $param['form_width_par'] =='') { echo 'checked="checked"'; } ?>>%
										</div>
										
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Alignment", "wow-fp-lang") ?>: <br/>
											<select name='param[form_align]'>
												<option value="left" <?php if($param['form_align']=='left') { echo 'selected="selected"'; } ?>><?php esc_attr_e("left", "wow-fp-lang") ?></option>
												<option value="center" <?php if($param['form_align']=='center') { echo 'selected="selected"'; } ?>><?php esc_attr_e("center", "wow-fp-lang") ?></option> 
												<option value="right" <?php if($param['form_align']=='right') { echo 'selected="selected"'; } ?>><?php esc_attr_e("right", "wow-fp-lang") ?></option>
											</select>
										</div>							
										
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Margin top & bottom", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="0" name='param[form_margin_top]' value="<?php echo $param['form_margin_top']; ?>"/> px
										</div>
										
									</div>
									
									
									<div class="wow-admin-col">	
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Margin left & right", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="0" name='param[form_margin_left]' value="<?php echo $param['form_margin_left']; ?>"/> px
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Padding top & bottom", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="0" name='param[form_padding_top]' value="<?php echo $param['form_padding_top']; ?>"/> px
											
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Padding left & right", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="0" name='param[form_padding_left]' value="<?php echo $param['form_padding_left']; ?>"/> px
										</div>
										
									</div>
									
									<div class="wow-admin-col">
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Border", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="0" name='param[form_border]' value="<?php if (!empty($param['form_border'])) { echo $param['form_border']; }; ?>"/> px
											
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Border radius", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="5" name='param[form_border_radius]' value="<?php if (!empty($param['form_border_radius'])) { echo $param['form_border_radius']; }; ?>"/> px
											
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Background image", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="link" name='param[background_img]' value="<?php if (!empty($param['background_img'])) { echo $param['background_img']; }; ?>"/>
											
										</div>
										
									</div>
									
									
									<div class="wow-admin-col">
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Background color", "wow-fp-lang") ?>:<br/> 
											<input type='text' placeholder="#ffffff" class="wp-color-picker-field" data-alpha="true" name='param[form_background_color]' value="<?php if(empty($param['form_background_color'])){echo "#ffffff";}else{echo $param['form_background_color'];}?>"/>
										</div>
										
										
										<div class="wow-admin-col-4">
											<?php esc_attr_e("Border color", "wplg") ?>:<br/> 
											<input type='text' placeholder="#ffffff" class="wp-color-picker-field" data-alpha="true" name='param[form_border_color]' value="<?php if(empty($param['form_border_color'])){echo "#ffffff";}else{echo $param['form_border_color'];}?>"/>
										</div>
										
										
									</div>
									
									
								</div>
								
							</div>
							
							<div class="itembox">
								<div class="item-title">
									<h3>Title</h3>									
								</div>
								<div class="inside" style="display: block;">
									<div class="wow-admin-col">	
										<div class="wow-admin-col-4">
											<?php esc_attr_e("Alignment", "wow-fp-lang") ?>: <br/>
											<select name='param[title_position]'>
												<option value="left" <?php if($param['title_position']=='left'  || $param['title_position'] == "") { echo 'selected="selected"'; } ?>><?php esc_attr_e("left", "wow-fp-lang") ?></option>
												<option value="center" <?php if($param['title_position']=='center') { echo 'selected="selected"'; } ?>><?php esc_attr_e("center", "wow-fp-lang") ?></option>
												<option value="right" <?php if($param['title_position']=='right') { echo 'selected="selected"'; } ?>><?php esc_attr_e("right", "wow-fp-lang") ?></option>
											</select>
										</div>
										
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Font size", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="18" name='param[font_size_label]' value="<?php echo $param['font_size_label']; ?>"/> px
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Color", "wow-fp-lang") ?>:<br/> <input type='text' placeholder="#000" class="wp-color-picker-field" data-alpha="true" name='param[font_color_label]' value="<?php if(empty($param['font_color_label'])){echo "#000";}else{echo $param['font_color_label'];}?>"/>
										</div>	
										
										
										
									</div>
								</div>
							</div>
							
							
							<div class="itembox">
								<div class="item-title">
									<h3>Field Style</h3>									
								</div>
								<div class="inside" style="display: block;">
									<div class="wow-admin-col">
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Fields height", "wow-fp-lang") ?>:<br/>
											<input type='text'  placeholder="" name='param[field_height]' value="<?php if(!empty($param['field_height'])) echo $param['field_height']; ?>"/><br/>
											<?php $param['field_height_par'] = (!empty($param['field_height_par'])) ? $param['field_height_par'] : 'auto'; ?>
											<input name="param[field_height_par]" type="radio" value="auto" <?php if($param['field_height_par']=='auto') { echo 'checked="checked"'; } ?>>auto 
											<input name="param[field_height_par]" type="radio" value="px" <?php if($param['field_height_par']=='px') { echo 'checked="checked"'; } ?>>px 
											
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Padding top & bottom", "wow-fp-lang") ?>:<br/>
											<input type='text'  placeholder="5" name='param[content_top]' value="<?php if(!empty($param['content_top'])) echo $param['content_top']; ?>"/> px
										</div>	
										
										
										
									</div>
									<div class="wow-admin-col">							
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Border", "wow-fp-lang") ?>:<br/>
											<input type='text'  placeholder="1" name='param[field_border]' value="<?php echo $param['field_border']; ?>"/> px
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Border radius", "wow-fp-lang") ?>:<br/>
											<input type='text'  placeholder="0" name='param[field_border_radius]' value="<?php echo $param['field_border_radius']; ?>"/> px
										</div>
										
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Font size", "wow-fp-lang") ?>: <br/>
											<input type='text' placeholder="16" name='param[font_size]' value="<?php echo $param['font_size']; ?>"/> px
										</div>					
										
									</div>
									
									<div class="wow-admin-col">	
										
										<div class="wow-admin-col-4">
											<?php esc_attr_e("Placeholder & text alignment", "wow-fp-lang") ?>: <br/>
											<select name='param[text_position]'>
												<option value="left" <?php if($param['text_position']=='left') { echo 'selected="selected"'; } ?>><?php esc_attr_e("left", "wow-fp-lang") ?></option>
												<option value="center" <?php if($param['text_position']=='center') { echo 'selected="selected"'; } ?>><?php esc_attr_e("center", "wow-fp-lang") ?></option>
												<option value="right" <?php if($param['text_position']=='right') { echo 'selected="selected"'; } ?>><?php esc_attr_e("right", "wow-fp-lang") ?></option>
											</select>
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Input height", "wow-fp-lang") ?>: <br/>
											<input type='text' placeholder="36" name='param[height_input]' value="<?php echo $param['height_input']; ?>"/> px
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Textarea height", "wow-fp-lang") ?>: <br/>
											<input type='text' placeholder="72" name='param[height_textarea]' value="<?php echo $param['height_textarea']; ?>"/> px
										</div>
										
									</div>
									
									
									<div class="wow-admin-col">
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Text color", "wow-fp-lang") ?>:<br/> <input type='text' placeholder="#555555" class="wp-color-picker-field" data-alpha="true" name='param[field_text_color]' value="<?php if(empty($param['field_text_color'])){echo "#555555";}else{echo $param['field_text_color'];}?>"/>	
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Placeholder text color", "wow-fp-lang") ?>:<br/> <input type='text' placeholder="#777777" class="wp-color-picker-field" data-alpha="true" name='param[field_placeholder_color]' value="<?php if(empty($param['field_placeholder_color'])){echo "#777777";}else{echo $param['field_placeholder_color'];}?>"/>
										</div>
										
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Border color", "wow-fp-lang") ?>:<br/> <input type='text' placeholder="#eeeeee" class="wp-color-picker-field" data-alpha="true" name='param[field_border_color]' value="<?php if(empty($param['field_border_color'])){echo "#eeeeee";}else{echo $param['field_border_color'];}?>"/>
										</div>
										
									</div>
									
									<div class="wow-admin-col">
										<div class="wow-admin-col-4 fieldform">
											<?php esc_attr_e("Background color", "wow-fp-lang") ?>:<br/> <input type='text' placeholder="#fcfcfc" class="wp-color-picker-field" data-alpha="true" name='param[field_background_color]' value="<?php if(empty($param['field_background_color'])){echo "#fcfcfc";}else{echo $param['field_background_color'];}?>"/>
										</div>
									</div>	
									
								</div>
							</div>
							
							
							<div class="itembox">
								<div class="item-title">
									<h3>Mobile Style</h3>									
								</div>
								<div class="inside" style="display: block;">
									<div class="wow-admin-col">
										
										<div class="wow-admin-col-4">
											<?php esc_attr_e("Trigger for screens less than", "wow-fp-lang") ?>:<br/>
											<input type='text' placeholder="480" name='param[screen_size]' value="<?php echo $param['screen_size']; ?>"/> px
										</div>
										
										<div class="wow-admin-col-4">
											<?php esc_attr_e("Form width", "wow-fp-lang") ?>: <br/>
											<input type='text' placeholder="85" name='param[mobile_width]' value="<?php echo $param['mobile_width']; ?>"/> <br/> 
											<input name="param[mobile_width_par]" type="radio" value="px" <?php if($param['mobile_width_par']=='px') { echo 'checked="checked"'; } ?>>px
											<input name="param[mobile_width_par]" type="radio" value="pr" <?php if($param['mobile_width_par']=='pr') { echo 'checked="checked"'; } ?>>%
										</div>	
									</div>
								</div>
							</div>
							
						</div>
							
						</div>
					</div>
				</div>
				
				<div id="wow-rightcol">
					
					<div class="wowbox">
						<h3><?php esc_attr_e("Publish", "wow-fp-lang") ?></h3>
						<div class="wow-admin" style="display: block;">
							<div class="wowcolom">
								<div style="float:left;">
									<?php if ($id != ""){ echo '<p class="wowdel"><a href="admin.php?page='.WOW_FP_BASENAME.'&info=del&did='.$id.'">Delete</a></p>';}; ?>
								</div>
								<div style="float:right;">
									<p/><input name="submit" id="submit" class="button button-primary" value="<?php echo $btn; ?>" type="submit">
								</div>					
							</div>
							<div class="wow-admin-col-12">
								<b><?php esc_attr_e("Shortcode", "wow-fp-lang") ?>:</b>  [WPcalc id=<?php echo $id; ?>]
							</div>			
							
						</div>
					</div>
					<div class="wowbox">
						<h3><span class="dashicons dashicons-admin-plugins"></span> <?php esc_attr_e("WP plugins for", "wow-fp-lang") ?>:</h3>
						<div class="wow-admin wow-plugins">
							<ul>						
								<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-marketing/" target="_blank">Marketing</a></li>
								<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-for-forms/" target="_blank">Forms</a></li>
								<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-menu/" target="_blank">Menu</a></li>	
								<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-authorization/" target="_blank">Authorization</a></li>	
							</ul>
						</div>
					</div>
					
					<div class="wowbox">
						
						<div class="wow-admin">
							<div class="wow-admin-col-12">
								<center><a href='http://wow-company.com/' target="_blank"><img src="<?php echo plugin_dir_url(__FILE__). 'img/icon.png' ?>"></a></center>
							</div>
							
							<div class="wow-admin-col-12 wowicon">						
								<a href='https://www.facebook.com/wowaffect/' title="Join Us on Facebook" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>		
								
								<a href='https://wow-estore.com' target="_blank" title="Wow-Estore"><img src="<?php echo plugin_dir_url(__FILE__). 'img/estore.png' ?>"></a>
								<a href='https://wpcalc.com/' target="_blank" title="Online Calculators"><img src="<?php echo plugin_dir_url(__FILE__). 'img/wpcalc.png' ?>"></a>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="add" value="<?php echo $hidval; ?>" />    
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="hidden" name="data" value="<?php echo $data; ?>" />
			<input type="hidden" name="page" value="<?php echo WOW_FP_BASENAME;?>" />	
			<input type="hidden" name="plugdir" value="<?php echo WOW_FP_BASENAME;?>" />		
			<?php wp_nonce_field('wow_plugin_action','wow_plugin_nonce_field'); ?>
		</form>
		