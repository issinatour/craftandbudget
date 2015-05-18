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


        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" =>  $this->session->userdata('email')

        );
        $data['header'] = array(
            "title" => "panel dashboard",
            "css"  => array(
                "css/plugins/dataTables/dataTables.bootstrap.css",
                "css/plugins/dataTables/dataTables.responsive.css",
                "css/plugins/dataTables/dataTables.tableTools.min.css"

            )
        );
        $data['main_content'] = 'dashboard';
        $data['footer']= array(
            "script" => array(
                "js/plugins/jeditable/jquery.jeditable.js",
                "js/plugins/dataTables/jquery.dataTables.js",
                "js/plugins/dataTables/dataTables.bootstrap.js",
                "js/plugins/dataTables/dataTables.responsive.js",
                "js/plugins/dataTables/dataTables.tableTools.min.js",
                "js/datatable.js"
            )
        );
        $this->load->view('templates/dashboardtemplate',$data);

    }


}