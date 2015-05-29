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

            if($this->session->userdata('logged_in')!=1){
                   redirect('Usuarios');
            }


    }

    public function index()
    {


        $data['header'] = array(
            "title" => "panel dashboard",
            "css"  => array(


            )
        );
        $data['main_content_view'] = 'dashboard';
        $data['data_view']=array();
        $data['footer']= array(
            "script" => array(

        )
        );
        $this->load->view('templates/dashboardtemplate',$data);
		
    }

    public function landing()
    {

    }
}
