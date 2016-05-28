<!DOCTYPE html>
<?php $id_cliente = $_GET['id']; ?> 
<html lang="pt-br">
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
   
   <script src="js/loader.js"></script>
   <script >
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['CATEGORIAS', 'GASTOS'],
          ['ALIMENTAÇÃO', 100], ['TECNOLOGIA', 100], ['LIVRARIA', 100],
          ['ESPORTE', 100], ['LAZER', 100], ['CALÇADOS', 100],
          ['VESTUÁRIO', 100], ['ELETRODOMÉSTICO', 100]       
        ]);

        var options = {
          title: '',
          legend: '',
          legend: {position: 'top', alignment: 'center', maxLines: 2},
          is3D: true,
          slices: {
            0: { color: '#FF9999' },
            1: { color: '#CCFFE5' },
            2: { color: '#FFE5CC' },
            3: { color: '#CCFF99' },
            4: { color: '#C6E2FF' },
            5: { color: '#EEDD82' },
            6: { color: '#FFBBFF' },
            7: { color: '#CFCFCF' }
          }
          
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  
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
         <a href="index.php" class="logo">L<span class="lite">APS</span></a>
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
      <aside>
         <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
               <li class="active">
                  <a class="" href="menu_usuario.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_house_alt"></i>
                     <span>INICIO</span>
                  </a>
               </li>
               <li>
                  <a class="" href="cadastro.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_document_alt"></i>
                     <span>MEUS DADOS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="convites.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_link"></i>
                     <span>INDICADOS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="suporte.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_mail_alt"></i>
                     <span>SUPORTE</span>
                  </a>
               </li>
               <li class="">
                  <a class="" href="starter.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_documents_alt"></i>
                     <span>LISTA DE<br>COMPRAS</span>
                  </a>
               </li>
               <li class="">
                  <a class="" href="consumo_categoria.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_piechart"></i>
                     <span>CONSUMO POR<br>CATEGORIAS</span>
                  </a>
               </li>
               <li class="">
                  <a class="" href="fatura.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_documents_alt"></i>
                     <span>DETALHAR<br>FATURAS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="bloqueioUsuario.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_blocked"></i>
                     <span>BLOQUEIO</span>
                  </a>
               </li>
               <!--<li class="">
                  <a class="">
                     <i class="icon_table"></i>
                     <span>XXXXX</span>
                  </a>
               </li>
               <li class="">
                  <a class="">
                     <i class="icon_documents_alt"></i>
                     <span>XXXXX</span>
                  </a>
               </li>-->
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
                  <h3 class="page-header"><i class="fa fa-files-o"></i> CONSUMO POR CATEGORIAS</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="index.html">INÍCIO</a></li>
                     <li><i class="icon_document_alt"></i>CONSUMO POR CATEGORIAS</li>
                  </ol>
               </div>
            </div>
            <!-- Form validations -->
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                     <header class="panel-heading">
                        CONSUMO POR CATEGORIAS
                     </header>
                     <div class="panel-body">
					 <table width="1100" border="0" align="center"> 
						<tr>
						<td align="center">
            <b>CONSUMO POR CATEGORIAS</b>
                        <div id="piechart" style="width: 900px; height: 500px;"></div></div>
                        
						</td>
						</tr>
					 </table>
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

   <!-- javascripts -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
   <script src="js/form-validation-script.js"></script>
   <script src="js/scripts.js"></script>
   <script type="text/javascript" src="js/canvasjs.min.js"></script>
   <?php
      include ('modelo/funcoesJS.php');
      include ('modelo/TesteMen.php');
   ?>
   <style>
  .tabs-container {
  position: relative;
  height: 360px;
  max-width: 100%;
  margin: 0 auto;
}
.tabs-container p{
  margin: 0;
  padding: 0;
}
.tabs-container:after {
  content: '.';
  display: block;
  clear: both;
  height: 0;
  font-size: 0;
  line-height: 0;
  visibility: none;
}
input.tabs {
  display: none;
}
input.tabs + label {
  line-height: 10px;
  padding: 14px 14px 14px 14px;
  float: left;
  align: left;
  background: #444;
  color: #fff;
  cursor: pointer;
  transition: background ease-in-out .3s;
}
input.tabs:checked + label {
  color: #000;
  background: #eee;
}

input.tabs + label + div {
  width: 98%;
  opacity: 0;
  position: absolute;
  background: #eee;
  top: 40px;
  left: 0;
  height: 300px;
  padding: 10px;
  z-index: -1;
  transition: opacity ease-in-out .3s;
}
input.tabs:checked + label + div {
  opacity: 1;
  z-index: 1000;
}
   </style>
</body>
</html>
