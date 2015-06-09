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

    public function viewtable(){

        $this->load->view('materiales/materiales_view_data');
    }

    public function miproducto($id_product=0){
        $this->load->library('product_lib');
        $this->load->library('material_lib');

        if($id_product==0){

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
                ),
                "tables" =>1
            );

            $data['menu'] = array(
                "full_width" =>1
            );

            $data['productdata'] = $this->product_lib->get_empty_product();
        }else {

            $id_craftshop_of_user = $this->session->userdata('id_craftshop');

            if($this->product_lib->verify_product_craftshop($id_product,$id_craftshop_of_user)) {


                $data['header'] = array(
                    "title" => "Mi producto",
                    "css" => array(
                        "css/plugins/summernote/summernote.css",
                        "css/plugins/summernote/summernote-bs3.css",
                        "css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css",
                        "css/plugins/jqGrid/ui.jqgrid.css"
                    )

                );
                $data['menu'] = array(
                    "full_width" =>1
                );

                $data['footer'] = array(
                    "script" => array(
                        "js/plugins/summernote/summernote.min.js",
                        "js/custom/customsummernote.js",
                        "js/plugins/jqGrid/i18n/grid.locale-es.js",
                        "js/plugins/jqGrid/jquery.jqGrid.min.js",
                        "js/plugins/peity/jquery.peity.min.js"
                    ),
                    "tables" =>1
                );
                $data['materiales']   =$this->material_lib->get_material_product($id_product);

                $data['productdata'] = $this->product_lib->get_product_data($id_craftshop_of_user, $id_product);
            }else{

            }

        }
        $this->load->view('templates/miproductotemplate', $data);
    }

    function register_save(){
        $this->load->library('Product_lib');

        $product = array(
            "id_product" => $this->input->post("id_product"),
            "id_craftshop" => $this->session->userdata('id_craftshop')
        );

        $product_lang=array(
            "name" => $this->input->post("title"),
            "description" => $this->input->post("hiddeninput"),
            "id_product" => $this->input->post("id_product")
        );

        $arr =array();
        $myuserid=$this->session->userdata('id');
        $urld='uploads/' . $myuserid . '/p/';

        $config['upload_path'] = 'uploads/' . $myuserid . '/p';
        $config['allowed_types'] = '*';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';



        $this->load->library('upload',$config);


        if (!$this->upload->do_upload("fichero")) {
            $error = array('error' => $this->upload->display_errors());

        } else {
            $data = $this->upload->data();

            $arr = array(
                //  "id_media_type" => 1,
                //   "name" => $data["raw_name"],
                //   "name" => $data["raw_name"],
                "file" => $data["file_name"]
            );
            // $id_media = $this->product_mod->create_media($arr);

            //   $professional["avatar"] = $id_media;
        }

        $product['id_product']= $this->product_lib->save_product($product,$product_lang,$arr);

        redirect('Producto/miproducto/'.$product['id_product']);

    }


    function get_material_product($id){

        $this->load->library('material_lib');
        $response =$this->material_lib->get_material_product($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        return;
    }

    function get_materials_craftshop($id){
        $this->load->library('material_lib');
        $response =$this->material_lib->get_all_materials($id);

        foreach ( $response as $k=>$v )
        {
            $response[$k] ['mname'] = $response[$k] ['name'];
            unset($response[$k]['name']);
            $response[$k] ['measurename'] = $response[$k] ['measurement_type'];
            unset($response[$k]['measurement_type']);
            $response[$k] ['mprice'] = $response[$k] ['price'];
            unset($response[$k]['price']);
        }

        foreach($response as &$material){
            unset($material['quantity']);
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    function delete_material_product(){
        $this->load->library('material_lib');
        $myid=  $this->input->post("myids");

        foreach($myid as $id){
            $this->material_lib->delete_product_material($id['id_material'],$id['id_producto']);
        }
    }

    function save_material_product($id_material,$id_product,$quantity){
        $this->load->library('material_lib');
        $this->material_lib->save_material_product($id_material,$id_product,$quantity);
    }
    function importproducts(){

        $this->load->library('Product_lib');
        $data['header'] = array(
            "title" => "Mi producto",
            "css" => array(
                "css/plugins/summernote/summernote.css",
                "css/plugins/summernote/summernote-bs3.css",
                "css/plugins/iCheck/custom.css"
            )
        );
        $data['menu'] = array(
            "full_width" =>1
        );

        $data['footer'] = array(
            "script" => array(
                "js/plugins/summernote/summernote.min.js",
                "js/custom/customsummernote.js",
                "js/plugins/iCheck/icheck.min.js"
            )

        );

        $this->load->library('craft_lib');
       $ps_config=$this->craft_lib->get_craftshop_shops_by_type($this->session->userdata('id_craftshop'),'prestashop');

        try{
         $data['tipos'] = $this->product_lib->get_products_image_type($ps_config['url_shop'],$ps_config['apikey'],false);

        }catch(PrestaShopWebserviceException $ex){
                $data['errores']=$ex->getMessage();
                $data['tipos']=null;
        }
        $this->load->view('templates/import_products_tmp',$data);

    }

    function pslib(){

        $product_imp_options = array(
            "products" => $this->input->post("getproducts"),
            "images" => $this->input->post('getimages'),
            "atributtes" => $this->input->post('getatributtes'),
            "combinations" => $this->input->post('getcombinations'),
            "limitp" => $this->input->post('limitp'),
            "radioimage"=> $this->input->post('radioimage')
        );


        $this->load->library('craft_lib');
        $ps_config=$this->craft_lib->get_craftshop_shops_by_type($this->session->userdata('id_craftshop'),'prestashop');

        $debug=false;
        $this->load->library('Product_lib');
        $this->product_lib->import_presta_products_full($ps_config['url_shop'],$ps_config['apikey'],$debug,$product_imp_options);

        redirect('Producto/importproducts');
    }

}