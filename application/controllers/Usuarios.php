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


}