<?php

class Product_mod extends CI_Model
{

    function get_all_materials($id_user)
    {

        $this->db->where('material.id_user', $id_user);
 		$this->db->join('measurement', 'measurement.id_measurement = material.id_measurement');
        $this->db->join('stock_material', 'stock_material.id_material = material.id_material');
        $this->db->select('material.id_material, material.id_user, material.name, material.price, measurement.name as measurement_type, material_stock.quantity as quantity');

        $query = $this->db->get("material");
        return $query->result_array();

    }

  
}