<div class="row">
<div class="col-lg-9">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Informacion de mi producto: $NAME</small></h5>

</div>
<div class="ibox-content" style="height: 900px;">
<form onsubmit="myFunction()" method="post" class="form-horizontal" action="<?=base_url()?>producto/register_save" enctype="multipart/form-data" >
    <div class="col-sm-2">
        <div class="ibox">
            <div class="ibox-content">
                <div class="form-group">
                    <?php if (!is_null($productdata->getproductfile())): ?>
                        <img alt="image" class="img-circle m-t-xs img-responsive" src="<?=base_url().'uploads/'.$productdata->getcraftshopid().'/p/'.$productdata->getproductfile();?>" width="160" height="160" />
                    <?php else: ?>
                        <img alt="image" class="img-circle m-t-xs img-responsive" src="<?=base_url().'uploads/default/avatar.png'?>" />
                    <?php endif; ?>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-sm-12">
                            <input id="input-id" type="file" name="fichero" class="file" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        </div>
    <div class="col-sm-10">
<div class="form-group"><label class="col-sm-2 control-label">Name</label>

    <div class="col-sm-10"><input type="text" name="title" class="form-control" value="<?=$productdata->getproducttitle();?>"> </div>
</div>



<div class="hr-line-dashed"></div>
<div class="form-group"><label class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-10">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Wyswig Summernote Editor</h5>

                    </div>
                    <div class="ibox-content no-padding">

                        <div class="summernote">
                            <?=$productdata->getproductdescription();?>
                        </div>



                    </div>
                </div>
            </div>

    </div>


            <div class="form-group">
                <div  class="col-sm-12">

                    <table id="toolbar"></table>
                    <div id="ptoolbar" ></div>


    </div>
        </div>

</div>

    <div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">

        <button class="btn btn-primary" id="save" type="submit" >Save changes</button>
    </div>
</div>
</div>



    <input type="hidden" id="id_product" name="id_product" value="<?=$productdata->getproductid();?>"/>
    <input type="hidden" id="id_craftshop" name="id_craftshop" value="<?=$this->session->userdata('id_craftshop');?>"/>
</div>



</form>


</div>
</div>
</div>

<div class="col-lg-3">
    <div class="form-group">
        <div  class="col-sm-12">

            <table id="table_materials"></table>
            <div id="toolbar_mat" ></div>
            <button type="button" id="bedata" class="btn btn-primary" data-toggle="modal" data-target="#myModal5">
               Añadir materiales
            </button>
            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="closemodal2" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Añadir materiales</h4>
                            <small class="font-bold">Pinche en cada fila y añada la cantidad de material necesario para este producto y pulse "enter"</small>
                        </div>
                        <div class="modal-body">
                            <div  class="col-sm-12">

                                <table id="table_materials-unidad"></table>
                                <div id="ptoolbar-unidad" ></div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" id="closemodal" data-dismiss="modal">Close</button>
                            <button type="button" data-dismiss="modal" id="save_material" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>