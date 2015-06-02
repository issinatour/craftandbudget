<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 20/05/2015
 * Time: 11:25
 */

class Product_lib {


    public function __construct()
    {
        $this->instance = &get_instance();
    }


    function get_all_products($id_user){
        $this->instance->load->model('product_mod');
        $this->instance->load->library('objects/producto_obj');
        $this->instance->load->library('objects/Combinacion');

        $myproducts = array();

        $all_products = $this->instance->product_mod->get_all_products($id_user);

        foreach ( $all_products as $product ){

            $objectproduct = new Producto_obj();
            $objectcomb = new Combinacion();
            $objectproduct->setproductid($product['id_product']);
            $objectproduct->setproducttitle($product['name']);
            $objectproduct->setproductfile($product['file']);
            $objectproduct->setcraftshopid($product['id_craftshop']);
            $objectproduct->setproducttype($this->instance->product_mod->get_product_type($product['id_product']));
            $objectproduct->setproductprice($product['productprice']);
      //      $objectcomb->setstock($product['stock']);

            $objectproduct->setproductcombination($objectcomb);
            array_push($myproducts, $objectproduct);
        }


      return  $myproducts;

    }

    public function get_product_data($idshop,$idproduct){
        $this->instance->load->model('product_mod');
        $this->instance->load->library('objects/producto_obj');
        $this->instance->load->library('objects/Combinacion');

        $myproduct=$this->instance->product_mod->get_product_data($idshop,$idproduct);
        $objectproduct = new Producto_obj();

        $objectproduct->setproductid($myproduct['id_product']);
        $objectproduct->setproducttitle($myproduct['name']);
        $objectproduct->setproductdescription($myproduct['description']);
        $objectproduct->setproductfile($myproduct['file']);
        $objectproduct->setcraftshopid($myproduct['id_craftshop']);
        $all_product_combinations = array();
        $product_combinations = $this->instance->product_mod->get_product_combinations($idproduct);

        foreach($product_combinations as $combination){
            $objectcomb = new Combinacion();
            $objectcomb->setprice($combination['price']);
            $objectcomb->setstock($combination['stock']);

            array_push($all_product_combinations, $objectcomb);
        }

        $objectproduct->setproductcombination($all_product_combinations);

        return $objectproduct;
    }

    function  get_empty_product(){
        $this->instance->load->model('product_mod');
        $this->instance->load->library('objects/producto_obj');
        $this->instance->load->library('objects/Combinacion');
        $objectproduct = new Producto_obj();
        $objectproduct->setproductid(0);
        $objectproduct->setproducttitle('');
        $objectproduct->setproductdescription('');
        $objectproduct->setproductfile('');
        $objectproduct->setcraftshopid('');
        $objectproduct->setcraftshopid('');
        $all_product_combinations = array();
        $objectproduct->setproductcombination($all_product_combinations);
        return $objectproduct;
    }


    public function verify_product_craftshop($id_product,$idshop){
        $this->instance->load->model('product_mod');

        $id_shop_product = $this->instance->product_mod->get_verify_product_by_craftshop($id_product);
        if($id_shop_product['id_craftshop']==$idshop){
             return true;
        } else{
            return false;
        }

    }


    public function get_user_shops($iduser){

        $this->instance->load->model('product_mod');

        $myshop = $this->instance->product_mod->get_user_shop($iduser);

        return $myshop;

    }

    function  get_craftshop_shops_by_type($id_craftshop,$typename){
        $this->instance->load->model('product_mod');

        $myshop = $this->instance->product_mod->get_craftshop_shop_by_type($id_craftshop,$typename);
        return $myshop;
    }


    public function save_product($data,$datalang,$media)
    {
        $this->instance->load->model('product_mod');

        if (!isset($data["id_product"]) || !$data["id_product"]) {

            // Create professional
           $datalang["id_product"] = $this->instance->product_mod->create_product($data,$datalang);

                $mmedia['id_media']=  $this->instance->product_mod->create_media($media);
                $mmedia['id_product']=$datalang["id_product"];
                $this->instance->product_mod->create_product_media($mmedia);
                return $datalang["id_product"];


        } else {

            // Update professional.
            return $this->instance->product_mod->update_product($datalang);

        }

    }

    function get_products_ps_full($web,$api,$debug,$config){
        $psapi= new ps_api($web,$api,$debug);
        $myproducts=array();
        $mycombinations=array();
        $product_op_value=array();
        if($config['products']=='on'){
            $myproducts = $psapi->get_products_prestashop($config);
        }
        if($config['combinations']=='on'){
            $mycombinations = $psapi->get_combinations_prestashop();
        }
        if($config['atributtes']=='on'){
            $product_op_value=  $psapi->get_products_options_values_prestashop();
        }
        // $product_op_group=  $psapi->get_products_options_group();

        if($config['products']=='on') {
            foreach ($myproducts as &$miproducto) {
                //  echo 'id producto'.$miproducto['id'].'<br>';
                if (sizeof($miproducto['combinations'] > 0)) {
                    if($config['combinations']=='on') {
                    foreach ($miproducto['combinations'] as &$product_combination) {

                            $product_combination = array_merge($product_combination, $mycombinations[$product_combination['id']]);

                        if($config['atributtes']=='on') {
                        foreach ($product_combination['product_option_values'] as &$productoptionvalues) {

                                $productoptionvalues = array_merge($productoptionvalues, $product_op_value[$productoptionvalues['id']]);
                            }
                            }
                    }
                    }
                }

            }
        }
        return $myproducts;
    }

