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
   <link href="css/font-awesome.min.css" rel="stylesheet"/>
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
         <div id="sidebar"  class="nav-collapse ">
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
                  <h3 class="page-header"><i class="fa fa-files-o"></i> CADASTRO</h3>
                  <ol class="breadcrumb">
                     <li><i class="fa fa-home"></i><a href="menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                     <li><i class="icon_document_alt"></i>MEUS DADOS</li>
                     <li><i class="fa fa-files-o"></i>CADASTRO</li>
                  </ol>
               </div>
            </div>
            <!-- Form validations -->
            <div class="row">
               <div class="col-lg-12">
                  <section class="panel">
                     <header class="panel-heading">
                        CADASTRO
                     </header>
                     <div class="panel-body">
                        <div class="form">
                           <form class="form-validate form-horizontal" method="post" action="modelo/salva_finaliza_cadastro.php" enctype="multipart/form-data">
                              <div class="form-group"><br>
                                 <label for="ccomment" class="control-label col-lg-2">Foto</label>
                                 <div class="col-lg-4">
                                    <img border="0" src="images/user_.png" name="frente" id="fotoimg" height="100" width="100" alt="Frente"> 
                                    <input name="foto" type="file" id="foto" onchange="readURL(this,'fotoimg');" required />
                                 </div>
                              </div>
                              <div class="form-group ">
                                 <input type="hidden" name='id_cliente' value="<?php echo  $_GET['id'];?>">
                                 <label for="cname" class="control-label col-lg-2">RG<span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="rg" maxlength="10" type="text" required />
                                 </div>
                                 <label for="cname" class="control-label col-lg-2">Renda Bruta R$<span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="renda" type="text" required />
                                 </div>
                                 <label for="cname" class="control-label col-lg-2">Telefone<span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="cel" maxlength="9" type="text" required />
                                 </div>
                              </div>
                              
                              <div class="form-group ">
                                 <label for="cname" class="control-label col-lg-2">Rua<span class="required">*</span></label>
                                 <div class="col-lg-6">
                                    <input class="form-control" id="subject" name="rua" maxlength="20" type="text" required />
                                 </div>

                                 <label for="cname" class="control-label col-lg-2">Numero<span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="numero" maxlength="8" type="text" required />
                                 </div>
                              </div>

                              <div class="form-group ">
                                 <label for="cname" class="control-label col-lg-2">Complemento<span class="required">*</span></label>
                                 <div class="col-lg-6">
                                    <input class="form-control" id="subject" name="complemento" maxlength="20" type="text"/>
                                 </div>

                                 <label for="cname" class="control-label col-lg-2">Cep<span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="cep" maxlength="8" type="text" required />
                                 </div>
                              </div>

                              <div class="form-group ">
                                 <label for="cname" class="control-label col-lg-2">Cidade <span class="required">*</span></label>
                                 <div class="col-lg-4">
                                    <input class="form-control" id="subject" name="cidade" type="text" required />
                                 </div>

                                 <label for="cname" class="control-label col-lg-2">Estado <span class="required">*</span></label>
                                 <div class="col-lg-2">
                                    <input class="form-control" id="subject" name="estado" maxlength="2" type="text" required />
                                 </div>
                              </div>
 
                              <div class="form-group"><br>
                                 <label for="ccomment" class="control-label col-lg-2">Doc. Frente</label>
                                 <div class="col-lg-4">
                                    <img border="0" src="images/card_user.png" name="frente" id="frenteimg" height="100" width="100" alt="Frente">
                                    <input name="frente" type="file" id="frente" onchange="readURL(this,'frenteimg');" required />
                                 </div>

                                 <label for="ccomment" class="control-label col-lg-2">Doc. Verso</label>
                                 <div class="col-lg-4">
                                    <img border="0" src="images/card_user.png" name="verso" id="versoimg" height="100" width="100" alt="Verso">
                                    <input name="verso" type="file" id="verso" onchange="readURL(this,'versoimg');" required />
                                 </div>
                              </div>

                              <div class="form-group">
                                 <div class="col-lg-offset-2 col-lg-10"><br>
                                    <button class="btn btn-primary" type="submit">ENVIAR</button>
                                    <button class="btn btn-default" type="button">CANCELAR</button>
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

   <script language="JavaScript" type="text/javascript">
   function readURL(input, id) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
            $('#'+id)
            .attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
      }
   }
   </script>
</body>
</html>
