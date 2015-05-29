<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Informacion de mi producto: $NAME</small></h5>

</div>
<div class="ibox-content" style="height: 500px;">
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
</div>

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">

        <button class="btn btn-primary" id="save" type="submit" >Save changes</button>
    </div>
</div>
</div>



    <input type="hidden" id="id_product" name="id_product" value="<?=$productdata->getproductid();?>"/>
    <input type="hidden" id="hiddeninput" name="hiddeninput" value=""/>
</div>
</form>


</div>
</div>
</div>
</div>