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
            $objectcomb->setprice($product['price']);
            $objectcomb->setstock($product['stock']);

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


    public function get_products_prestashop($url,$api,$debug=true){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');

        $webService = new PrestaShopWebservice($url, $api, $debug);

        $opt['resource'] = 'products';

        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $resources = $xml->children()->children();

        echo '<br>';
        foreach ($resources as  $resource)
        {

        echo 'id'.$resource->id.'<br>';
             $asociations = $resource->associations;
             $combinations = $asociations->combinations;
            foreach ($combinations->children() as  $combination)
            {
                echo 'combination id de producto'.$combination->id.'<br>';
            }
            echo 'siguiente producto'.'<br>';
        }
    }

    function get_combinations_prestashop($url, $api, $debug){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');

        $webService = new PrestaShopWebservice($url, $api, $debug);

        $opt['resource'] = 'combinations';

        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $combinations = $xml->children()->children();

        echo '<br>';
        foreach ($combinations as  $combination)
        {

            echo 'id combinacion'.$combination->id.'<br>';
            $asociations_comb = $combination->associations;

            $product_options_values = $asociations_comb->product_option_values;
            foreach ($product_options_values->children() as  $myproduct_options_values)
            {
                echo 'combination id de producto'.$myproduct_options_values->id.'<br>';
            }

            echo 'siguiente combinacion'.'<br>';
        }
    }

    function get_products_options_values_prestashop($url, $api, $debug){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');

        $webService = new PrestaShopWebservice($url, $api, $debug);

        $opt['resource'] = 'product_option_values';

        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $product_option_values = $xml->children()->children();

        echo '<br>';
        foreach ($product_option_values as  $product_option_value)
        {

            echo 'id product_option_value'.$product_option_value->id.'<br>';
            $name_language = $product_option_value->name;



            foreach ($name_language as  $lang)
            {
                echo 'product_option_value langid'.$lang->language['id'].'<br>';
                echo 'product_option_value langname'.$lang->language.'<br>';
            }

            echo 'siguiente product_option_value'.'<br>';
        }
    }

    function get_products_options_group($url, $api, $debug){
        $product_options_group=array();

        $this->instance->load->library('PS-lib/PrestaShopWebservice');

        $webService = new PrestaShopWebservice($url, $api, $debug);

        $opt['resource'] = 'product_options';

        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $product_options = $xml->children()->children();


        foreach ($product_options as  $product_option)
        {
            $myproduct_options['id']=$product_option->id->__toString();
            $myproduct_options['is_color_group']=$product_option->is_color_group->__toString();
            $myproduct_options['group_type']=$product_option->group_type->__toString();
            $myproduct_options['name']=array();

            $name_language = $product_option->name;

            foreach ($name_language as  $lang)
            {
               $langname=array(
                   "id" => $lang->language['id']->__toString(),
                   "name" =>$lang->language->__toString()
               );
                array_push($myproduct_options['name'],$langname);

            }

            array_push($product_options_group,$myproduct_options);

        }

        return $product_options_group;
    }

}
