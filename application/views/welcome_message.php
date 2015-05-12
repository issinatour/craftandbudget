<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <!--<link rel="icon" href="<?=base_url()?>landing/img/favicon.ico">-->

    <title>GuestByDay | Aprovecha todas las posibilidades de ingresos de tu hotel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>landing/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?=base_url()?>landing/css/animate.min.css" rel="stylesheet">

    <link href="<?=base_url()?>landing/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>landing/css/style.css" rel="stylesheet">
</head>
<body id="page-top">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?=site_url("welcome")?>"><img src="<?=base_url()?>landing/img/logo.png">GuestByDay</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a class="page-scroll" href="#page-top">Home</a></li> -->
                    <li><a class="page-scroll" href="#que-es">¿Qué es?</a></li>
                    <li><a class="page-scroll" href="#beneficios">Beneficios</a></li>
                    <li><a class="page-scroll" href="#aplicacion">App</a></li>
                    <li><a class="page-scroll" href="#plataforma">Plataforma</a></li>
                    <li><a class="page-scroll" href="#contacto">Contacto</a></li>
                    <li><a href="<?=site_url("welcome/login")?>" class="btn-login"><i class="fa fa-user"></i> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel slide carousel-fade" data-ride="carousel">
    <!-- <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol> -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="row">
                    <div class="carousel-caption col-sm-6">
                        <div class="carousel-caption-content">
                            <h1>NUEVAS FUENTES DE INGRESOS PARA TU HOTEL</h1>
                            <p>DIFRUTAR DE LOS MEJORES HOTELES ES AHORA MÁS FACIL QUE NUNCA. LOS MEJORES PLANES Y SERVICIOS HOTELEROS SE ENCUENTRAN EN GuestByDay.com Y GuestByDay App.</p>
                            <p>
                                <a class="btn btn-lg btn-primary page-scroll" href="#contacto" role="button">+ INFO</a>
                            </p>
                        </div>

                    </div>
                    <div class="carousel-image wow fadeInUp col-sm-6 hand">
                        <img src="<?=base_url()?>landing/img/bg_pool_hand.png" alt="mobile app">
                    </div>
                </div>
            </div>
            <div class="carousel-foot">
                <h2>Próximamente podrás aprovechar todas las fuentes de ingresos de tu hotel.</h2>
            </div>
            <div class="header-back one"></div>
        </div>
        <div class="item">
            <div class="container">
                <div class="row">
                    <div class="carousel-caption col-sm-6">
                        <div class="carousel-caption-content">
                            <h1>¿QUIÉN DIJO QUE LOS HOTELES SON PARA DORMIR?</h1>
                            <p>LA MEJOR MANERA DE OFRECER PLANES Y SERVICIOS. CAPTA CLIENTES DE FORMA FÁCIL Y RÁPIDA Y SACA LA MÁXIMA RENTABILIDAD A TU HOTEL.</p>
                            <p>
                                <a class="btn btn-lg btn-primary page-scroll" href="#contacto" role="button">+ INFO</a>
                            </p>
                        </div>

                    </div>
                    <div class="carousel-image wow fadeInLeft col-sm-6 desktop">
                        <img src="<?=base_url()?>landing/img/desktop02x2.png" alt="mobile app">
                    </div>
                </div>
            </div>
            <div class="carousel-foot">
                <h2>Próximamente podrás aprovechar todas las fuentes de ingresos de tu hotel.</h2>
            </div>
            <div class="header-back one"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section id="que-es" class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="turquoise">¿Qué es GuestByDay?</span></h1>
            <h2 class="doble-bottom"><span class="navy">El portal de intermediación y selección de productos turísticos, que te ayudara a captar nuevos clientes, ofreciéndoles experiencias épicas gracias a las instalaciones y servicios de tu hotel.</span></h2>
            <p>GuestByDay se encarga de seleccionar las mejores experiencias clasificándolas por categoría y destino. Ofreciendo a los clientes que no están alojados en el hotel la oportunidad de disfrutar de un día épico en las mejores instalaciones.</p>
        </div>
    </div>
</section>

