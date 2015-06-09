
<?php if(!isset($errores)){ ?>
<div class="row">
<div class="col-lg-9">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Importar elementos de prestashop</h5>

</div>
<div class="ibox-content">
<form method="post" class="form-horizontal" action="<?=base_url()?>Producto/pslib">
    <div class="form-group">
        <label class="col-sm-2 control-label">Limite de productos</label>

        <div class="col-sm-10">
        <input type="number" name="limitp" min="1" step="1"/>
            </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Datos a importar</label>

        <div class="col-sm-10">
            <label class="checkbox-inline i-checks"> <input type="checkbox" name="getproducts">Productos </label>
            <label class="checkbox-inline i-checks"> <input type="checkbox" name="getimages" >Imagenes </label>
            <label class="checkbox-inline i-checks"> <input type="checkbox" name="getcombinations" > Combinaciones </label>
            <label class="checkbox-inline i-checks"> <input type="checkbox" name="getatributtes" > Atributtos y grupos </label>
</div>
</div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Tipo de imagen(miniatura)<br/><small class="text-navy"></small></label>

        <div class="col-sm-10">

            <?php foreach($tipos as $tipo): ?>
            <div class="radio i-checks"><label> <input <?php if($tipo['width']>800 && $tipo['height']>800): ?> disabled=""   <?php endif; ?>name="radioimage" type="radio" value="<?=$tipo['name']?>" > <i></i> <?=$tipo['name']?>, <?=$tipo['width']?>x<?=$tipo['height']?> </label></div>

            <?php endforeach; ?>

        </div>
    </div>

<div class="hr-line-dashed"></div>
<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-white" type="submit">Cancel</button>
        <button class="btn btn-primary" type="submit">Save changes</button>
    </div>
</div>
</form>
</div>
</div>
</div>


</div>

<?php } else{?>
<a> <?=$errores?> </a>
<?php } ?>