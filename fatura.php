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
          ['Task', 'Hours per Day'],
          ['PRÓXIMAS FATURAS',     30],
          ['FATURA FECHADA', 34],
          ['FATURA ATUAL', 16],   
		      ['LIMITE DISPONÍVEL',  20]
        ]);

        var options = {
          title: '',
		  legend: 'none',
          pieHole: 0.4,
          slices: {  0: { color: '#FE9A2E',indexLabel: "Android" },
                     1: { color: '#FE2E2E' },
                     2: { color: '#58ACFA' },
                     3: { color: '#04B45F' },
          },
          };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
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
                  <h3 class="page-header"><i class="fa fa-files-o"></i> FATURAS</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="index.html">INÍCIO</a></li>
                     <li><i class="icon_document_alt"></i>FATURAS</li>
                  </ol>
               </div>
            </div>
            <!-- Form validations -->
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                     <header class="panel-heading">
                        FATURAS
                     </header>
                     <div class="panel-body">
					 <table width="1100" border="0" align="center"> 
						<tr>
						<td align="center">
            <b>FECHAMENTO DIA 15 E VENCIMENTO DIA 25</b>
                        <div id="donutchart" style="width: 400px; height: 400px;"></div>
                        
						</td>
						<td align="center">

						
						<div class="tabs-container">

						<input type="radio" name="tabs" class="tabs" id="tab3">
						<label for="tab3">MAR</label>
						<div>
						   <p>3</p>
						</div>
						
						<input type="radio" name="tabs" class="tabs" id="tab4">
						<label for="tab4">ABR</label>
						<div>
						  <p>
              <?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date = date('m');                                  

                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                       die('Não foi possível conectar: ' . mysql_error());
                                    }
                                    $id_cliente = $_GET['id'];
                                    $sql = "SELECT  cp.id_compra, cp.id_cartao, cp.parcelas, cp.valor, cp.quantidade, cp.categoria, cp.data, 
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    WHERE cp.data BETWEEN '2016/03/15' AND '2016/04/14' AND ct.id_cliente = ".$id_cliente;
                                   
                                    $result = $link->query($sql);

                                    echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> *** </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                    $i = 1;
                                    $valorfm=0;
                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     

                                          if($row["parcelas"]<=1){$row["parcelas"]=1;} //para pagamentos a vista aparecerem como 1
                                          $valor=number_format($row["valor"]/$row["parcelas"], 2, '.', ''); // dividir as parcelas
                                          if($row["parcelas"]<=1){$parcela=1;}else{$parcela=$date-$row["mes"];}
                                          


                                          echo "<tr><td>" .$i. "</td>
                                          <td>" . $row["data"]. "</td>  
                                          <td>" . $row["categoria"]. "</td>
                                          <td align='center'>" .$parcela."/". $row["parcelas"]. "</td>
                                          <td align='right'>R$" .$valor. "</td>";
                                          $i++;
                                          $valorfm= $valorfm+$valor;                                       

                                       } $valorfm=number_format($valorfm, 2, '.', '');
                                         echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$".$valorfm."
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></h4>";
                                    } else {
                                       echo "NENHUMA COMPRA REALIZADA";
                                    }

                                    ?>
              </p>
						</div>

						<input type="radio" name="tabs" class="tabs" id="tab5" checked>
						<label for="tab5">MAI</label>
						<div>
						   <p>
           <?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date = date('m');                                  

                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                       die('Não foi possível conectar: ' . mysql_error());
                                    }
                                    $id_cliente = $_GET['id'];
                                    $sql = "SELECT  cp.id_compra, cp.id_cartao, cp.parcelas, cp.valor, cp.quantidade, cp.categoria, cp.data, 
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND ct.id_cliente = ".$id_cliente;
                                   
                                    $result = $link->query($sql);

                                    echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> *** </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                    $i = 1;
                                    $valorfm=0;
                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     

                                          if($row["parcelas"]<=1){$row["parcelas"]=1;} //para pagamentos a vista aparecerem como 1
                                          $valor=number_format($row["valor"]/$row["parcelas"], 2, '.', ''); // dividir as parcelas
                                          if($row["parcelas"]<=1){$parcela=1;}else{$parcela=$date-$row["mes"];}
                                          


                                          echo "<tr><td>" .$i. "</td>
                                          <td>" . $row["data"]. "</td>  
                                          <td>" . $row["categoria"]. "</td>
                                          <td align='center'>" .$parcela."/". $row["parcelas"]. "</td>
                                          <td align='right'>R$" .$valor. "</td>";
                                          $i++;
                                          $valorfm= $valorfm+$valor;                                       

                                       } $valorfm=number_format($valorfm, 2, '.', '');
                                         echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$".$valorfm."
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></h4>";
                                    } else {
                                       echo "NENHUMA COMPRA REALIZADA";
                                    }

                                    ?>      
               </p>
						</div>
						
						<input type="radio" name="tabs" class="tabs" id="tab6">
						<label for="tab6">JUN</label>
						<div>
						  <p>6</p>
						</div>

						<input type="radio" name="tabs" class="tabs" id="tab7">
						<label for="tab7">JUL</label>
						<div>
						   <p>7</p>
						</div>
						
						<input type="radio" name="tabs" class="tabs" id="tab8">
						<label for="tab8">AGO</label>
						<div>
						  <p>8</p>
						</div>

						<input type="radio" name="tabs" class="tabs" id="tab9">
						<label for="tab9">SET</label>
						<div>
						   <p>9</p>
						</div>
						
						<input type="radio" name="tabs" class="tabs" id="tab10">
						<label for="tab10">OUT</label>
						<div>
						  <p>10</p>
						</div>

						<input type="radio" name="tabs" class="tabs" id="tab11">
						<label for="tab11">NOV</label>
						<div>
						  <p>11</p>
						</div>

						<input type="radio" name="tabs" class="tabs" id="tab12">
						<label for="tab12">DEZ</label>
						<div>
						   <p>12</p>
						</div>

            <input type="radio" name="tabs" class="tabs" id="tab1">
            <label for="tab1">JAN</label>
            <div>
              <p>1</p>
            </div>

            <input type="radio" name="tabs" class="tabs" id="tab2">
            <label for="tab2">FEV</label>
            <div>
              <p>2</p>
            </div>
						</div>  
						
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
