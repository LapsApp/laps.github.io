<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Menu Usuário';
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
            <a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS </span></a>
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
                        <h3 class="page-header"><i class="fa fa-laptop"></i>SEJA BEM-VINDO AO LAPS!</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <a href="../pages_user/convites.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box blue-bg">
                                <div class="count">
                                </div>
                                <div class="title"><img src="../img/icons/group2.png" alt="Envie convite a seus amigos!" width="60px">CONVIDE SEUS AMIGOS! </div>
                            </div>
                        </a><!--/.info-box-->
                    </div><!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="../pages_user/fatura.php?id=<?php echo $id_cliente; ?>">
                            <div class="info-box green-bg">
                                <div class="count">
                                    <?php
                                    $id_cliente = $_GET['id'];
                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                        die('Não foi possível conectar: ' . mysql_error());
                                    }

                                    $dt = date("d.m.y");
                                    $mesAtual = date("m");
                                    $anoAtual = date("Y");
                                    $result = mysqli_query($link, "SELECT SUM(cp.valor * cp.quantidade) as total FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND ct.id_cliente = " . $id_cliente);
                                    $data = mysqli_fetch_assoc($result);

                                    if ($data['total'] > 0) {
                                        echo "R$", round($data['total'], 4);
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </div>
                                <div class="title">SUA FATURA ATUAL</div>
                            </div><!--/.info-box-->
                    </div><!--/.col-->


                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <div class="count">
                                <?php
                                $id_cliente = $_GET['id'];
                                $link = mysqli_connect("localhost", "root", "", "laps");
                                if (!$link) {
                                    die('Não foi possível conectar: ' . mysql_error());
                                }

                                $result = mysqli_query($link, "SELECT limite as total FROM conta WHERE id_cliente = '" . $id_cliente . "' ");
                                $data = mysqli_fetch_assoc($result);

                                if ($data['total'] > 0) {
                                    echo "R$", $data['total'];
                                } else {
                                    echo "0";
                                }
                                ?>
                            </div>
                            <div class="title">SEU LIMITE DISPONÍVEL</div>
                        </div><!--/.info-box-->
                    </div><!--/.col-->

                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <div class="count">
                                <?php
                                $id_cliente = $_GET['id'];
                                $link = mysqli_connect("localhost", "root", "", "laps");
                                if (!$link) {
                                    die('Não foi possível conectar: ' . mysql_error());
                                }

                                $result = mysqli_query($link, "SELECT limitetotal as total FROM conta WHERE id_cliente = '" . $id_cliente . "' ");
                                $data = mysqli_fetch_assoc($result);

                                if ($data['total'] > 0) {
                                    echo "R$", $data['total'];
                                } else {
                                    echo "0";
                                }
                                ?>
                            </div>
                            <div class="title">SEU LIMITE TOTAL</div>
                        </div><!--/.info-box-->
                    </div><!--/.col-->
                </div><!--/.row-->
            </section>
        </section>
    </section>
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>
