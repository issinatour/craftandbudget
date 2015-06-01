<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 20/05/2015
 * Time: 10:00
 */

class Producto_obj{

    public $id_material;
    public $id_craftshop;
    public $name;
    public $measurement_type;
    public $price;
    public $quantity;

    public function __construct($data=0)
    {
    	$this->instance = &get_instance();
    	if($data != 0){
    		$this->$idmaterial = $data['id_material'];
    		$this->$id_craftshop = $data['$id_user'];
    		$this->$name = $data['$name'];
    		$this->$measurement_type = $data['$measurement_type'];
    		$this->$price = $data['$price'];
    		$this->$quantity = $data['$quantity'];
    	
    	}
    }
    

    public function set_material($data){
    	$this->$idmaterial = $data['id_material'];
    	$this->$id_user = $data['$id_user'];
    	$this->$name = $data['$name'];
    	$this->$category = $data['$category'];
    	$this->$measurement_type = $data['$measurement_type'];
    	$this->$measurement = $data['$measurement'];
    	$this->$price = $data['$price'];
    }

}