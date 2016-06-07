<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Altera Dados';
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
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_document_alt"></i>MEUS DADOS</li>
                            <li><i class="fa fa-files-o"></i>ALTERAR DADOS</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                ALTERAR DADOS
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <?php
                                    //$r_cli=mysqli_query($link,"SELECT c.id_cliente, c.nome, c.cadastro, e.rua, e.num, e.complemento, e.cep, e.cidade, e.estado, e.bairro FROM cliente c INNER JOIN endereco e on c.id_cliente = e.id_cliente where c.id_cliente = ".$id_cliente.";");
                                    $r_cli = mysqli_query($link, "SELECT c.id_cliente, c.nome, c.email, c.rg, c.cel, c.cadastro FROM cliente c where c.id_cliente = " . $id_cliente . " ;");
                                    $data_cli = mysqli_fetch_assoc($r_cli);
                                    $r_end = mysqli_query($link, "SELECT e.rua, e.num, e.complemento, e.cep, e.cidade, e.estado, e.bairro FROM endereco e where e.id_cliente = " . $id_cliente . " ;");
                                    $data_end = mysqli_fetch_assoc($r_end);

                                    $situacao = $data_cli['cadastro'];
                                    ?>

                                    <form class="form-validate form-horizontal" method="post" action="../modelo/salva_altera_dados.php" enctype="multipart/form-data">					   					   
                                        <div class="form-group ">
                                            <input type="hidden" name='id_cliente' value="<?php echo $id_cliente; ?>">
                                            <label for="cname" class="control-label col-lg-1">Nome<span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" value="<?php echo $data_cli['nome']; ?>" name="nome" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-1">E-mail<span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" value="<?php echo $data_cli['email']; ?>" name="email" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-1" >Telefone<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" value="<?php echo $data_cli['cel']; ?>" name="cel" maxlength="9" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-1" >Rua<span class="required">*</span></label>
                                            <div class="col-lg-7">
                                                <input class="form-control" value="<?php echo $data_end['rua']; ?>" id="subject" name="rua" maxlength="20" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Numero<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" value="<?php echo $data_end['num']; ?>" name="numero" maxlength="8" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-1">Complemento</label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="complemento" value="<?php echo $data_end['complemento']; ?>" maxlength="20" type="text">
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Cep<span class="required">*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="cep" maxlength="8" value="<?php echo $data_end['cep']; ?>" type="text" required />
                                            </div>

                                            <label for="cname" class="control-label col-lg-1">Bairro <span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="bairro" value="<?php echo $data_end['bairro']; ?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-1">Cidade <span class="required">*</span></label>
                                            <div class="col-lg-3">
                                                <input class="form-control" id="subject" name="cidade" value="<?php echo $data_end['cidade']; ?>" type="text" required />
                                            </div>
                                            <label for="cname" class="control-label col-lg-1">Estado <span class="required" >*</span></label>
                                            <div class="col-lg-2">
                                                <input class="form-control" id="subject" name="estado" maxlength="2" value="<?php echo $data_end['estado']; ?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class='form-group'>
                                            <div class='col-lg-offset-1 col-lg-10'><br>
                                                <button class='btn btn-warning' type='submit'>SALVAR</button>
                                                <button class="btn btn-primary" type="button" onclick="window.location = './cadastro.php?id=<?php echo $id_cliente?>';">VOLTAR</button>
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

    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>
