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
                            <li class="active"><a data-toggle="tab" href="#tab-4">Mi producto <i class="fa fa-laptop"></i></a></li>
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