    function get_products_image_type($web,$api,$debug){
        $this->instance->load->library('ps_api');
        $psapi= new ps_api($web,$api,$debug);
          $mytypes=  $psapi->get_image_product_types();

       return $mytypes;
    }


    function import_presta_products_full($web,$api,$debug,$config){
        $this->instance->load->library('ps_api');
        $this->instance->load->model('product_mod');
        $myshop= $this->instance->session->userdata('id_craftshop');
        $id_user = $this->instance->session->userdata('id');
     //   $psapi= new ps_api($web,$api,$debug);
        $myproductsfull = $this->get_products_ps_full($web,$api,$debug,$config);
        set_time_limit(800);

        if($config['products']=='on'){
        foreach($myproductsfull as $miproducto){

                $my_product_get = $this->instance->product_mod->get_product_ps($myshop,$miproducto['id']);

            if(!empty($my_product_get)){
                $productdata=array(
                    "price" => $miproducto['price']
                );
                $this->instance->product_mod->update_product_ps($productdata,$miproducto['id'],$myshop);

            if($config['images']=='on'):
                $url = 'http://buhoplace.es/api/images/products/'.$miproducto['id']."/".$miproducto['id_default_image'].'&ws_key=2RE9HIPQVCPP3N3RYLAQW79IW9XR1U34';
                $fp ='uploads/'.$id_user."/p/".$miproducto['id_default_image'].'.jpg';

                //descargamos la imagen y reducimos tamaño y calidad (mas mejor!)

                $this->download_and_resize($url,$fp,0.1);

                $media_product =$this->instance->product_mod->get_product_media($miproducto['id_default_image'].'.jpg',$my_product_get['id_product']);
                if(empty($media_product)){
                    $mmedia['id_insert_media']= $this->instance->product_mod->create_media(array("is_default" => 1,"file" => $miproducto['id_default_image'].'.jpg'));
                    $this->instance->product_mod->create_product_media(array("id_product"=>$my_product_get['id_product'],"id_media" =>$mmedia['id_insert_media']));
                }else{
                    $this->instance->product_mod->delete_product_media_product($media_product['id_media'],$my_product_get['id_product']);
                    $this->instance->product_mod->delete_product_media($media_product['id_media']);

                    $mmedia['id_insert_media']= $this->instance->product_mod->create_media(array("is_default" => 1,"file" => $miproducto['id_default_image'].'.jpg'));
                    $this->instance->product_mod->create_product_media(array("id_product"=>$my_product_get['id_product'],"id_media" =>$mmedia['id_insert_media']));
                }

              endif;
            }else{
                $productdata=array(
                    "id_product_prestashop" => $miproducto['id'],
                    "id_craftshop"=> $myshop,
                    "price" => $miproducto['price']
                );
                $my_product_get['id_product']=  $this->instance->product_mod->insert_product_ps($productdata);
                $product_type =$this->instance->product_mod->get_product_type($my_product_get['id_product']);

                //copy("http://buhoplace.es/api/images/products/".$miproducto['id_default_image'],"uploads/".$id_user.'/p/'.$miproducto['id_default_image']);

             //   $this->download_and_resize($url,$fp,0.3);
                if(empty($product_type)){
                    $this->instance->product_mod->insert_product_data(array("id_product" => $my_product_get['id_product'], "id_type" => 1));
                }

            }

            if($config['combinations']=='on'):
                foreach ($miproducto['combinations'] as $product_combination) {

                    foreach($product_combination['product_option_values'] as $productoptionvalues){

                    }
                }
            endif;
            if($config['atributtes']=='on'):
                foreach($miproducto['name'] as $product_name){
                    $my_product_get_lang = $this->instance->product_mod->get_product_ps_languaje($my_product_get['id_product']);

                    if(!empty($my_product_get_lang)){
                        $productdatalang=array(
                            "name" => $product_name['name']
                        );
                        $this->instance->product_mod->update_product_ps_languaje($productdatalang,$my_product_get['id_product']);
                    }else{
                        $productdatalang=array(
                            "id_product" =>$my_product_get['id_product'],
                            "name" => $product_name['name'],
                            "id_lang" => 1,
                            "id_language_ps" =>1
                        );
                        $this->instance->product_mod->insert_product_ps_languaje($productdatalang);
                    }

               }
              endif;



        }
        }



    }

    function download_and_resize($url,$dest,$quality){
        $porcentaje = $quality;
        $nuevo_ancho = 300 * $porcentaje;
        $nuevo_alto = 300 * $porcentaje;

        $imagen_p = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
        $imagen = imagecreatefromjpeg($url);
        imagecopyresampled($imagen_p, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, 300, 300);
        imagejpeg($imagen_p,$dest);
    }



}
