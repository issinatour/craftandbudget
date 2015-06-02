<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 15/05/2015
 * Time: 22:00
 */

class Usuarios extends CI_Controller {


    function  index(){


       redirect('usuarios/login');


    }

    function login(){

        $this->load->view('header');
        $this->load->view('usuarios/login');

    }


    function register(){
        $this->load->view('header');
        $this->load->view('usuarios/register');
    }


    function register_save(){

        $this->load->library('craft_lib');


        $professional = array(
            "name" => $this->input->post("user"),
            "password" => md5($this->input->post("pass")),
            "email" => $this->input->post("email")
        );
        $id_professional = $this->craft_lib->register_user($professional);

        $craft_shop = array(
            "name" => $this->input->post("shopname"),
            "description" => $this->input->post("descriptionshop")

        );

        $data['id_user']=$id_professional;

        $idshop = $this->craft_lib->register_craft_shop($data,$craft_shop);


      redirect('usuarios');

}

    public function do_login()
    {
        $login = $this->simpleloginsecure->login($this->input->post("user"), $this->input->post("pass"));
   
       if($login) {
            redirect("dashboard");
        }else{
            redirect("usuarios");
        }
    }

    public function logout()
    {
        $this->simpleloginsecure->logout();
        redirect("usuarios");
    }

    public function profile(){
        $this->load->library('craft_lib');
        $data['header'] = array(
            "title" => "Mi producto",
            "css" => array(
                "css/plugins/summernote/summernote.css",
                "css/plugins/summernote/summernote-bs3.css"
            )
        );
        $data['menu'] = array(
            "full_width" =>0
        );

        $data['footer'] = array(
            "script" => array(
                "js/plugins/summernote/summernote.min.js",
                "js/custom/customsummernote.js"
            )
        );

        $data['psshop'] = $this->craft_lib->get_craftshop_shops_by_type($this->session->userdata('id_craftshop'),'prestashop');
       // print_r($data['psshop']);
        $this->load->view('usuarios/profile', $data);


    }



    public function save_configuration(){

        $this->load->library('craft_lib');
        $prestaconfig = array(
            "url_shop" => $this->input->post("psurl"),
            "key_api_shop" => $this->input->post("pskey"),
        );
        $userconfig=array(
            "id_craftshop" => $this->session->userdata('id_craftshop'),
            "nametype" => $this->input->post("psurl"),
            "id_craftshop_shop" => $this->input->post('id_craftshop_shop')
         );

        $this->craft_lib->update_config_shop_user($prestaconfig,$userconfig);
    }


}