<?php
   $link = mysqli_connect("localhost", "root", "", "laps");
   if (!$link) {
          die('Não foi possível conectar: ' . mysql_error());
      }
      $id_cliente = $_GET['id'];
	  include 'partes/header.php';

   ?>
   
   <body style="color: #000;">
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../pages_adm/menu_adm.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS </span></a>
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
        <?php include 'partes/nav.php'; ?>
        <!--sidebar end-->
		
		
		<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i>BLOQUEIO</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="menu_usuario.php?id=<?php echo $id_cliente; ?>">INICIO</a></li>
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
                                   <form class="form-validate form-horizontal" method="post" action="../modelo/analise_bloqueioUsuario_antigo.php" nctype="multipart/form-data">

                                    <div class="col-lg-10">

								<table id="demo" width="100%">
                                          <thead>
                                             <tr>
                                                <th style='padding: 20px;'>Conta</th>
                                                <th style='padding: 20px;'>Status</th>
												<th style='padding: 20px;' colspan="2">Obs</th>
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
										<?php									  
										if($status == 0){ ?>
											
											

											 <div class="form-group ">
											 <div style='padding: 40px;  float: left; width: 100%'>
											 <div align="right" style='width: 50%' width="50%">
											 <label for='cname' class='control-label col-lg-4'>MOTIVO PARA BLOQUEIO </label>
													<div class='col-lg-7'>
													   <textarea class='form-control' id='subject' name='obs'>
													   </textarea>
													</div>	
											 </div>

													
											 
											 </br>
												 <div align="right" style="padding: 20px;">
													<button class="btn btn-primary" name="bloqueia" value="<?php echo $id_conta ?>" type="submit">Bloquear</button>
												 </div>		
											 </div>
											 </div>
											 
										<?php	 										 
										} ?>									   											 
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
  
  <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>