<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Basic Data Tables example with responsive plugin</h5>
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

<table class="table table-striped table-bordered table-hover dataTables-example" >
<thead>
<tr>
    <th>product id</th>
    <th>product name</th>
    <th>image</th>
</tr>
</thead>
<tbody>
<?php foreach( $myproducts as $product) ?>
<tr class="gradeX">
    <td><?=$product->getproductid();?></td>
    <td><?=$product->getproducttitle();?></td>
    <td><?=$product->getproductfile();?></td>
    <td><div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-warning btn-sm dropdown-toggle">Action <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
    </td>

</tr>
<?php ?>
</tbody>
<tfoot>

</tfoot>
</table>

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="ibox float-e-margins">
<div class="ibox-title">
    <h5>Editable Table in- combination with jEditable</h5>
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
<div class="">
    <a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Add a new row</a>
</div>
<table class="table table-striped table-bordered table-hover " id="editable" >
<thead>
<tr>
    <th>product id</th>
    <th>product name</th>
    <th>image</th>
</tr>
</thead>
<tbody>
<tr class="gradeX">
    <td>Trident</td>
    <td>Internet
        Explorer 4.0
    </td>
    <td>Win 95+</td>
    <td class="center">4</td>
    <td class="center">X</td>
</tr>

</tbody>
<tfoot>
<tr>
    <th>Rendering engine</th>
    <th>Browser</th>
    <th>Platform(s)</th>
    <th>Engine version</th>
    <th>CSS grade</th>
</tr>
</tfoot>
</table>

</div>
</div>
</div>
</div>
</div>