<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 19/05/2015
 * Time: 17:43
 */

class Product_mod extends CI_Model
{

    function get_all_products($id_user)
    {

        $this->db->where('product.id_user', $id_user);
        $this->db->where('combination.is_default', 1);
        $this->db->join('product_language', 'product.id_product = product_language.id_product');
        $this->db->join('product_media_product', 'product.id_product = product_media_product.id_product');
        $this->db->join('product_media', 'product_media_product.id_media = product_media.id_media');
        $this->db->join('combination', 'product.id_product = combination.id_product');

        $this->db->select('product.id_product,product.id_user,product_language.name,product_language.description,product_media.file,product_media.is_default,combination.price,combination.stock,combination.id_combination ');

        $query = $this->db->get("product");
        return $query->result_array();

    }

    function get_verify_product_by_user($id_product)
    {
        $this->db->where('product.id_product', $id_product);
        $this->db->select('product.id_user');
        $query = $this->db->get("product");
        return $query->row_array();
    }
}