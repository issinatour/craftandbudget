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

    public function get_measurements(){
        $this->CI->load->model('material_mod');
        return  $my_materials= $this->CI->material_mod->get_measurements();

    }

    public function get_material_measurements_selected($id_material){
        $this->CI->load->model('material_mod');
        $all_measurements = $this->CI->material_mod->get_measurements();

        $material_measurement = $this->CI->material_mod->get_material_measurement($id_material);

        foreach ($all_measurements as &$measurements){
            if($measurements['id_measurement']==$material_measurement['id_measurement']){
                $measurements['is_selected']=1;
            }else{
                $measurements['is_selected']=0;
            }
        }
         return $all_measurements;
    }
}