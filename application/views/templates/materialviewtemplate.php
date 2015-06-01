<?php
/**
 * Created by PhpStorm.
 * User: Issam
 * Date: 21/05/2015
 * Time: 12:30
 */

$this->load->view('templates/header_backoffice',$header);

if(isset($menu)){
    $this->load->view('menu',$menu);
}else{
    $this->load->view('menu');
}


?>

    <div class="row">


        <div class="col-lg-12">
            <div class="panel blank-panel">

                <div class="panel-heading">
                    <!--      <div class="panel-title m-b-md"><h4>Blank Panel with icons tabs</h4></div>-->
                    <div class="panel-options">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-4">Mi material <i class="fa fa-laptop"></i></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-desktop"></i></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-signal"></i></a></li>
                            <li class=""><a data-toggle="tab" href="#tab-7"><i class="fa fa-bar-chart-o"></i></a></li>

                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="tab-content">
                        <div id="tab-4" class="tab-pane active">
                            <!-- inside tab -->
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Informacion de mi material: $NAME</small></h5>

                                        </div>
                                        <div class="ibox-content" style="height: 500px;">
                                            <form onsubmit="myFunction()" method="post" class="form-horizontal" action="<?=base_url()?>Materiales/save_material" enctype="multipart/form-data" >

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Name</label>

                                                        <div class="col-sm-10"><input type="text" name="name" class="form-control" value="<?=$material['name']?>"> </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Precio unidad</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="price" value="<?=$material['price']?>" class="form-control" data-mask="$9,999.99" placeholder="">
                                                            <span class="help-block">999.99€</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                    <input type="hidden" id="id_material" name="id_material" value="<?=$material['id_material']?>"/>
                                                    <input type="hidden" id="hiddeninput" name="hiddeninput" value=""/>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Medida</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <select data-placeholder="Medida" name="chose" class="chosen-select" style="width:350px;" tabindex="5">

                                                                    <?php foreach($measurements as $measuement){ ?>
                                                                        <option <?php if($measuement['is_selected']==1){?>  selected   <?php }else {?>  <?php }?> value="<?=$measuement['id_measurement']?>"><?=strtoupper($measuement['measurement_type']);?></option>
                                                                    <?php } ?>



                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="col-sm-4 col-sm-offset-2">

                                                            <button class="btn btn-primary" id="save" type="submit" >Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- finish inside tab -->
                        </div>

                        <div id="tab-5" class="tab-pane">
                            <strong>One morning, when Gregor Samsa.</strong>

                            <p>Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. </p>
                            <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. </p>
                        </div>
                        <div id="tab-6" class="tab-pane">
                            <strong>Lorem ipsum dolor sit</strong>

                            <p>Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game. Woven silk pyjamas exchanged for blue quartz. Brawny gods just </p>

                            <p>Who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee </p>
                        </div>
                        <div id="tab-7" class="tab-pane">
                            <strong>Aenean imperdiet</strong>

                            <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. </p>

                            <p>Quick zephyrs blow, vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<?php
$this->load->view('footer',$footer);
?>