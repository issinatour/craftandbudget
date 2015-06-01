<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a  href="<?=base_url()?>Producto/miproducto" type="button" class="btn btn-w-m btn-primary">Crear producto</a>

                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Price</th>
                            <th>Medida</th>
                            <th>Stock</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach( $mymaterials as $material): ?>
                            <tr class="gradeX">
                                <td><?=$material['id_material']?></td>

                                <td>
                                    <div class="col-lg-9">
                                        <img width="130"  height="80" <?php $mfile='uploads/'.'2'.'/m/'.'1';
                                        if(file_exists($mfile)) {?>
                                            src="<?=base_url().$mfile?>"
                                        <?php } else { ?>
                                            src="<?=base_url().'uploads/default/avatar.png'?>"
                                        <?php } ?>
                                            />
                                    </div>

                                </td>
                                <td><?=$material['name']?></td>
                                <td><?=$material['price']?> €/<?=$material['measurement_type']?></td>

                                <td>
                                    <?=$material['measurement_type']?>
                                </td>
                                <td>
                                    <?=$material['quantity']?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-warning btn-sm dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?=base_url().'materiales/mimaterial/'.$material['id_material']?>">View</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>Price</th>
                            <th>Medida</th>
                            <th>Stock</th>
                            <th>Edit</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>