<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 20/05/2015
 * Time: 10:00
 */

class Producto_obj{

    public $idproduct;
    public $_description;
    public $_title;
    public $_product_file;
    public $_combination;

    public function setproductid($value) {
        $this->idproduct = (int) $value;
    }

    public function getproductid() {
        return $this->idproduct;
    }

    public function setproductdescription($value) {
        $v = trim($value);
        $this->_description =  $v;
    }

    public function getproductdescription() {
        return $this->_description;
    }

    public function setproducttitle($value) {
        $v = trim($value);
        $this->_title = $value;
    }

    public function getproducttitle() {
        return $this->_title;
    }

    public function setproductfile($value) {
        $v = trim($value);
        $this->_product_file =  $v;
    }

    public function getproductfile() {
        return $this->_product_file;
    }

    public function setproductcombination($value){
        $v = trim($value);
        $this->_combination =  $v;

    }

    public function getproductcombination(){
        return $this->_combination;
    }


    public function save_product(){

    }


}