<?php

	$this->set_css($this->default_theme_path.'/datatables/css/datatables.css');
	$this->set_js_lib($this->default_theme_path.'/flexigrid/js/jquery.form.js');
	$this->set_js_config($this->default_theme_path.'/datatables/js/datatables-edit.js');
	//$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>

<div class="ibox float-e-margins">
	<div class="ibox-title">
		<h5><?php echo $this->l('form_edit'); ?> <?php echo $subject?></h5>
	</div>
	<div class="ibox-content">
		<?php echo form_open( $update_url, 'method="post" class="form-horizontal" id="crudForm" autocomplete="off" enctype="multipart/form-data"'); ?>
		<div>
		<?php
			$counter = 0;
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class="form-group">
				<label class="col-sm-3 control-label" id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :
				</label>
				<div class="col-sm-9" id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				
			</div>
			<div class="hr-line-dashed"></div>
		<?php }?>
			<!-- Start of hidden inputs -->
				<?php
					foreach($hidden_fields as $hidden_field){
						echo $hidden_field->input;
					}
				?>
			<!-- End of hidden inputs -->
			<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
			
			<div id='report-error' class='alert alert-danger hide'></div>
			<div id='report-success' class='alert alert-success hide'></div>
		</div>

		<div class="form-group">
                <div class="col-sm-6 col-sm-offset-2">
                	<input id="form-button-save" type='submit' class="btn btn-primary" value='<?php echo $this->l('form_save'); ?>' />
                    <?php 	if(!$this->unset_back_to_list) { ?>
					<input type='button' value='<?php echo $this->l('form_save_and_go_back'); ?>' class='btn btn-primary' id="save-and-go-back-button"/>
					<input type='button' value='<?php echo $this->l('form_cancel'); ?>' class='btn btn-white' id="cancel-button" />
					<?php   } ?>
					<div class='small-loading' id='FormLoading'><?php echo $this->l('form_insert_loading'); ?></div>

                </div>
         </div>

		
	</form>
	</div>
</div>


<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>