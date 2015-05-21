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

        redirect('producto/misproductos');
    }

    public function misproductos(){

        $this->load->library('product_lib');


        $data['header'] = array(
            "title" => "panel dashboard",
            "css"  => array(
            )
        );
        $data['main_content_view'] = 'productos/productos_view_data';
        $data['footer']= array(
            "script" => array(
                "js/plugins/dataTables/jquery.dataTables.js",
                "js/plugins/dataTables/dataTables.responsive.js",
                "js/plugins/dataTables/dataTables.bootstrap.js",
                "js/plugins/dataTables/dataTables.tableTools.min.js",
                "js/custom/datatable.js"
            )
        );




        $id=$this->session->userdata('id_craftshop');
        $myproducts = $this->product_lib->get_all_products($id);

        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" =>  $this->session->userdata('email'),
            "logged_in" => $this->session->userdata('logged_in')
        );
        $data['data_view']= array(
            "myproducts" => $myproducts

        );


        $this->load->view('templates/dashboardtemplate',$data);
    }


    public function miproducto($id_product){
        $this->load->library('product_lib');

        $id_craftshop_of_user = $this->session->userdata('id_craftshop');
        if($this->product_lib->verify_product_craftshop($id_product,$id_craftshop_of_user)) {



            $data['header'] = array(
                "title" => "Mi producto",
                "css" => array(
                    "css/plugins/summernote/summernote.css",
                    "css/plugins/summernote/summernote-bs3.css"
                )
            );
            $data['footer'] = array(
                "script" => array(
                    "js/plugins/summernote/summernote.min.js",
                    "js/custom/customsummernote.js"
                )
            );


            $data['productdata'] = $this->product_lib->get_product_data($id_craftshop_of_user,$id_product);




          $this->load->view('templates/miproductotemplate', $data);

        }else{

            redirect('producto');

        }
    }


}