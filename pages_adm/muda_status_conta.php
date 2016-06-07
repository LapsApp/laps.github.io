<?php
$id_conta = $_GET['id_conta'];
$id_cliente = $id_conta;
$paginaTitulo = 'Muda Status Conta';
include 'partes/head.php';
?>

<script>
    function onloadText() {
        document.getElementById("subject").value;
        if (document.getElementById("subject").value != '') {
            document.getElementById("subject").value = '';
        }
    }

    onloadText();
</script>

<body style="color: #000;" onload="onloadText()">
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../pages_adm/menu_adm.php?id=<?php echo $id_conta; ?>" class="logo">L<span class="lite">APS</span></a>
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i> ALTERA STATUS CONTA</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_adm/menu_adm.php?id=<?php echo $id_conta; ?>">INÍCIO</a></li>
                            <li><i class="icon_link"></i>ALTERA STATUS CONTA</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                ALTERA STATUS CONTA
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" method="post" action="../modelo/altera_status_conta.php">
                                        <div class="form-group ">

                                            <div class="col-lg-12">

                                                <?php
                                                $link = mysqli_connect("localhost", "root", "", "laps");
                                                if (!$link) {
                                                    die('Não foi possível conectar: ' . mysql_error());
                                                }

                                                $sql = "SELECT c.id_conta, 
                                                   ci.nome,
                                                   c.status,
                                                   ci.email
                                             from conta c 
                                                join cliente ci on c.id_cliente = ci.id_cliente
                                             WHERE c.id_conta = " . $_GET['id_conta'] . "
                                             ORDER BY c.id_conta, ci.cadastro";
                                                $result = $link->query($sql);
                                                $row = $result->fetch_assoc();
                                                if ($row["status"] == 0) {
                                                    ?>
                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form  method="post" action="../modelo/altera_status_conta.php">
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-2"> CONTA:</label>
                                                                    <div class="col-md-4">
                                                                        <input id="textinput" name="id_conta" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["id_conta"]; ?>" readonly> 
                                                                        <input id="textinput" name="status" placeholder="placeholder" class="form-control input-md" type="hidden" value="1" readonly> 

                                                                        <input id="textinput" name="email" placeholder="placeholder" class="form-control input-md" type="hidden" value="<?php echo $row["email"]; ?>" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-lg-2"> RESPONSÁVEL:</label>
                                                                    <div class="col-md-4">
                                                                        <input id="textinput" name="nome" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["nome"]; ?>" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="cname" class="control-label col-lg-2">MOTIVO PARA BLOQUEIO <span class="required">*</span></label>
                                                                    <div class="col-lg-4">
                                                                        <textarea class="form-control" id="subject" name="obs" required>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-offset-2 col-lg-10">
                                                                        <button class="btn btn-danger" type="submit">BLOQUEAR CONTA</button>
                                                                        <button class="btn btn-primary" type="button" onclick="window.location.href = '../pages_adm/listar_contas.php?id=<?php echo $id_conta; ?>'">VOLTAR</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>

                                                    <div class="panel-body">
                                                        <div class="form">
                                                            <form method="post" action="../modelo/altera_status_conta.php">
                                                                <div class="form-group ">
                                                                    <label class="control-label col-lg-2"> CONTA:</label>
                                                                    <div class="col-md-4">
                                                                        <input id="textinput" name="id_conta" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["id_conta"]; ?>" readonly> 
                                                                        <input id="textinput" name="status" placeholder="placeholder" class="form-control input-md" type="hidden" value="0" readonly> 

                                                                        <input id="textinput" name="email" placeholder="placeholder" class="form-control input-md" type="hidden" value="<?php echo $row["email"]; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="control-label col-lg-2"> RESPONSÁVEL:</label>
                                                                    <div class="col-md-4">
                                                                        <input id="textinput" name="nome" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["nome"]; ?>" readonly> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="cname" class="control-label col-lg-2">MOTIVO PARA DESBLOQUEIO <span class="required">*</span></label>
                                                                    <div class="col-lg-4">
                                                                        <textarea class="form-control" id="subject" 
                                                                                  name="obs" 
                                                                                  required
                                                                                  onfocus="if (this.value !== '')
                                                                                              this.value = '';"  
                                                                                  >
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-lg-offset-2 col-lg-10">
                                                                        <button class="btn btn-warning" type="submit">DESBLOQUEAR CONTA</button>
                                                                        <button class="btn btn-primary" type="button" onclick="window.location.href = '../pages_adm/listar_contas.php?id=<?php echo $id_conta; ?>'">VOLTAR</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } ?>
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
