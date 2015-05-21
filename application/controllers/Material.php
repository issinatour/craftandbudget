<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 18/05/2015
 * Time: 10:41
 */

class Material extends CI_Controller{


    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("logged_in")){
            redirect("usuarios");
        }

    }


    public function index()
    {
		  redirect('material/mismateriales');
    }

    public function mismateriales(){

        $this->load->library('material_lib');


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
      

        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" =>  $this->session->userdata('email'),
            "logged_in" => $this->session->userdata('logged_in')
        );
        $data['data_view']= array(
            

        );


        $this->load->view('templates/dashboardtemplate',$data);
    }


    public function miproducto($id_product){
        $this->load->library('product_lib');

        $id_user_logged= $this->session->userdata('id');
        if($this->product_lib->verify_product_user($id_product,$id_user_logged)) {



            $data['header'] = array(
                "title" => "panel dashboard",
                "css" => array()
            );
            $data['main_content_view'] = 'productos/productos_view_data';
            $data['footer'] = array(
                "script" => array()
            );


            $myproducts = $this->product_lib->get_all_products($id_user_logged);

            $data['user'] = array(
                "name" => $this->session->userdata('user'),
                "email" => $this->session->userdata('email'),
                "logged_in" => $this->session->userdata('logged_in')
            );
            $data['data_view'] = array(
                "myproducts" => $myproducts

            );


            $this->load->view('templates/dashboardtemplate', $data);

        }else{

            redirect('producto');

        }
    }


}