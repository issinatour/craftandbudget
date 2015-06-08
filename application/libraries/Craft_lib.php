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

    function  get_craftshop_shops_by_type($id_craftshop,$typename){
        $this->instance->load->model('craft_mod');

        $myshop = $this->instance->craft_mod->get_craftshop_shops_by_type($id_craftshop,$typename);
        return $myshop;
    }

    function update_config_shop_user($prestaconfig,$userconfig){
        $this->instance->load->model('craft_mod');
        $this->instance->craft_mod->update_configuration_craftshop($prestaconfig,$userconfig);
    }

    function register_craft_shop($datauser,$datacraftshop){

        $this->instance->load->model('craft_mod');

        $datauser['id_rol']=1;

        if ($datauser['id_craftshop'] = $this->instance->craft_mod->create_craft_shop($datacraftshop)) {
          $id_shop=  $this->instance->craft_mod->create_shop_ext(array("name"=>"mi presta","id_type"=>1));


            $datashopcraftshop=array(
                "id_shop" =>$id_shop,
                "id_craftshop" => $datauser['id_craftshop'],
                "key_api_shop" => ' ',
                "url_shop" => ' '
            );
            $this->instance->craft_mod->create_shop_craftshop($datashopcraftshop);
            $this->instance->craft_mod->create_relation_shop_user($datauser);

            return true;
        } else {

            return false;
        }

    }

}




