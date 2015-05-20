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
            $objectproduct->setuserid($product['id_user']);
            $objectcomb->setprice($product['price']);
            $objectcomb->setstock($product['stock']);

            $objectproduct->setproductcombination($objectcomb);
            array_push($myproducts, $objectproduct);
        }


      return  $myproducts;

    }

    public function verify_product_user($id_product,$id_user){
        $this->instance->load->model('product_mod');

        $id_user_product =$this->instance->product_mod->get_verify_product_by_user($id_product);
        if($id_user_product['id_user']==$id_user){
             return true;
        } else{
            return false;
        }

    }
}
