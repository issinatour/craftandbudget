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
		<h5><?php echo $this->l('list_record'); ?> <?php echo $subject?></h5>
	</div>
	<div class="ibox-content">

		<?php echo form_open( $read_url, 'method="post" class="form-horizontal" id="crudForm" autocomplete="off" enctype="multipart/form-data"'); ?>
		<div>
		<?php
			$counter = 0;
			foreach($fields as $field)
			{
				$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
				$counter++;
		?>
			<div class="form-group">				
				<label class="col-sm-3 control-label">
				<b><?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?> :</b></label>
				<div class="col-sm-9">
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
			
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		

		<div class="form-group">
                <div class="col-sm-6 col-sm-offset-2">
                	<input type='button' value='<?php echo $this->l('form_back_to_list'); ?>' class='btn btn-primary' id="cancel-button" />
                </div>
                <div class='clear'></div>
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
