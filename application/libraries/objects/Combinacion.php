<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 20/05/2015
 * Time: 10:24
 */


    class Combinacion{

       private  $id_comb;
        private $price;
        private $stock;
        private $_attributes;


        public function setstock($value) {
            $v = trim($value);
            $this->stock = empty($v) ? null : $v;
            return $this;
        }

        public function getstock() {
            return $this->stock;
        }

        public function setcombid($value) {
            $v = trim($value);
            $this->id_comb = empty($v) ? null : $v;
            return $this;
        }

        public function getproductid() {
            return $this->id_comb;
        }

        public function setprice($value) {
            $v = trim($value);
            $this->price = empty($v) ? null : $v;
            return $this;
        }

        public function getprice() {
            return $this->price;
        }


        public function setattributes($value) {
            $v = trim($value);
            $this->_attributes = empty($v) ? null : $v;
            return $this;
        }

        public function getattributes() {
            return $this->_attributes;
        }




    }