<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 19/05/2015
 * Time: 17:43
 */

class Product_mod extends CI_Model
{

    function get_all_products($id_shop)
    {

        $this->db->where('product.id_craftshop', $id_shop);

        $this->db->join('product_language', 'product.id_product = product_language.id_product');
        $this->db->join('product_media_product', 'product.id_product = product_media_product.id_product','left');
        $this->db->join('product_media', 'product_media_product.id_media = product_media.id_media','left');
        $this->db->join('combination', 'product.id_product = combination.id_product','left');
        $this->db->select('product.id_product,product.id_craftshop,product_language.name,product_language.description,product_media.file,product_media.is_default,product.price as productprice ');
        $query = $this->db->get("product");
        return $query->result_array();


    }


    function get_product_data($id_shop,$id_product){
        $this->db->where('product.id_product', $id_product);
        $this->db->where('product.id_craftshop', $id_shop);
        $this->db->join('product_language', 'product.id_product = product_language.id_product');
        $this->db->join('product_media_product', 'product.id_product = product_media_product.id_product','left');
        $this->db->join('product_media', 'product_media_product.id_media = product_media.id_media','left');
        $this->db->select('product.id_product,product.id_craftshop,product_language.name,product_language.description,product_media.file,product_media.is_default,product.price as productprice ');
        $query = $this->db->get("product");

        return $query->row_array();
    }

    function get_product_combinations($id_product){
        $this->db->where('combination.id_product', $id_product);
        $this->db->select('combination.*');
        $query = $this->db->get("combination");
        return $query->result_array();
    }

    function get_user_shop($id_user){
        $this->db->where('craftshop_users.id_user', $id_user);
        $this->db->select('craftshop_users.id_craftshop');

        $query = $this->db->get("craftshop_users");
        return $query->row_array();
    }

    function get_verify_product_by_craftshop($id_product)
    {
        $this->db->where('product.id_product', $id_product);
        $this->db->select('product.id_craftshop');
        $query = $this->db->get("product");
        return $query->row_array();
    }

    function update_product($data){
        $this->db->where('id_product', $data['id_product']);
        $this->db->update('product_language', $data);
    }

    function create_product($data,$datalang) {

        $this->db->insert("product", $data);
        $datalang['id_product']= $this->db->insert_id();
        $datalang['id_lang']=1;
        $this->db->insert("product_language", $datalang);


        return $datalang['id_product'];
    }

    function create_media($data) {
        $this->db->insert("product_media",$data);
        return $this->db->insert_id();
    }

    function create_product_media($data) {
        $this->db->insert("product_media_product",$data);
        return $this->db->insert_id();
    }

    function get_product_ps($id_craftshop,$id_product_ps){
        $this->db->where('product.id_craftshop', $id_craftshop);
        $this->db->where('product.id_product_prestashop', $id_product_ps);
        $query = $this->db->get("product");
        return $query->row_array();;
    }

    function insert_product_ps($data){
        $this->db->insert("product",$data);
        return $this->db->insert_id();
    }

    function update_product_ps($data,$id_product,$id_craftshop){
        $this->db->where('id_product_prestashop', $id_product);
        $this->db->where('id_craftshop', $id_craftshop);
        $query=  $this->db->update('product', $data);


    }

    function get_product_ps_languaje($id_product){
        $this->db->where('id_product', $id_product);
        $query = $this->db->get("product_language");
        return $query->num_rows();
    }

    function insert_product_ps_languaje($data){
        $this->db->insert("product_language",$data);
        return $this->db->insert_id();
    }

    function update_product_ps_languaje($data,$id_product){
        $this->db->where('id_product', $id_product);
        $this->db->update('product_language', $data);
        echo $this->db->last_query();
    }

}