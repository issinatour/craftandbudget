<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materiales extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("logged_in") == true) {
            redirect("usuarios");
        }


    }

    public function index()
    {
        $this->materiales();
    }

    public function materiales()
    {

        $this->load->library('Material_lib');
        $id = $this->session->userdata('id_craftshop');

        $my_materiales = $this->material_lib->get_all_materials($id);

        $data['user'] = array(
            "name" => $this->session->userdata('user'),
            "email" => $this->session->userdata('email')

        );

        $data['header'] = array(
            "title" => "Materiales",
            "css" => array(
                "css/plugins/dataTables/dataTables.bootstrap.css",
                "css/plugins/dataTables/dataTables.responsive.css",
                "css/plugins/dataTables/dataTables.tableTools.min.css"
            )
        );

        $data['main_content_view'] = 'materiales';

        $data['footer'] = array(
            "script" => array(
                "js/plugins/jeditable/jquery.jeditable.js",
                "js/plugins/dataTables/jquery.dataTables.js",
                "js/plugins/dataTables/dataTables.bootstrap.js",
                "js/plugins/dataTables/dataTables.responsive.js",
                "js/plugins/dataTables/dataTables.tableTools.min.js",
                "js/datatable.js"
            )
        );

        $data['data_view'] = array(
            "mymaterials" => $my_materiales

        );

        $this->load->view('templates/dashboardtemplate', $data);
    }

    public function mimaterial($id=0)
    {
        $this->load->library('Material_lib');
        $data['header'] = array(
            "title" => "Mi producto",
            "css" => array(
                "css/plugins/summernote/summernote.css",
                "css/plugins/summernote/summernote-bs3.css",
                "css/plugins/chosen/chosen.css"
            )
        );
        $data['menu'] = array(
            "full_width" =>1
        );

        $data['footer'] = array(
            "script" => array(
                "js/plugins/summernote/summernote.min.js",
                "js/custom/customsummernote.js",
                "js/plugins/chosen/chosen.jquery.js",
            )
        );


        if($id==0){
            $data['measurements'] = $this->material_lib->get_measurements();
            $data['material']=array(
                "name" => '',
                "price" => '',
                "id_material"=>0
            );

        }else{


            $data['measurements'] =  $this->material_lib->get_material_measurements_selected($id);
            $data['material'] = $this->material_lib->get_material_data($id);

        }


        $this->load->view('templates/materialviewtemplate', $data);


    }

    public function save_material(){
        $this->load->library('material_lib');

        $id_craftshop = $this->session->userdata('id_craftshop');
        $material = array(
            "id_material" => $this->input->post("id_material"),
            "id_craftshop"=> $id_craftshop,
            "name" => $this->input->post("name"),
            "id_category" =>1,
            "price" => $this->input->post("price"),
            "id_measurement" => $this->input->post('chose')
        );
        print_r($material);
       $material_id= $this->material_lib->save_material($material);
        redirect('Materiales/mimaterial/'.$material['id_material']);
    }
}