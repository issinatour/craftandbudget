
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


        var config = {

            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    });
</script>
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