
<div class="footer">
    <div class="pull-right">
        Cuenta <strong>Gratuita</strong>
    </div>
    <div>
        <strong>Copyright</strong> Craftandbudget &copy; 2014-2015
    </div>
</div>
</div>


<script src="<?=base_url()?>assets/backtheme/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/pace/pace.min.js"></script>

<script src="<?=base_url()?>assets/backtheme/js/plugins/fileinput/fileinput.min.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/fileinput/fileinput_locale_en.js"></script>


<script src="<?=base_url()?>assets/backtheme/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<?php
if(isset($script)) {
    foreach($script as $jsfile) {
        ?>
        <script  src="<?= base_url().'assets/backtheme/'.$jsfile?>"></script>

    <?php
    }
}
?>

<script>
    function myFunction() {
        var mysave = $('.note-editable').html();
        $('#hiddeninput').val(mysave);
        console.log( document.getElementById("hiddeninput").value);
        document.getElementById("hiddeninput").value("");
        return true;
    }
</script>

<script>
    $(document).ready(function () {



        $("#input-id").fileinput({
            uploadAsync: false,
            showUpload: false,
            showPreview: true,
            showRemove: false,
            previewClass: "professional-foto",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png"]
        }).on('fileloaded', function(event, file, previewId, index, reader) {
            $(".img-circle").hide();
        });



    });
</script>

