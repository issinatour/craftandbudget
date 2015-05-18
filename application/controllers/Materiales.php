<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materiales extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	
		if (!$this->session->userdata("logged_in")==true){
			redirect("usuarios");
		}
	
		
	}
	
	public function index()
	{
		$this->materiales();
	}
	public function materiales(){

		
		$data['user'] = array(
				"name" => $this->session->userdata('user'),
				"email" =>  $this->session->userdata('email')
				
				);
		
		$data['header'] = array(
				"title" => "Materiales",
				"css"  => array(
						"css/plugins/dataTables/dataTables.bootstrap.css",
						"css/plugins/dataTables/dataTables.responsive.css",
						"css/plugins/dataTables/dataTables.tableTools.min.css"
						)
		);
		$data['main_content_view'] = 'materiales';
		
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
