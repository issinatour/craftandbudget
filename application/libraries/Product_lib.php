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
        $objectproduct->setcraftshopid($myproduct['productprice']);

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
}
