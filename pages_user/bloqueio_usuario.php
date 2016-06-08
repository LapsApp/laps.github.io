<!DOCTYPE html>
<?php
   $link = mysqli_connect("localhost", "root", "", "laps");
   if (!$link) {
          die('Não foi possível conectar: ' . mysql_error());
      }
      $id_cliente = $_GET['id']; 
   ?>
<html lang="en">
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
        <?php 
      include ("./partes/nav.php");
    ?>
        <!--sidebar end-->
        

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i>BLOQUEIO</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
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
                                   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="modelo/analise_bloqueioUsuario.php">
                                       <div class="form-group ">
                                    <div class="col-lg-10">

								<table id="demo" width="100%">
                                          <thead>
                                             <tr>
                                                <th style='padding: 20px;'>Conta</th>
                                                <th style='padding: 20px;'>Status</th>
												<th style='padding: 20px;' colspan="2">Comentário</th>
												<th></th>
												
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php                                                
                                                $result=mysqli_query($link,"SELECT DISTINCT cc.id_conta, (case cc.status when 0 then 'Ativa' when 1 then 'Bloqueada' end) status_conta, cc.status, cc.comentario FROM conta cc where id_cliente = ".$id_cliente.";");
                                                $total = 0;
                                                while($data=mysqli_fetch_assoc($result)){ 
												$status = $data["status"];
												$id_conta = $data["id_conta"];
                                                ?>
                                             <tr>
                                                <td style='padding: 20px;'><?php echo $data["id_conta"]?></td>
                                                <td style='padding: 20px;'><?php echo $data["status_conta"]?></td>
												<td style='padding: 20px;'><?php echo $data["comentario"]?></td>
															  
                                            </tr>

                                             <?php } // FIM WHILE COMPRAS ?>
                                          </tbody>
                                       </table>
                                  
                                          </div>
                                      </div>
										<?php									  
										if($status == 0){
											echo "
											
											<div class='form-group '>
												<table width='70%'>
												<tr>
												<td align='left' style='padding: 10px;'>
													<label for='cname' class='control-label col-lg-4'>MOTIVO PARA BLOQUEIO </label>
													<div class='col-lg-7'>
													   <textarea class='form-control' id='subject' name='obs'>
													   </textarea>
													</div>
												</td>
												<td align='left'>
												<div>							
													<button class='btn btn-primary' name='bloqueia' value='".$id_conta."' type='submit'>Bloquear</button>													
												</div>
												</td>
												</tr>
												</table>
                                             </div>
											 

											 ";												 
													
											 										 
										}
									   
											 ?>
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

<?php
      include ('../modelo/funcoesJS.php');
      include ('../modelo/TesteMen.php');
   ?>

  </body>
</html>
