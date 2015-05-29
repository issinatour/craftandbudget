<body class="gray-bg">

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Registro en Craftandbudget</h5>

                </div>
                <div class="ibox-content">
                    <h2>
                       Registrate aqui!
                    </h2>
                    <p>
                     Registra tu cuenta y tu tienda
                    </p>

                    <form id="form" method="post" action="<?=base_url()?>Usuarios/register_save" class="wizard-big">
                        <h1>Mi cuenta</h1>
                        <fieldset>
                            <h2>Informacion de tu cuenta</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Usuario *</label>
                                        <input id="userName" name="user" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input id="userName" name="email" type="email" class="form-control required">
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Contraseña *</label>
                                    <input id="password" name="pass" type="password" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar Contraseña *</label>
                                    <input id="confirm" name="confirm" type="password" class="form-control required">
                                </div>
                                    </div>
                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <h1>Mi craftshop</h1>
                        <fieldset>
                            <h2>Mi tienda</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre*</label>
                                        <input id="name" name="shopname" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripcion*</label>
                                        <input id="surname" name="descriptionshop" type="text" class="form-control required">
                                    </div>
                                </div>

                            </div>
                        </fieldset>




                        <h1>Fin</h1>
                        <fieldset>
                            <h2>Terminos y condiciones</h2>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">Acepto los terminos y condiciones</label>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="<?=base_url()?>assets/backtheme/js/jquery-2.1.1.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/backtheme/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/backtheme/js/plugins/pace/pace.min.js"></script>

<!-- Steps -->
<script src="<?=base_url()?>assets/backtheme/js/plugins/staps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="<?=base_url()?>assets/backtheme/js/plugins/validate/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("siguiente");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("anterior");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });
</script>
</body>

</html>