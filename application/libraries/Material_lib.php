<?php
class Material_lib {


	public function __construct()
	{
		$this->CI = &get_instance();
	}
	
	public function get_all_materials($id_craftshop){
		$this->CI->load->model('material_mod');
     return  $my_materials= $this->CI->material_mod->get_all_materials($id_craftshop);
	
	}
}