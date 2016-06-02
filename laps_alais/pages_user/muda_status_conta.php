<!DOCTYPE html>
<?php $id_conta = $_GET['id_conta']; ?> 
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
                  <h3 class="page-header"><i class="fa fa-files-o"></i> ALTERA STATUS CONTA</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
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
                           <form class="form-validate form-horizontal" method="post" action="modelo/altera_status_conta.php">
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
                                             WHERE c.id_conta = ".$_GET['id_conta']."
                                             ORDER BY c.id_conta, ci.cadastro";
                                    $result = $link->query($sql);
                                    $row = $result->fetch_assoc();
                                    if($row["status"] == 0)
                                    {                              
                                    ?>
                                     <div class="panel-body">
                                       <div class="form">
                                          <form  method="post" action="modelo/altera_status_conta.php">
                                             <div class="form-group ">
                                               <label class="control-label col-lg-2"> CONTA:</label>
                                                <div class="col-md-4">
                                                  <input id="textinput" name="id_conta" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["id_conta"];?>" readonly> 
                                                  <input id="textinput" name="status" placeholder="placeholder" class="form-control input-md" type="hidden" value="1" readonly> 

                                                  <input id="textinput" name="email" placeholder="placeholder" class="form-control input-md" type="hidden" value="<?php echo $row["email"];?>" readonly> 
                                                  </div>
                                             </div>
                                             <div class="form-group ">
                                               <label class="control-label col-lg-2"> RESPONSÁVEL:</label>
                                                <div class="col-md-4">
                                                  <input id="textinput" name="nome" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["nome"];?>" readonly> 
                                                  </div>
                                                </div>
                                             <div class="form-group ">
                                                <label for="cname" class="control-label col-lg-2">MOTIVO PARA BLOQUEIO <span class="required">*</span></label>
                                                <div class="col-lg-4">
                                                   <textarea class="form-control" id="subject" name="obs" required >
                                                   </textarea>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                   <button class="btn btn-primary" type="submit">BLOQUEAR CONTA</button>

                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <?php }else{ ?>

                                     <div class="panel-body">
                                       <div class="form">
                                          <form method="post" action="modelo/altera_status_conta.php">
                                             <div class="form-group ">
                                               <label class="control-label col-lg-2"> CONTA:</label>
                                                <div class="col-md-4">
                                                  <input id="textinput" name="id_conta" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["id_conta"];?>" readonly> 
                                                  <input id="textinput" name="status" placeholder="placeholder" class="form-control input-md" type="hidden" value="0" readonly> 

                                                  <input id="textinput" name="email" placeholder="placeholder" class="form-control input-md" type="hidden" value="<?php echo $row["email"];?>">
                                                  </div>
                                             </div>
                                             <div class="form-group ">
                                               <label class="control-label col-lg-2"> RESPONSÁVEL:</label>
                                                <div class="col-md-4">
                                                  <input id="textinput" name="nome" placeholder="placeholder" class="form-control input-md" type="text" value="<?php echo $row["nome"];?>" readonly> 
                                                  </div>
                                                </div>
                                             <div class="form-group ">
                                                <label for="cname" class="control-label col-lg-2">MOTIVO PARA DESBLOQUEIO <span class="required">*</span></label>
                                                <div class="col-lg-4">

                                                   <textarea class="form-control" id="subject" name="obs" required >
                                                   </textarea>

                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                   <button class="btn btn-primary" type="submit">DESBLOQUEAR CONTA</button>

                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <?php }?>
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
</body>
</html>