<?php if($tables==1){?>
<script>
    $(document).ready(function () {

        var host = window.location.host;
        var base_url = window.location.origin;
        var bla = $('#id_product').val();
        var craftshop = $('#id_craftshop').val();
        var finaljson="";

        var craftshop_products_materials;
        $.post("<?php echo base_url(); ?>producto/get_material_product/"+bla,function(response){
            console.log(response);
            craftshop_products_materials=response;

        });

        jQuery("#toolbar").jqGrid({
            url:"<?php echo base_url(); ?>producto/get_material_product/"+bla,

            datatype: "json",
            autowidth:true,
            mtype:"POST",
            colNames:['id','nombre', 'cant.','price/u','medida'],
            colModel:[
                {name:'id_material',index:'id_material', sorttype:'int',width: 60},
                {name:'mname',index:'mname',width: 100},
                {name:'quantity',index:'quantity',width: 50},
                {name:'mprice',index:'mprice',width: 50},
                {name:'measurename',index:'measurename',width: 100}
            ],
            rowList : [20,30,50],
            loadonce:true,
            rownumbers: true,
            rownumWidth: 40,
            gridview: true,
            pager: '#ptoolbar',
            sortname: 'id_material',
            viewrecords: true,
            sortorder: "asc",
            caption: "Materiales",
            hidegrid: false,

            multiselect: true
        });

        jQuery("#toolbar").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});



        jQuery("#toolbar").jqGrid('navGrid', '#ptoolbar', { edit: true, add: true, del: true, search: false, refresh: true  },
            // edit options
            { mtype: 'GET',
                onclickSubmit: function(rp_ge, postdata) {
                    rp_ge.url = 'xxx.xxx/product/UpdateProduct?productId='+ postdata.productTable_id + '&active=' + postdata.active + '&description=' + postdata.description + '&features=' + postdata.features + '&name=' + postdata.name + '&specification=' + postdata.specification + '&thumbNail=' + postdata.thumbNail + '&viewImage=' + postdata.viewImage + '&solutionId=' + postdata.SolutionId + '&searchType=' + postdata.searchType + '&section=' + postdata.section + '&sectionSearch=' + postdata.sectionSearch;
                },
                serializeEditData: function (postdata) { return ""; },
                reloadAfterSubmit: true,
                closeOnEscape: true,
                closeAfterEdit: true
            },
            // add options
            {
                mtype: 'GET',
                onclickSubmit: function(rp_ge, postdata) {
                    rp_ge.url = 'http://xxx.xxx/product/AddProduct?productId='+ postdata.Id + '&active=' + postdata.active + '&description=' + postdata.description + '&features=' + postdata.features + '&name=' + postdata.name + '&specification=' + postdata.specification + '&thumbNail=' + postdata.thumbNail + '&viewImage=' + postdata.viewImage + '&solutionId=' + postdata.SolutionId + '&searchType=' + postdata.searchType + '&section=' + postdata.section + '&sectionSearch=' + postdata.sectionSearch;
                },
                serializeEditData: function (postdata) { return ""; },
                reloadAfterSubmit: true,
                closeOnEscape: true,
                closeAfterAdd: true

            },
            //del options
            {
                mtype: 'POST',
                onclickSubmit: function(rp_ge, postdata) {


                    rp_ge.url = "<?php echo base_url(); ?>producto/delete_material_product";
                },
                serializeDelData: function (postdata) {

                    var idsmaterials=[];
                    var ids=postdata['id'].split(",");

                    $.each(ids, function(kk, vk) {
                        var dataFromTheRow = jQuery('#toolbar').jqGrid ('getRowData', vk);
                        console.log(dataFromTheRow);
                        idsmaterials.push({id_material:dataFromTheRow['id_material'],id_producto:bla});
                    });

                    return {myids: idsmaterials}; },
                reloadAfterSubmit: true,
                closeOnEscape: true
            }
        );



        jQuery("#table_materials").jqGrid({
            url:"<?php echo base_url(); ?>producto/get_materials_craftshop/"+craftshop,
            datatype: "json",
            autowidth:true,
            mtype:"POST",
            colNames:['id','nombre', 'price/u','medida'],
            colModel:[
                {name:'id_material',index:'id_material', sorttype:'int',width: 60},
                {name:'mname',index:'mname',width: 100},
                {name:'mprice',index:'mprice',width: 50},
                {name:'measurename',index:'measurename',width: 100}
            ],
            rowList : [20,30,50],
            loadonce:true,
           // rownumbers: true,
          //  rownumWidth: 40,
            gridview: true,
            pager: '#toolbar_mat',
            sortname: 'id_material',
            viewrecords: true,
            sortorder: "asc",
            caption: "Materiales",
            hidegrid: false,
            multiselect: true
        });



        var lastsel2;
        jQuery("#table_materials-unidad").jqGrid({
            datatype: "local",
            autowidth:true,
            colNames:['id','nombre', 'price/u','medida','cant.'],

            colModel:[
                {name:'id_material',index:'id_material', sorttype:'int',width: 60},
                {name:'mname',index:'mname',width: 100},
                {name:'mprice',index:'mprice',width: 50},
                {name:'measurename',index:'measurename',width: 100},
                {name:'quantity',index:'quantity',width: 50,editable:true,'cellsubmit' : 'remote'}
            ],
            onSelectRow: function(id){
                if(id && id!==lastsel2){
                    jQuery('#table_materials-unidad').jqGrid('restoreRow',lastsel2);
                    jQuery('#table_materials-unidad').jqGrid('editRow',id,true);
                    lastsel2=id;
                }
            },
            editurl: "server.php",
            rowList : [20,30,50],
            loadonce:true,
            rownumbers: true,
            rownumWidth: 40,
            gridview: true,
            pager: '#toolbar-unidadt',
            sortname: 'id_material',
            viewrecords: true,
            sortorder: "asc",
            caption: "Materiales",
            hidegrid: false
           // multiselect: true
        });

        $("#closemodal2").click(function(){
            jQuery('#table_materials-unidad').jqGrid('clearGridData');


        });
        $("#closemodal").click(function(){
            jQuery('#table_materials-unidad').jqGrid('clearGridData');


    });

        $("#save_material").click(function(){
            var ids = jQuery("#table_materials-unidad").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++)
            {
                var rowId = ids[i];
                var rowData = jQuery('#table_materials-unidad').jqGrid ('getRowData', rowId);

                $("#toolbar").jqGrid('addRowData',$.jgrid.randId(), rowData);

                var datarowurl="<?=base_url()?>Producto/save_material_product/"+rowData['id_material']+"/"+bla+"/"+rowData['quantity'];
                console.log(datarowurl);
                $.post( datarowurl, function( data ) {
                    console.log(data);

                });

            }

        });

        $("#bedata").click(function(){

            jQuery('#table_materials-unidad').jqGrid('clearGridData');
            var s;
            s = jQuery("#table_materials").jqGrid('getGridParam','selarrrow');
            var grid = jQuery('#table_materials');


            var selRowIds = grid.jqGrid ('getGridParam', 'selarrrow');
            var columnasselecionadas = [];
            $.each(s, function(kk, vk) {
                var dataFromTheRow = jQuery('#table_materials').jqGrid ('getRowData', vk);

                console.log(craftshop_products_materials);
                if(pluckByName(craftshop_products_materials,dataFromTheRow)===true){

                }else{
                   columnasselecionadas.push(dataFromTheRow);
                    $("#table_materials-unidad").jqGrid('addRowData',$.jgrid.randId(), dataFromTheRow);

                }
/*
               var miau= $('#table_materials').jqGrid('getDataIDs');
                var miausize =miau.length;
                var nth_row_id = miau[miausize-1];

*/
            });



        });

        function pluckByName(inArr, name)
        {
            for (i = 0; i < inArr.length; i++ )
            {
                console.log(inArr[i]['id_material'] +" "+name['id_material']);

                if (inArr[i]['id_material'] == name['id_material'])
                {
                    console.log("esta");
                    return true;
                }else{


                }
            }
        }
        // Add responsive to jqGrid
        /*


         $("#table_list_2").jqGrid('setGridParam', {onSelectRow: function(rowid,iRow,iCol,e){alert('row clicked');}});
         */
        //     $("#table_list_2").jqGrid('setGridParam', {ondblClickRow: function(rowid,iRow,iCol,e){alert('double clicked');}});


        //   jQuery("#table_list_2").jqGrid('filterToolbar',options);

    });

</script>

<?php } ?>
<!--
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
</script>
-->
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>


</body>

</html>