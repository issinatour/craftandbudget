<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 29/05/2015
 * Time: 23:45
 */

class ps_api {
    public $web;
    public $ps_api_key;
    public $debug;

    function  __construct($web='',$ps_api_key='',$debug=false){
        $this->web=$web;
        $this->ps_api_key=$ps_api_key;
        $this->debug=$debug;
        $this->instance = &get_instance();
    }

    public function get_products_prestashop($config){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');
        $myproducts = array();
        $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

        $opt['resource'] = 'products';
        $opt['display'] = 'full';

        if(empty($config['limitp'])){

        }else{
            $opt['limit'] = $config['limitp'];
        }


        $xml = $webService->get($opt);
        $resources = $xml->children()->children();


        foreach ($resources as  $resource)
        {
            $myproduct['id']=$resource->id->__toString();
            $myproduct['price']=$resource->price->__toString();
            $myproduct['quantity']=$resource->quantity->__toString();
            $myproduct['id_default_image']=$resource->id_default_image->__toString();
            $myproduct['id_shop_default']=$resource->id_shop_default->__toString();
            $myproduct['name']=array();
            $myproduct['combinations']=array();

            $name_language = $resource->name;

            foreach ($name_language as  $lang)
            {
                $langname=array(
                    "id" => $lang->language['id']->__toString(),
                    "name" =>$lang->language->__toString()
                );
                array_push($myproduct['name'],$langname);
            }


            $asociations = $resource->associations;
            $combinations = $asociations->combinations;
            foreach ($combinations->children() as  $combination)
            {
                $mycomb=array(
                    "id" => $combination->id->__toString(),
                    "id_feature_value" => $combination->id_feature_value->__toString()
                );
                array_push($myproduct['combinations'],$mycomb);
            }
            array_push($myproducts,$myproduct);
        }

        return $myproducts;
    }

    function get_combinations_prestashop(){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');
        $ps_combinations=array();
        $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

        $opt['resource'] = 'combinations';
        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $combinations = $xml->children()->children();

        foreach ($combinations as  $combination)
        {

            $my_combination['id'] =$combination->id->__toString();
            $my_combination['price'] =$combination->price->__toString();
            $my_combination['quantity'] =$combination->quantity->__toString();
            $my_combination['product_option_values'] = array();

            $asociations_comb = $combination->associations;
            $product_options_values = $asociations_comb->product_option_values;


            foreach ($product_options_values->children() as  $myproduct_options_value)
            {
                $values_options['id']=$myproduct_options_value->id->__toString();
                array_push($my_combination['product_option_values'],$values_options);
            }

            $ps_combinations[$my_combination['id']]=$my_combination;

        }

        return $ps_combinations;
    }

    function get_products_options_values_prestashop(){
        $this->instance->load->library('PS-lib/PrestaShopWebservice');
        $my_product_option_values=array();
        $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

        $opt['resource'] = 'product_option_values';
        $opt['display'] = 'full';

        $xml = $webService->get($opt);
        $product_option_values = $xml->children()->children();

        foreach ($product_option_values as  $product_option_value)
        {

            $my_product_option_value['id']=$product_option_value->id->__toString();
            $my_product_option_value['id_attribute_group']=$product_option_value->id_attribute_group->__toString();
            $my_product_option_value['color']=$product_option_value->color->__toString();
            $my_product_option_value['name']=array();

            $name_language = $product_option_value->name;

            foreach ($name_language as  $lang)
            {
                $langname=array(
                    "id" => $lang->language['id']->__toString(),
                    "name" =>$lang->language->__toString()
                );
                array_push($my_product_option_value['name'],$langname);
            }

            $my_product_option_values[$my_product_option_value['id']] = $my_product_option_value;
        }

        return $my_product_option_values;
    }

    function get_image_types(){
        $image_types=array();
        $this->instance->load->library('PS-lib/PrestaShopWebservice');
        $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

        $opt['resource'] = 'image_types';
        $opt['display'] = 'full';
        $xml = $webService->get($opt);
        $images = $xml->children()->children();


        echo '<br>';
        foreach ($images as  $type)
        {
             $mytype= array(
               "id"=>$type->id->__toString(),
               "name"=>$type->name->__toString(),
               "width" => $type->width->__toString(),
               "height" => $type->height->__toString(),
                 "products"=>$type->products->__toString()

           );
            array_push($image_types,$mytype);

        }

        return $image_types;
    }

   function  get_image_type($id){
       $this->instance->load->library('PS-lib/PrestaShopWebservice');
       $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

       $opt['resource'] = 'image_types';
       $opt['id']=$id;
       $xml = $webService->get($opt);
       $images = $xml->image_type;

       $data=array(
           "width" => $images->width->__toString(),
           "height" => $images->height->__toString(),
            "products" => $images->products->__toString()

       );

       return $data;
    }

    function get_products_options_group(){
        $product_options_group=array();

        $this->instance->load->library('PS-lib/PrestaShopWebservice');

        $webService = new PrestaShopWebservice($this->web, $this->ps_api_key, $this->debug);

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