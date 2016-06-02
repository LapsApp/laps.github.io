<!DOCTYPE html>
<?php $id_cliente = $_GET['id']; ?> 
<html lang="pt-br">
<head>
   <meta charset="utf-8">
   <link rel="shortcut icon" href="../img/favicon.png">

   <title>LAPS</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.css" rel="stylesheet">
      <link href="../css/elegant-icons-style.css" rel="stylesheet" />
      <link href="../css/font-awesome.min.css" rel="stylesheet" />
      <link href="../css/style.css" rel="stylesheet">
      <link href="../css/style-responsive.css" rel="stylesheet" />
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
         <a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS </span></a>
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
         <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
               <li class="active">
                  <a class="" href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_house_alt"></i>
                     <span>INICIO</span>
                  </a>
               </li>
               <li>
                  <a class="" href="../pages_user/cadastro.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_document_alt"></i>
                     <span>MEUS DADOS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="../pages_user/convites.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_link"></i>
                     <span>INDICADOS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="../pages_user/suporte.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_mail_alt"></i>
                     <span>SUPORTE</span>
                  </a>
               </li>
               <li class="">
                  <a class="" href="../pages_user/starter.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_documents_alt"></i>
                     <span>LISTA DE<br>COMPRAS</span>
                  </a>
               </li>
               <li class="">
                  <a class="" href="../pages_user/fatura.php?id=<?php echo $id_cliente; ?>">
                     <i class="icon_documents_alt"></i>
                     <span>DETALHAR<br>FATURAS</span>
                  </a>
               </li>
               <li>
                  <a class="" href="../pages_user/bloqueioUsuario.php?id=<?php echo $id_cliente; ?>">
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
            <!--overview start-->
            <div class="row">
               <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-laptop"></i>SEJA BEM-VINDO AO LAPS!</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                  </ol>
               </div>
            </div>

            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                   <a href="../pages_user/convites.php?id=<?php echo $id_cliente; ?>">
                       <div class="info-box blue-bg">
                           <div class="count">
                            </div>
                            <div class="title"><img src="../img/icons/group2.png" alt="Envie convite a seus amigos!" width="60px">CONVIDE SEUS AMIGOS! </div>
                        </div>
                  </a><!--/.info-box-->
               </div><!--/.col-->

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><a href="../pages_user/fatura.php?id=<?php echo $id_cliente; ?>">
                  <div class="info-box green-bg">
                     <div class="count">
                         <?php $id_cliente = $_GET['id']; 
                            $link = mysqli_connect("localhost", "root", "", "laps");
                            if (!$link) {
                            die('Não foi possível conectar: ' . mysql_error());
                            }

                            $dt = date("d.m.y");
                            $mesAtual = date("m");
                            $anoAtual = date("Y");
                            $result=mysqli_query($link,"SELECT SUM(cp.valor * cp.quantidade) as total FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND ct.id_cliente = ".$id_cliente);
                            $data=mysqli_fetch_assoc($result);
                            
                            if($data['total']>0){
                                echo "R$", round($data['total'], 4);
                            }else{
                                echo "0";
                            }
                          ?>
                     </div>
                     <div class="title">SUA FATURA ATUAL</div>
                  </div><!--/.info-box-->
               </div><!--/.col-->
               

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box dark-bg">
                     <div class="count">
                        <?php $id_cliente = $_GET['id']; 
                        $link = mysqli_connect("localhost", "root", "", "laps");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }

                        $result=mysqli_query($link,"SELECT limite as total FROM conta WHERE id_cliente = '".$id_cliente."' ");
                        $data=mysqli_fetch_assoc($result);

                        if($data['total']>0){
                           echo "R$",$data['total'];
                        }else{
                           echo "0";
                        }
                        ?>
                     </div>
                     <div class="title">SEU LIMITE DISPONÍVEL</div>
                  </div><!--/.info-box-->
               </div><!--/.col-->

               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                  <div class="info-box brown-bg">
                     <div class="count">
                        <?php $id_cliente = $_GET['id']; 
                        $link = mysqli_connect("localhost", "root", "", "laps");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }

                        $result=mysqli_query($link,"SELECT limitetotal as total FROM conta WHERE id_cliente = '".$id_cliente."' ");
                        $data=mysqli_fetch_assoc($result);

                        if($data['total']>0){
                           echo "R$",$data['total'];
                        }else{
                           echo "0";
                        }
                        ?>
                     </div>
                     <div class="title">SEU LIMITE TOTAL</div>
                  </div><!--/.info-box-->
               </div><!--/.col-->
               
            </div><!--/.row-->
         </section>
      </section>
   </section>
</body>
</html>
