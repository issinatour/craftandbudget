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

    function get_material_data($id_material){
        $this->db->where('material.id_material', $id_material);
        $this->db->join('stock_material', 'stock_material.id_material = material.id_material','left');
        $this->db->select('material.id_material, material.id_craftshop, material.name, material.price,  stock_material.quantity as quantity');
        $query = $this->db->get("material");
        return $query->row_array();
    }

    function get_measurements(){
        $this->db->select('measurement.id_measurement, measurement.name as measurement_type');
        $query = $this->db->get("measurement");

        return $query->result_array();
    }

    function get_material_measurement($idmaterial){
        $this->db->where('material.id_material', $idmaterial);
        $this->db->join('measurement', 'material.id_measurement = measurement.id_measurement','left');
        $this->db->select('measurement.id_measurement,material.id_material, material.id_craftshop, material.name as mname, material.price, measurement.name as measurement_type');

        $query = $this->db->get("material");
        return $query->row_array();
    }

    function create_material($data){
        $this->db->insert("material",$data);
        return $this->db->insert_id();
    }

    function update_material($data,$id_material){
        $this->db->where('id_material', $id_material);
        $this->db->update('material', $data);
    }

    function get_product_material($id_product){
        $this->db->where('material_product.id_product', $id_product);
        $this->db->join('material', 'material_product.id_material = material.id_material','left');
        $this->db->join('measurement', 'material.id_measurement = measurement.id_measurement','left');
        $this->db->select('material.id_material,material.name as mname,measurement.name as measurename,material.price as mprice,material_product.quantity');

        $query = $this->db->get("material_product");
        return $query->result_array();
    }

    function get_material_product_exists($id_product,$id_material){
        $this->db->where('material_product.id_material', $id_material);
        $this->db->where('material_product.id_product', $id_product);
        $query = $this->db->get("material_product");
        return $query->row_array();
    }

    function save_material_product($data){
        $this->db->insert("material_product",$data);
        return $this->db->insert_id();
    }

    function detele_product_material($id_material,$id_product){
        $this->db->where('id_product', $id_product);
        $this->db->where('id_material', $id_material);
        $this->db->delete('material_product');
    }
}