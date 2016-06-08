
<?php header('Content-Type: text/html; charset=iso-8859-1');
$id_cliente = $_GET['id'];
$paginaTitulo = 'Suporte';
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
        <?php include 'partes/nav.php'; ?>
        <!--sidebar start-->

        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> INDICADOS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" >INÍCIO</a></li>
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
                                    <div class="form-group">
                                        <div class="col-lg-offset-0 col-lg-2">
                                            <button class="btn btn-primary" type="submit" onclick="window.location = '../pages_user/suporte_msg.php?id=<?php echo $id_cliente; ?>'">CRIAR NOVA MENSAGEM</button>
                                        </div>
                                    </div>
                                    </form>
                                    <br><br><br>
                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            <?php
                                            $link = mysqli_connect("localhost", "root", "", "laps");
                                            
                                            if (!$link) {
                                                die('Não foi possível conectar: ' . mysql_error());
                                            }

                                            $sql = "SELECT id_msg, id_cliente, assunto, dt_msg, mensagem FROM suporte WHERE id_cliente = '" . $id_cliente . "' ORDER BY dt_msg DESC";
                                            $result = $link->query($sql);

                                            $i = 1;
                                            if ($result->num_rows > 0) {
                                                echo "<table align='center' rules=rows width=1000 <tr>
                                        <th><h4><b> DATA </b></h4></th>
                                        <th><h4><b> ASSUNTO </b></h4></th>
                                        <th><h4><b> MENSAGEM </b></h4></th>
                                        </tr>";
                                                while ($row = $result->fetch_assoc()) {
                                                    $originalDate = $row["dt_msg"];
                                                    $data = date("d/m/Y h:i:s", strtotime($originalDate));
                                                    echo "<tr><td width='200'>" . $data . "</td>
                                                <td width='300'><b>" . $row["assunto"] . "</b></td>
                                                <td width='500'><br>" . $row["mensagem"] . "<br><br></td>
                                                </tr>";
                                                    $i++;
                                                } echo "<tr></table>";
                                            } else {
                                                echo "SEM MENSAGENS";
                                            }
                                            ?>
                                            <br>
                                        </div>
                                    </div>
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

