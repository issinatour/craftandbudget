<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$title?></title>


    <link href="<?=base_url()?>assets/backtheme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/backtheme/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/backtheme/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/backtheme/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/backtheme/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <?php
    if(isset($css)) {
        foreach($css as $cssfile) {
            ?>
    <link href="<?= base_url().'assets/backtheme/'.$cssfile?>"  rel="stylesheet" >

        <?php
        }
    }
    ?>
    <link href="<?=base_url()?>assets/backtheme/css/plugins/fileinput/fileinput.css" rel="stylesheet"  />
    <link href="<?=base_url()?>assets/backtheme/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/backtheme/css/style.css" rel="stylesheet">





</head>