<section id="beneficios" class="features features-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1><span class="white">Beneficios</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center wow fadeInLeft">
                <div>
                    <i class="fa fa-line-chart features-icon"></i>
                    <h2>Rentabilidad</h2>
                    <p>Promocionamos servicios y planes de ocio en tu hotel, provocando que tu piscina, spa o cualquier otro servicio atractivo de tu hotel genere ingresos por si mismo.</p>
                </div>
                <div class="m-t-lg">
                    <i class="fa fa-eye features-icon"></i>
                    <h2>Mayor visibilidad</h2>
                    <p>No hay mejor reclamo que dejar a un cliente satisfecho. Cada cliente dispuesto a dedicar un tiempo en tu hotel es un potencial cliente para el futuro. !No dejes pasar la oportunidad de demostrar que merece la pena alojarse en tu hotel!</p>
                </div>
            </div>
            <div class="col-md-6 text-center wow zoomIn">
                <img src="<?=base_url()?>landing/img/drawx2.png" alt="dashboard" class="img-responsive">
            </div>
            <div class="col-md-3 text-center wow fadeInRight">
                <div>
                    <i class="fa fa-desktop features-icon"></i>
                    <h2>Registro gratuito</h2>
                    <p>Acceder a nuestra plataforma para promocionar tus servicios no tendrá ningún coste. Podrás acceder a tu perfil las 24 horas del día para personalizar y mejorar los servicios que ofreces.</p>
                </div>
                <div class="m-t-lg">
                    <i class="fa fa-file-text features-icon"></i>
                    <h2>Informes personalizados</h2>
                    <p>Podrás conseguir informes personalizados de tus clientes, el uso de tus servicios y conocer cuales son los productos mas vendidos, el precio medio y las ofertas de otros hoteles en tu zona.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="aplicacion" class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="turquoise">App</span></h1>
            <p>Aplicación de descarga gratuita, que permitirá a los clientes encontrar y reservar las mejores ofertas de ocio y servicios de tu hotel, clasificadas por categorías y localización. ¡Los mejores planes al alcance de su mano!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 features-text wow fadeInLeft">
            <small>CÓMO FUNCIONA</small>
            <h2>App iOS / Android</h2>
            <p>Los usuarios podrán buscar y elegir los mejores planes a través de nuestra App iOS y Android, además de a través de nuestra web.</p>
            <p>Una vez dentro de la aplicación podrá utilizar los diferentes filtros de categorías y localización para encontrar rápidamente la experiencia que más se adapte a sus gustos. Una vez encontrado el servicio perfecto, podrá realizar su reserva en sólo unos pocos clicks.</p>
            <p>A continuación, tanto el hotel como el cliente recibirán en su email la confirmación de la reserva. ¡A partir de este momento sólo faltará disfrutar en tu hotel de un día épico!</p>
            <a href="#contacto" class="btn btn-primary page-scroll">+ INFO</a>
        </div>
        <div class="col-lg-6 text-right wow fadeInRight">
            <img src="<?=base_url()?>landing/img/mobilex2.png" alt="dashboard" class="img-responsive pull-right">
        </div>
    </div>
</section>

<section id="plataforma" class="gray-section features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Gestor de ofertas</h1>
                <p>El hotel contará con una sencilla plataforma que le facilitara la carga y gestión de los servicios ofrecidos. Además, cualquier oferta puede convertirse una promoción flash con descuento en sólo unos segundos, para conseguir atraer a todo el público de la zona.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 text-right wow fadeInLeft">
                <img src="<?=base_url()?>/landing/img/desktop02x2.png" alt="dashboard" class="img-responsive pull-right">
            </div>
            <div class="col-lg-6 features-text wow fadeInRight">
                <small>CÓMO FUNCIONA</small>
                <h2>Plataforma</h2>
                <p>Cuando su hotel este dado de alta. Podrá comenzar a personalizar las experiencias que quiera ofrecer. Una cena romántica, un desayuno, una cata de vinos o una sesión de Spa. Tú pones los limites…</p>
                <p>Una vez personalizada la experiencia, podrás elegir qué días promocionarla y conocer el tipo de comisión que le corresponde. Cuando el cliente contrate tus servicios, recibirás un email de confirmación con todos los datos de la reserva.</p>
                <p>Además, contaras con la posibilidad de publicar ofertas de última hora y hacérselas más visibles que nunca para los clientes cercanos. También tendrás un modulo donde podrás obtener informes personalizados, con los resultados de tu hotel, tus clientes, su evolución y destalles de cartera totalmente gratuitos.</p>
                <a href="#contacto" class="btn btn-primary page-scroll">+ INFO</a>
            </div>
        </div>
    </div>
</section>

<section id="contacto" class="navy-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>¿Necesitas más información?</h1>
                <p>Indícanos cómo podemos ponernos en contacto contigo y te ayudaremos en lo que podamos.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="contact-form" method="post" action="<?=site_url("welcome/contactForm")?>">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input class="form-control" id="name" name="name" type="text" required placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail*</label>
                        <input class="form-control" id="email" name="email" type="email" required placeholder="Tu email">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje*</label>
                        <textarea class="form-control" id="body" name="body" required placeholder="Tu mensaje"></textarea>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-border">Enviar</button></div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <span class="footer-brand"><img src="<?=base_url()?>landing/img/logo.png" width="80"><br>GuestByDay</span>
            </div>
        </div>
    </div>
</section>

<script src="<?=base_url()?>landing/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?=base_url()?>landing/js/pace.min.js"></script>
<script src="<?=base_url()?>landing/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>landing/js/classie.js"></script>
<script src="<?=base_url()?>landing/js/cbpAnimatedHeader.js"></script>
<script src="<?=base_url()?>landing/js/wow.min.js"></script>
<script src="<?=base_url()?>landing/js/inspinia.js"></script>
</body>
</html>
