<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 18/05/2015
 * Time: 10:41
 */

class Producto extends CI_Controller{


    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("logged_in")){
            redirect("usuarios");
        }


    }


    public function index()
    {
        $this->load->library('product_lib');


        $data['header'] = array(
            "title" => "panel dashboard",
            "css"  => array(
            )
        );
        $data['main_content_view'] = 'productos/productos_view_data';
        $data['footer']= array(
            "script" => array(

            )
        );

        $id=$this->session->userdata('id');
        $myproducts = $this->product_lib->get_all_products($id);

        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" =>  $this->session->userdata('email'),
            "logged_in" => $this->session->userdata('logged_in')
        );
        $data['data_view']= array(
             "myproducts" => $myproducts

        );

        print_r($this->session->userdata("user"));
        $this->load->view('templates/dashboardtemplate',$data);

    }


}