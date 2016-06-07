<!DOCTYPE html>
<?
$id_cliente = $_GET['id'];
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>LAPS</title>

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet" />
    </head>

    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-10">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> FINALIZE SEU CADASTRO</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-files-o"></i>CADASTRO INICIAL</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-10">
                        <section class="panel">
                            <header class="panel-heading">
                                CADASTRO
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" method="post" action="../modelo/salva_finaliza_cadastro.php" enctype="multipart/form-data">
                                        <div class="form-group"><br>
                                            <label for="ccomment" class="control-label col-lg-2">Foto</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../img/user_.png" name="frente" id="fotoimg" height="100" width="100" alt="Frente">
                                                <input name="foto" type="file" id="foto" onchange="readURL(this, 'fotoimg');" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <input type="hidden" name='id_cliente' value="<?php echo $_GET['id']; ?>">
                                            <label for="cname" class="control-label col-lg-2">RG<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="rg" maxlength="10" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-2">Renda Bruta R$<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="renda" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-1">Telefone<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="cel" maxlength="9" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Logradouro<span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="rua" maxlength="30" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Numero<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="numero" maxlength="8" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">CEP<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="cep"  type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Bairro<span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="bairro" maxlength="30" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Complem.</label>
                                            <div class="col-lg-5">
                                                <input class="form-control" id="subject" name="complemento" maxlength="20" type="text"/>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Cidade <span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="cidade" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Estado<span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="estado" maxlength="2" type="text" required />
                                            </div>

                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Senha <span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="senha" maxlength="8" type="password" required />
                                            </div>
                                        </div>

                                        <div class="form-group"><br>
                                            <label for="ccomment" class="control-label col-lg-2">Doc. Frente</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../img/card_user.png" name="frente" id="frenteimg" height="100" width="100" alt="Frente">
                                                <input name="frente" type="file" id="frente" onchange="readURL(this, 'frenteimg');" required />
                                            </div>

                                            <label for="ccomment" class="control-label col-lg-2">Doc. Verso</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../img/card_user.png" name="verso" id="versoimg" height="100" width="100" alt="Verso">
                                                <input name="verso" type="file" id="verso" onchange="readURL(this, 'versoimg');" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10"><br>
                                                <button class="btn btn-primary" type="submit">ENVIAR</button>
                                                <button class="btn btn-default" type="button">CANCELAR</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
    <!-- container section end -->

    <!-- javascripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/form-validation-script.js"></script>
    <script src="../js/scripts.js"></script>

    <script language="JavaScript" type="text/javascript">
                                                    function readURL(input, id) {
                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function (e) {
                                                                $('#' + id)
                                                                        .attr('src', e.target.result);
                                                            }
                                                            reader.readAsDataURL(input.files[0]);
                                                        }
                                                    }
    </script>
</body>
</html>
