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
        $this->db->join('product_language', 'product.id_product = product.id_product');
        $this->db->join('product_media_product', 'product.id_product = product_media_product.id_product');
        $this->db->join('product_media', 'product_media_product.id_media = product_media.id_media');
        $this->db->select('product.id_product,product.id_user,product_language.name,product_language.description,product_media.file,product_media.is_default ');

        $query = $this->db->get("product");
        return $query->result_array();

    }
}