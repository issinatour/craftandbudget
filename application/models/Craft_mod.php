<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 15/05/2015
 * Time: 22:12
 */


class Craft_mod extends CI_Model {

    function create_user($data) {

        $this->db->insert("user", $data);
        return $this->db->insert_id();

    }

    function create_craft_shop($data){
        $this->db->insert("craftshop", $data);
        return $this->db->insert_id();
    }

    function create_relation_shop_user($data){
        $this->db->insert("craftshop_users", $data);
        return $this->db->insert_id();
    }

    function get_craftshop_shops_by_type($id_craftshop,$typename){
        $this->db->where('shop_craftshop.id_craftshop', $id_craftshop);
        $this->db->where('types.name', $typename);
        $this->db->join('types', 'shop.type = types.id_type','left');
        $this->db->join('shop_craftshop', 'shop.id_shop = shop_craftshop.id_shop','left');
        $this->db->select('id_shop_user as id_shop_craftshop,shop.id_shop as id_shop,shop.name as shopname,shop_craftshop.key_api_shop as apikey,shop_craftshop.url_shop as url_shop,types.name as nametype');

        $query = $this->db->get("shop");

        return $query->row_array();
    }

    function create_shop_ext($data){
        $this->db->insert("shop", $data);
        return $this->db->insert_id();
    }

    function create_shop_craftshop($data){
        $this->db->insert("shop_craftshop", $data);
        return $this->db->insert_id();
    }

    function update_configuration_craftshop($data,$userdata){
        $this->db->where('id_shop_user', $userdata['id_craftshop_shop']);
        $this->db->update('shop_craftshop', $data);

    }

}