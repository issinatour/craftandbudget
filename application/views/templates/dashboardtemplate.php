<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 15/05/2015
 * Time: 22:03
 */


$this->load->view('templates/header_backoffice',$header);
$this->load->view('menu',$user);
$this->load->view($main_content_view,$data_view);
$this->load->view('footer',$footer);