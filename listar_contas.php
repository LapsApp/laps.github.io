<!DOCTYPE html>
<?
$id_cliente = $_GET['id'];
?>
<html lang="en">
<style>
th, td { line-height: 3; }

th{
   background: #F0F0F0;
}

tr:hover {
   background: #F0F0F0;
}
</style>
<head>
   <meta charset="utf-8">
   <link rel="shortcut icon" href="img/favicon.png">

   <title>LAPS</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/bootstrap-theme.css" rel="stylesheet">
   <link href="css/elegant-icons-style.css" rel="stylesheet" />
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet">
   <link href="css/style-responsive.css" rel="stylesheet" />
</head>

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
      <aside>
         <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
               <li class="active">
                  <a class="" href="menu_adm.php">
                     <i class="icon_house_alt"></i>
                     <span>INICIO</span>
                  </a>
               </li>
               <li>
                  <a class="" href="listar_cadastros.php">
                     <i class="icon_documents_alt"></i>
                     <span>VERIFICAR<br>CADASTROS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="listar_solicitacao.php">
                     <i class="icon_documents_alt"></i>
                     <span>VERIFICAR<br>SOLICITAÇÕES</span>
                  </a>
               <li class="" >
                  <a class="">
                     <i class="icon_mail_alt"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
               <li class="" >
                  <a class="">
                     <i class="icon_desktop"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
               <li>
                  <a class="">
                     <i class="icon_piechart"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
               <li class="" >
                  <a class="">
                     <i class="icon_table"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
               <li class="" >
                  <a class="">
                     <i class="icon_documents_alt"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
            </ul>
            <!-- sidebar menu end-->
         </div>
      </aside>
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
                                                   c.saldo,
                                                   c.status, 
                                                   c.comentario 
                                             from conta c 
                                                join cliente ci on c.id_cliente = ci.id_cliente
                                             ORDER BY c.id_conta, ci.cadastro";
                                    $result = $link->query($sql);

                                    echo "<table align='center' rules=rows width=1000 style='width: 100%;''><tr>
                                    <th><h4><b> *** </b></h4></th>
                                    <th><h4><b> CONTA </b></h4></th>
                                    <th><h4><b> RESPONSÁVEL </b></h4></th>
                                    <th><h4><b> LIMITE </b></h4></th>
                                    <th><h4><b> SALDO </b></h4></th>
                                    <th><h4><b> STATUS </b></h4></th>
                                    <th><h4><b> OBS </b></h4><th></th></th>";
                                    $i = 1;
                                    if ($result->num_rows > 0) {
                                       while($row = $result->fetch_assoc()) {
                                          echo "<tr><td>" .$i. "</td>
                                          <td>" . $row["id_conta"]. "</td>
                                          <td>" . $row["nome"]. "</td>
                                          <td>" . $row["limite"]. "</td>
                                           <td>" . $row["saldo"]. "</td>
                                           ";
                                          if($row["status"]==0)
                                          { 
                                             echo "<td style='color:blue' > ATIVO </td>";
                                          }else
                                          { 
                                             echo"<td style='color:red' > BLOQUEADO </td>";
                                          }
                                          echo  "<td>" . $row["comentario"]. "</td>";

                                          if($row["status"] == 0)
                                          {
                                             echo "<td align='right'><a href='muda_status_conta.php?id_conta=".$row["id_conta"]."' class='btn btn-info' role='button'>BLOQUEAR</a></td></tr>";
                                          }else
                                          {
                                             echo "<td align='right'><a href='muda_status_conta.php?id_conta=".$row["id_conta"]."' class='btn btn-info' role='button'>DESBLOQUEAR</a></td></tr>";
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

   <!-- javascripts -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <script src="js/form-validation-script.js"></script>
   <script src="js/scripts.js"></script>
   <?php
      include ('modelo/funcoesJS.php');
      include ('modelo/TesteMen.php');
   ?>
</body>
</html>
