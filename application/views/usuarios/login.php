
<body class="gray-bg">

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Bienvenido a craftandbudget</h2>

            <p>

            </p>


        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" method="post" action="<?=base_url()?>usuarios/do_login">
                    <div class="form-group">
                        <input name="user" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input name="pass" type="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="#">
                        <small>Contraseña olvidada?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>¿Necesitas una cuenta?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="register">Crear cuenta</a>
                </form>
                <p class="m-t">

                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright Craftandbudget
        </div>
        <div class="col-md-6 text-right">
            <small>© 2014-2015</small>
        </div>
    </div>
</div>

</body>
