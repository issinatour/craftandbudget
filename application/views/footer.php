
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>
</div>


<script src="<?=base_url()?>assets/backtheme/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/pace/pace.min.js"></script>


<?php
if(isset($script)) {
    foreach($script as $jsfile) {
        ?>
        <script  src="<?= base_url().'assets/backtheme/'.$jsfile?>"></script>

    <?php
    }
}
?>

<script src="<?=base_url()?>assets/backtheme/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>



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