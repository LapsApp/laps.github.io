<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Menu Administrador';
include 'partes/head.php';
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
            <a href="../pages_adm/menu_adm.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS </span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu"><!--  search form start -->
                <ul class="nav top-menu">
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>
                </ul><!--  search form end -->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <?php include 'partes/nav.php'; ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i>MENU ADMINISTRADOR</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_adm/menu_adm.php?id=<?php echo $id_cliente; ?>">INICIO</a></li>
                            <li><i class="fa fa-laptop"></i>MENU</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="listar_cadastros.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box blue-bg">
                                <div class="count">
                                    <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                        die('Não foi possível conectar: ' . mysql_error());
                                    }

                                    $result = mysqli_query($link, "SELECT count(*) as total FROM Cliente WHERE cadastro='2' OR cadastro='3' OR cadastro='4'");
                                    $data = mysqli_fetch_assoc($result);

                                    if ($data['total'] > 0) {
                                        echo $data['total'];
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </div>
                                <div class="title">VERIFICAR CADASTROS</div>
                            </div></a><!--/.info-box-->
                    </div><!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="listar_solicitacao.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box brown-bg">
                                <div class="count">
                                    <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                        die('Não foi possível conectar: ' . mysql_error());
                                    }

                                    $result = mysqli_query($link, "SELECT count(*) as total FROM Cliente WHERE cadastro='0' OR cadastro='1'");
                                    $data = mysqli_fetch_assoc($result);

                                    if ($data['total'] > 0) {
                                        echo $data['total'];
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </div>
                                <div class="title">VERIFICAR SOLICITAÇÕES</div>
                            </div></a><!--/.info-box-->
                    </div><!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="menu_adm.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box dark-bg">
                                <div class="count">4.362</div>
                                <div class="title">OUTRO</div>
                            </div></a><!--/.info-box-->
                    </div><!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="menu_adm.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box green-bg">
                                <div class="count">1.426</div>
                                <div class="title">OUTRO</div>
                            </div></a><!--/.info-box-->
                    </div><!--/.col-->
                </div><!--/.row-->
            </section>
        </section>
    </section>
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>
