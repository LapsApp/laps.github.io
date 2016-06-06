<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Bloqueio Usuário';
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
            <a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS </span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i>BLOQUEIO</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_blocked"></i>BLOQUEIO</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->              
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                BLOQUEIO
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="../modelo/analise_bloqueio_usuario.php">
                                        <div class="form-group ">
                                            <div class="col-lg-10">
                                                <table id="demo" width="30%">
                                                    <thead>
                                                        <tr>
                                                            <th>Conta</th>
                                                            <th>Status</th>
                                                            <th></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = mysqli_query($link, "SELECT DISTINCT cc.id_conta, (case cc.status when 0 then 'Ativa' when 1 then 'Bloqueada' end) status_conta, status FROM conta cc where id_cliente = " . $id_cliente . ";");
                                                        $total = 0;
                                                        while ($data = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $data["id_conta"] ?></td>
                                                                <td><?php echo $data["status_conta"] ?></td>
                                                                <?php
                                                                if ($data["status"] == 0) {
                                                                    echo"<td align='right'>
                                                <button class='btn btn-primary' name='bloqueia' value='" . $data["id_conta"] . "' type='submit'>Bloquear</button>
                                                </td>";
                                                                }
                                                                //Não é pra ativar
                                                                /*
                                                                  else
                                                                  {
                                                                  echo"
                                                                  <td align='right'>
                                                                  <button class='btn btn-primary' name='ativa' value='".$data["id_conta"]."' type='submit'>Ativar</button>
                                                                  </td>";
                                                                  }
                                                                 */
                                                                ?>
                                                            </tr>
                                                        <?php } // FIM WHILE COMPRAS  ?>
                                                    </tbody>
                                                </table>
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

    <style>
        th, td {
            line-height: 3;
        }
        th{
            background: #F0F0F0;
        }
        tr:hover {
            background: #F0F0F0;
        }
    </style>

    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>

