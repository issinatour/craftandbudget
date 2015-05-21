<?php
class Material_lib {


	public function __construct()
	{
		$this->instance = &get_instance();
	}
	
	public function get_all_materials($id_user){
		$this->instance->load->model('material_mod');
	
	}
}