<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Listar Contas';
include 'partes/head.php';
?>

<style>
    th, td { line-height: 3; padding: 5px 5px;}

    th{
        background: #F0F0F0;
    }

    tr:hover {
        background: #F0F0F0;
    }
</style>

<body style="color: #000;">
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">L<span class="lite">APS </span></a>
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
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i>CONTAS CADASTRADAS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="menu_adm.php">INÍCIO</a></li>
                            <li><i class="icon_document_alt"></i>CONTAS CADASTRADAS</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                CONTAS CADASTRADAS
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="    ">
                                        <div class="form-group ">
                                            <div class="col-lg-12">

                                                <?php
                                                $link = mysqli_connect("localhost", "root", "", "laps");
                                                if (!$link) {
                                                    die('Não foi possível conectar: ' . mysql_error());
                                                }

                                                $sql = "SELECT c.id_conta, 
                                                   ci.nome, 
                                                   c.limite, 
                                                   c.limitetotal,
                                                   c.status, 
                                                   c.comentario 
                                             from conta c 
                                                join cliente ci on c.id_cliente = ci.id_cliente
                                             ORDER BY c.id_conta, ci.cadastro";
                                                $result = $link->query($sql);

                                                echo "<table align='center' rules=rows width=1000 style='width: 100%;''><tr>
                                    <th style='padding: 20px;'><h4><b> *** </b></h4></th>
                                    <th style='padding: 20px;'><h4><b> CONTA </b></h4></th>
                                    <th style='padding: 20px;'><h4><b> RESPONSÁVEL </b></h4></th>
                                    <th style='padding: 20px;'><h4><b> LIMITE TOTAL</b></h4></th>
                                    <th style='padding: 20px;'><h4><b> LIMITE DISPONÍVEL </b></h4></th>
                                    <th style='padding: 20px;'><h4><b> STATUS </b></h4></th>
                                    <th style='padding: 20px;'><h4><b> OBS </b></h4><th></th></th>";
                                                $i = 1;
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr><td style='padding: 20px;'>" . $i . "</td>
                                          <td style='padding: 20px;'>" . $row["id_conta"] . "</td>
                                          <td style='padding: 20px;'>" . $row["nome"] . "</td>
                                          <td style='padding: 20px;'>" . $row["limitetotal"] . "</td>
                                           <td style='padding: 20px;'>" . $row["limite"] . "</td>
                                           ";
                                                        if ($row["status"] == 0) {
                                                            echo "<td style='color:blue; padding: 20px;' > ATIVO </td>";
                                                        } else {
                                                            echo"<td style='color:red;padding: 20px;' > BLOQUEADO </td>";
                                                        }
                                                        echo "<td style='padding: 20px;'>" . $row["comentario"] . "</td>";

                                                        if ($row["status"] == 0) {
                                                            echo "<td align='right' style='padding: 20px;'><a href='muda_status_conta.php?id_conta=" . $row["id_conta"] . "' class='btn btn-info' role='button'>BLOQUEAR</a></td></tr>";
                                                        } else {
                                                            echo "<td align='right' style='padding: 20px;'><a href='muda_status_conta.php?id_conta=" . $row["id_conta"] . "' class='btn btn-info' role='button'>DESBLOQUEAR</a></td></tr>";
                                                        }
                                                        $i++;
                                                    } echo "</table>";
                                                } else {
                                                    echo "0 results";
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div><!-- page end-->
            </section>
        </section> <!--main content end-->
    </section> <!-- container section end -->
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>

