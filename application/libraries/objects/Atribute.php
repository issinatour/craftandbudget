<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 20/05/2015
 * Time: 10:46
 */


class Atribute {



    private $_id_attribute;
    private $_attributename;
    private $_attributegroup;

    public function setattributetid($value) {
        $v = trim($value);
        $this->$_id_attribute = empty($v) ? null : $v;
        return $this;
    }

    public function getattributetid() {
        return $this->$_id_attribute;
    }

    public function setattributename($value) {
        $v = trim($value);
        $this->$_attributename = empty($v) ? null : $v;
        return $this;
    }

    public function getattributename() {
        return $this->$_attributename;
    }

    public function setattributegroup($value) {
        $v = trim($value);
        $this->$_attributegroup = empty($v) ? null : $v;
        return $this;
    }

    public function getattributegroup() {
        return $this->$_attributegroup;
    }


}