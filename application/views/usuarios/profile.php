

<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 21/05/2015
 * Time: 12:30
 */

$this->load->view('templates/header_backoffice',$header);

if(isset($menu)){
    $this->load->view('menu',$menu);
}else{
    $this->load->view('menu');
}


?>



<div class="col-lg-5">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Prestashop configuration</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal" method="post" action="<?=base_url()?>Usuarios/save_configuration">
                <div class="form-group"><label class="col-lg-2 control-label">Prestashop key</label>

                    <div class="col-lg-10"><input type="text" name="pskey" placeholder="Api_key" value="<?=$psshop['apikey']?>" class="form-control"> <span class="help-block m-b-none">api key, minimo tener aceptado get</span>
                    </div>
                </div>
                <div class="form-group"><label class="col-lg-2 control-label">Prestashop url</label>

                    <div class="col-lg-10"><input type="text" name="psurl" value="<?=$psshop['url_shop']?>" placeholder="url" class="form-control"></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <div class="checkbox i-checks"><label> <input required type="checkbox"><i></i> Acepto condiciones </label></div>
                    </div>
                </div>
                <div class="form-group">
                   <input type="hidden" id="id_craftshop_shop" name="id_craftshop_shop" value="<?=$psshop['id_shop_craftshop']?>"/>

                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-white" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<?php
$this->load->view('footer',$footer);
?>