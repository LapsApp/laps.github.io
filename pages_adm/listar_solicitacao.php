<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Listar Solicitações';
include 'partes/head.php';
?>
<style> 
    th, td { line-height: 3; }

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

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i>VERIFICAR SOLICITAÇÕES</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="menu_adm.php">INÍCIO</a></li>
                            <li><i class="icon_genius"></i>VERIFICAR SOLICITAÇÕES</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->              
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                VERIFICAR SOLICITAÇÕES
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="" method="post" action="../modelo/analise_pre_cadastro.php">
                                        <div class="form-group ">
                                            <div class="col-lg-10">
                                                <?php
                                                $link = mysqli_connect("localhost", "root", "", "laps");
                                                if (!$link) {
                                                    die('Não foi possível conectar: ' . mysql_error());
                                                }
                                                $sql = "SELECT id_cliente, nome, cpf, email, convite, cadastro, dt_solicitacao FROM Cliente WHERE cadastro='1' ORDER BY convite desc, dt_solicitacao";
                                                $result = $link->query($sql);

                                                echo "<table align='center' rules=rows width=1000><tr>
      <th><h4><b> *** </b></h4></th>
      <th><h4><b> ID </b></h4></th>
      <th><h4><b> NOME </b></h4></th>
      <th><h4><b> EMAIL </b></h4></th>
      <th><h4><b> CPF </b></h4></th>
      <th><h4><b> CONVIDADO </b></h4></th>
		  <th><h4><b> ENTRADA </b></h4></th>
		  <th><h4><b></b></h4></th></tr>";
                                                $i = 1;
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr><td>" . $i . "</td>
    	          <td>" . $row["id_cliente"] . "</td>
    			  <td>" . $row["nome"] . "</td>
    			  <td>" . $row["email"] . "</td>";

                                                        if ($row["cadastro"] == 1) {
                                                            echo "<td style='color:red'>" . $row["cpf"] . "</td>";
                                                        } else {
                                                            echo "<td>" . $row["cpf"] . "</td>";
                                                        }

                                                        if ($row["convite"] == 1) {
                                                            echo "<td style='color:black'>  <b>SIM</b> </td>";
                                                        } else {
                                                            echo"<td > NÃO </td>";
                                                        }

                                                        echo "<td>" . $row["dt_solicitacao"] . "</td>
    			  <td align='right'>
				  
				  <button class='btn btn-primary' name='aceita' value='" . $row["id_cliente"] . "' type='submit'>Aceitar</button>
				  <button class='btn btn-danger'  name='rejeita' value='" . $row["id_cliente"] . "' type='submit'>Rejeitar</button>
				  
				  </td></tr>";
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
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>
