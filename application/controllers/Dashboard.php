<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 14/05/2015
 * Time: 15:45
 */

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    function __construct()
    {
        parent::__construct();




    }

    public function index()
    {



        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" =>  $this->session->userdata('email'),
            "logged_in" => $this->session->userdata('logged_in')
        );

        print_r($data['user']);
        $data['header'] = array(
            "title" => "panel dashboard",
            "css"  => array(
                "css/plugins/dataTables/dataTables.bootstrap.css",
                "css/plugins/dataTables/dataTables.responsive.css",
                "css/plugins/dataTables/dataTables.tableTools.min.css"

            )
        );
        $data['main_content_view'] = 'dashboard';
        $data['data_view']=array();
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

    public function landing()
    {

    }
}