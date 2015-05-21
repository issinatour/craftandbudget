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

}



