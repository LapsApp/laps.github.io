<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Suporte Mensagem';
include 'partes/header.php';
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i> INDICADOS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_mail_alt"></i>SUPORTE</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                SUPORTE
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" method="post" action="../modelo/envia_msg.php?id=<?php echo $id_cliente; ?>">
                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Assunto<span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <input class="form-control" id="subject" name="assunto" type="mail" style="text-transform:uppercase" minlength="5" maxlength="20" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cname" class="control-label col-lg-2">Mensagem<span class="required">*</span></label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" rows="4"  id="subject" name="mensagem" minlength="5" maxlength="320" required /></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit">ENVIAR MENSAGEM</button>
                                                <button class="btn btn-danger" type="button" onclick="window.location = './suporte.php?id=<?php echo $id_cliente ?>';">CANCELAR</button>
                                                <br><br>
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

    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>