<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 15/05/2015
 * Time: 22:11
 */



class Craft_lib {


    public function __construct()
    {
        $this->instance = &get_instance();
    }



    function register_user($data){

        $this->instance->load->model('craft_mod');


            // Create professional
            if ($id_professional = $this->instance->craft_mod->create_user($data)) {
                return $id_professional;
            } else {
                return false;
            }



    }


    function register_craft_shop($datauser,$datacraftshop){

        $this->instance->load->model('craft_mod');

        $datauser['id_rol']=1;

        if ($datauser['id_craftshop'] = $this->instance->craft_mod->create_craft_shop($datacraftshop)) {

            $this->instance->craft_mod->create_relation_shop_user($datauser);

            return true;
        } else {

            return false;
        }

    }

}



