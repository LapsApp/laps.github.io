<?php
   $link = mysqli_connect("localhost", "root", "", "laps");
   if (!$link) {
          die('Não foi possível conectar: ' . mysql_error());
      }
      $id_cliente = $_GET['id']; 
   ?>
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
         <a href="menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS</span></a>
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
               <li>
                  <a class="">
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
                  <h3 class="page-header"><i class="fa fa-files-o"></i> VERIFICAR COMPRAS</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                     <li><i class="icon_documents_alt"></i>VERIFICAR COMPRAS</li>
                  </ol>
               </div>
            </div>
            <!-- Form validations -->
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                        <header class="panel-heading">
                           VERIFICAR COMPRAS
                        </header>
                        <div class="panel-body">
                           <div class="form">
                              <form class="form-validate form-horizontal" id="feedback_form" method="post" action="    ">
                                 <div class="form-group ">
                                    <div class="col-lg-12">
                                       <table id="demo" style="width: 100%;">
                                          <thead>
                                             <tr>
                                                <th>Compra</th>
                                                <th>Categoria</th>
                                                <th>Data</th>
                                                <th>Valor</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                                //$id_cliente = 22; // remover depois de criar o link, GET no inicio da pagina
                                                $r_cli=mysqli_query($link,"SELECT car.id_cartao FROM cartao car INNER JOIN conta cc ON cc.id_conta = car.id_conta where cc.id_cliente = ".$id_cliente.";");
                                                $data_cli = mysqli_fetch_assoc($r_cli);
                                                
                                                $result=mysqli_query($link,"SELECT DISTINCT id_compra FROM compras where id_cartao = ".$data_cli['id_cartao'].";");
                                                $total = 0;
                                                while($data=mysqli_fetch_assoc($result)){ 
                                                    $result2=mysqli_query($link,"SELECT sum(quantidade*valor) valor_compra,DATE_FORMAT(data,'%d/%m/%Y %H:%i:%S') data,categoria FROM `compras` where id_compra = ".$data['id_compra'].";");
                                                    $data2=mysqli_fetch_assoc($result2);                                 
                                                //$result3=mysqli_query($link,"SELECT data,categoria FROM `compras` where id_compra = ".$data['id_compra'].";");
                                                //$data3=mysqli_fetch_assoc($result3);
                                                //$subtotal = ($data['quantidade'])*str_replace(",",".",$data["valor"]);
                                                ?>
                                             <tr>
                                                <td><?php echo $data["id_compra"]?></td>
                                                <td><?php echo $data2["categoria"]?></td>
                                                <td><?php echo $data2["data"]?></td>
                                                <td><?php echo $data2["valor_compra"]?></td>
                                             </tr>
                                             <?php } // FIM WHILE COMPRAS ?>
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
      <!-- container section end -->
      <!-- javascripts -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.scrollTo.min.js"></script>
      <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>
      <script src="js/form-validation-script.js"></script>
      <script src="js/scripts.js"></script>
      <script src="tablefilter/tablefilter.js"></script>
      <script data-config>
         var filtersConfig = {
             base_path: 'tablefilter/',
             col_1: 'select',
             col_2: 'select',
             col_3: 'select',
             alternate_rows: true,
             rows_counter: true,
             btn_reset: true,
             loader: true,
             status_bar: true,
             mark_active_columns: true,
             highlight_keywords: true,
             col_number_format: [
                 null, null, null,
                 'EU'],
             custom_options: {
                 cols:[3],
                 texts: [[
                     '0 - 200',
                     '201 - 200',
                     '401 - 300',
                     '601 - 400',
                     '801 - 500',
                     '> 1000'
                 ]],
                 values: [[
                     '>0 && <=200',
                     '>200 && <=400',
                     '>400 && <=600',
                     '>600 && <=700',
                     '>800 && <=1000',
                     '>1000',
                 ]],
                 sorts: [false]
             },
             col_widths: [
                 '150px', '100px', '100px',
                 '70px', '70px', '70px',
                 '70px', '60px', '60px'
             ]
         };
         
         var tf = new TableFilter('demo', filtersConfig);
         tf.init();
         
      </script>
      <script src="js/jquery.js"></script>
      <script src="js/jquery.singlePageNav.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <?php
         include ('modelo/funcoesJS.php');
         include ('modelo/TesteMen.php');
         ?>
   </body>
</html>