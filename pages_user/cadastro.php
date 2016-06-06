<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Cadastro Usuário';
include 'partes/header.php';
$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
?>

<body style="color: #000;">
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <ul class="nav top-menu">
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <?php include 'partes/nav.php'; ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> CADASTRO</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INICIO</a></li>
                            <li><i class="icon_document_alt"></i>MEUS DADOS</li>
                            <li><i class="fa fa-files-o"></i>CADASTRO</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                CADASTRO
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <?php
                                    //$r_cli=mysqli_query($link,"SELECT c.id_cliente, c.nome, c.cadastro, e.rua, e.num, e.complemento, e.cep, e.cidade, e.estado, e.bairro FROM cliente c INNER JOIN endereco e on c.id_cliente = e.id_cliente where c.id_cliente = ".$id_cliente.";");
                                    $r_cli = mysqli_query($link, "SELECT c.id_cliente, c.nome, c.email, c.rg, c.cel, c.cadastro FROM cliente c where c.id_cliente = " . $id_cliente . " ;");
                                    $data_cli = mysqli_fetch_assoc($r_cli);
                                    $r_end = mysqli_query($link, "SELECT e.rua, e.num, e.complemento, e.cep, e.cidade, e.estado, e.bairro FROM endereco e where e.id_cliente = " . $id_cliente . " ;");
                                    $data_end = mysqli_fetch_assoc($r_end);
                                    $r_con = mysqli_query($link, "SELECT cc.renda FROM conta cc where cc.id_cliente = " . $id_cliente . " ;");
                                    $data_con = mysqli_fetch_assoc($r_con);
                                    $situacao = $data_cli['cadastro'];

                                    if ($situacao == 2)
                                        $desabilitar = false;
                                    else
                                        $desabilitar = true;
                                    ?>

                                    <form class="form-validate form-horizontal" method="post" action="../modelo/salva_finaliza_cadastro.php" enctype="multipart/form-data">
                                        <?php
                                        $pagina = "altera_dados.php?id=" . $id_cliente;
                                        if ($desabilitar) {
                                            echo "
									<div>
										<button class='btn btn-default' type='button' id='btnAlterar'>Alterar Dados</button>
									</div>
									";
                                        }
                                        ?>

                                        <div class="form-group"><br>
                                            <label for="ccomment" class="control-label col-lg-2">Foto</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../images/user_.png" name="frente" id="fotoimg" height="100" width="100" alt="Frente"> 
                                                <input name="foto" type="file" id="foto" <?php
                                                if ($desabilitar) {
                                                    echo "disabled";
                                                }
                                                ?> onchange="readURL(this, 'fotoimg');" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <input type="hidden" name='id_cliente' value="<?php echo $_GET['id']; ?>">
                                            <label for="cname" class="control-label col-lg-2">RG<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_cli['rg'] . "'";
                                                }
                                                ?> name="rg" maxlength="10" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-2">Renda Bruta R$<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_con['renda'] . "'";
                                                }
                                                ?> name="renda" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-2" >Telefone<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_cli['cel'] . "'";
                                                }
                                                ?> name="cel" maxlength="9" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Rua<span class="required">*</span></label>
                                            <div class="col-lg-6">
                                                <input class="form-control" <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['rua'] . "'";
                                                }
                                                ?> id="subject" name="rua" maxlength="20" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-2">Numero<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="numero" maxlength="8" type="text" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['num'] . "'";
                                                }
                                                ?> />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Complemento<span class="required">*</span></label>
                                            <div class="col-lg-6">
                                                <input class="form-control" id="subject" name="complemento" maxlength="20" type="text" <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['complemento'] . "'";
                                                }
                                                ?>/>
                                            </div>

                                            <label for="cname" class="control-label col-lg-2">Cep<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="cep" maxlength="8" type="text" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['cep'] . "'";
                                                }
                                                ?> />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Bairro <span class="required" >*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="bairro" type="text" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['bairro'] . "'";
                                                }
                                                ?> />
                                            </div>
                                            <label for="cname" class="control-label col-lg-2">Cidade <span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="cidade" type="text" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['cidade'] . "'";
                                                }
                                                ?> />
                                            </div>

                                            <label for="cname" class="control-label col-lg-2">Estado <span class="required" >*</span></label>
                                            <div class="col-lg-1">
                                                <input class="form-control" id="subject" name="estado" maxlength="2" type="text" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled value='" . $data_end['estado'] . "'";
                                                }
                                                ?> />
                                            </div>
                                        </div>

                                        <div class="form-group"><br>
                                            <label for="ccomment" class="control-label col-lg-2">Doc. Frente</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../images/card_user.png" name="frente" id="frenteimg" height="100" width="100" alt="Frente">
                                                <input name="frente" type="file" id="frente" onchange="readURL(this, 'frenteimg');" required <?php
                                                if ($desabilitar) {
                                                    echo "disabled";
                                                }
                                                ?> />
                                            </div>

                                            <label for="ccomment" class="control-label col-lg-2">Doc. Verso</label>
                                            <div class="col-lg-4">
                                                <img border="0" src="../images/card_user.png" name="verso" id="versoimg" height="100" width="100" alt="Verso">
                                                <input name="verso" type="file" id="verso" onchange="readURL(this, 'versoimg');" required <?php
                                                       if ($desabilitar) {
                                                           echo "disabled";
                                                       }
                                                       ?> />
                                            </div>
                                        </div>

                                        <?php
                                        if (!$desabilitar) {
                                            echo"
								  <div class='form-group'>
                                 <div class='col-lg-offset-2 col-lg-10'><br>
                                    <button class='btn btn-primary' type='submit'>ENVIAR</button>
                                    <button class='btn btn-default' type='button'>CANCELAR</button>
                                 </div>
                              </div>
							  ";
                                        }
                                        ?>



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

                                                    var btn = document.getElementById('btnAlterar');
                                                    btn.addEventListener('click', function () {
                                                        document.location.href = '<?php echo $pagina; ?>';
                                                    });

    </script>
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>
