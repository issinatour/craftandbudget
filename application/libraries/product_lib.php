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
        $myproducts = array();


        foreach ($all_products = $this->instance->product_mod->get_all_products($id_user) as $product ){

            $objectproduct = new Producto_obj();

            $objectproduct->setproductid(12);
            $objectproduct->setproducttitle('miau');
            $objectproduct->setproductfile('xd.png');
            echo '<pre>';
            var_dump($objectproduct);
            echo '</pre>';
            array_push($myproducts, $objectproduct);
        }
      return  $myproducts;

    }

}