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



}