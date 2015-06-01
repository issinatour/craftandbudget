<?php

class Material_mod extends CI_Model
{

    function get_all_materials($id_craftshop)
    {

        $this->db->where('material.id_craftshop', $id_craftshop);
 		$this->db->join('measurement', 'measurement.id_measurement = material.id_measurement','left');
        $this->db->join('stock_material', 'stock_material.id_material = material.id_material','left');
        $this->db->select('material.id_material, material.id_craftshop, material.name, material.price, measurement.name as measurement_type, stock_material.quantity as quantity');
        $query = $this->db->get("material");
        return $query->result_array();
    }

    function get_material_data(){

    }

  
}