
<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>
</div>

<!-- Mainly scripts -->
<script src="<?=base_url()?>js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>js/bootstrap.min.js"></script>
<script src="<?=base_url()?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<?php
if(isset($script)) {
    foreach($script as $jsfile) {
        ?>
        <script  src="<?= base_url().$jsfile?>"></script>

    <?php
    }
}
?>



</body>

</html>