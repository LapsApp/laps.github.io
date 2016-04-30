<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="shortcut icon" href="img/favicon.png">

   <title>LAPS</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/bootstrap-theme.css" rel="stylesheet">
   <link href="css/elegant-icons-style.css" rel="stylesheet" />
   <link href="css/font-awesome.min.css" rel="stylesheet" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
   <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
   <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
   <link rel="stylesheet" href="css/fullcalendar.css">
   <link href="css/widgets.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/xcharts.min.css" rel=" stylesheet">
   <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
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
         </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
         <section class="wrapper">
            <!--overview start-->
            <div class="row">
               <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-laptop"></i>MENU ADMINISTRADOR</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="menu_adm.php">INICIO</a></li>
                     <li><i class="fa fa-laptop"></i>MENU</li>
                  </ol>
               </div>
            </div>

            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="listar_cadastros.php">
                  <div class="info-box blue-bg">
                     <div class="count">
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "laps");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }

                        $result=mysqli_query($link,"SELECT count(*) as total FROM Cliente WHERE cadastro='2' OR cadastro='3' OR cadastro='4'");
                        $data=mysqli_fetch_assoc($result);

                        if($data['total']>0){
                           echo $data['total'];
                        }else{ echo "0";}
                        ?>
                     </div>
                     <div class="title">VERIFICAR CADASTROS</div>
                  </div></a><!--/.info-box-->
               </div><!--/.col-->

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="listar_solicitacao.php">
                  <div class="info-box brown-bg">
                     <div class="count">
                        <?php
                        $link = mysqli_connect("localhost", "root", "", "laps");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }

                        $result=mysqli_query($link,"SELECT count(*) as total FROM Cliente WHERE cadastro='0' OR cadastro='1'");
                        $data=mysqli_fetch_assoc($result);

                        if($data['total']>0){
                           echo $data['total'];
                        }else{
                           echo "0";
                        }
                        ?>
                     </div>
                     <div class="title">VERIFICAR SOLICITAÇÕES</div>
                  </div></a><!--/.info-box-->
               </div><!--/.col-->

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="">
                  <div class="info-box dark-bg">
                     <div class="count">4.362</div>
                     <div class="title">OUTRO</div>
                  </div><!--/.info-box-->
               </div><!--/.col-->

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="">
                  <div class="info-box green-bg">
                     <div class="count">1.426</div>
                     <div class="title">OUTRO</div>
                  </div><!--/.info-box-->
               </div><!--/.col-->
            </div><!--/.row-->
         </section>
      </section>
   </section>
</body>
</html>
