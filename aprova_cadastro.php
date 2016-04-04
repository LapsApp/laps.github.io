<!DOCTYPE html>
<?php


	$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
//include("modelo/conecta.php");
    $id_cliente = $_GET['id_cliente'];
    $sql = "SELECT 	c.nome,
				c.cpf,
        		c.rg,
        		c.email,
        		c.cel,
        		ct.renda,
        		e.rua,
        		e.num,
        		e.cidade,
        		e.estado,
        		e.cep,
        		d.foto,
        		d.doc_frente,
        		d.doc_verso,
        		c.dt_solicitacao
        	FROM cliente c 
				join conta ct on ct.id_cliente = c.id_cliente 
				join documentacao d on d.id_cliente = c.id_cliente 
				join endereco e on e.id_cliente = c.id_cliente
			WHERE c.id_cliente = ".$id_cliente;
 
    $var = $link->query($sql);


$result = $link->query($sql);

 while($row = $result->fetch_assoc()) {
        $nome =  $row["nome"];
		$cpf =  $row["cpf"];
        $rg =  $row["rg"];
        $email =  $row["email"];
        $cel =  $row["cel"];
        $renda =  $row["renda"];
        $rua =  $row["rua"];
        $num =  $row["num"];
        $cidade =  $row["cidade"];
        $estado =  $row["estado"];
        $cep =  $row["cep"];
        $foto =  $row["foto"];
        $doc_frente =  $row["doc_frente"];
        $doc_verso =  $row["doc_verso"];
        $dt_solicitacao = $row["dt_solicitacao"];
       }

       $data = explode('-', $dt_solicitacao);
       $dt = $data[1].'/'.($data[0]+2);

  	$num = mt_rand(0001, 9999).'-'.mt_rand(0001, 9999).'-'.mt_rand(0001, 9999).'-'.mt_rand(0001, 9999);
  	$codseg = mt_rand(001, 999);

  	$sal = $renda / 880;
  	if($sal <= 2 )
  	{
  		$valor = 500.00;
  	}elseif(($sal > 2) && ($sal <=5))
  	{
  		$valor = 1000.00;
  	}elseif(($sal > 5) && ($sal <=8))
  	{
  		$valor = 1500.00;
  	}else{
  		$valor = 2000.00;
  	}
                                              		
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>LAPS</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">L<span class="lite">APS</span></a>
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
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>INICIO</span>
                      </a>
                  </li>
				  <li>
                      <a class="" href="cadastro.php?id=0">
                          <i class="icon_document_alt"></i>
                          <span>MEUS DADOS</span>
                      </a>
                  </li> 
                  <li>
                      <a class="" href="convites.php">
                          <i class="icon_genius"></i>
                          <span>INDICADOS</span>
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
						<li><i class="fa fa-home"></i><a href="index.html">INÍCIO</a></li>
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
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="modelo/completa_cadastro.php" enctype="multipart/form-data">
                                      <div class="form-group ">
                                          <input type="hidden" name='id_cliente' value="<?php echo  $_GET['id'];?>">
                                          <label for="cname" class="control-label col-lg-2">Nome<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $nome;?> </label>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">CPF<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $cpf;?> </label>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">E-mail<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $email;?> </label>
                                          </div>
                                          <label for="cname" class="control-label col-lg-2">Celular<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $cel;?> </label>
                                          </div>
                                      </div> 
                                      
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Renda<span class="required">*</span></label>
                                          <<div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $renda;?> </label>
                                          </div>
                                          
                                          <label for="cname" class="control-label col-lg-2">Lugradouro<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $rua; ?> </label>
                                          </div>
                                      </div> 
                                      
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Número <span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $num;?> </label>
                                          </div>
                                          
                                          <label for="cname" class="control-label col-lg-2">Cidade <span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $cidade;?> </label>
                                          </div>
                                      </div> 
                                                                          
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Estado<span class="required">*</span></label>
                                         <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $estado;?> </label>
                                          </div>
                                      </div>  

                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">CEP</label>
                                         <div class="col-lg-2">
                                              <label class="form-control" id="subject"><?php echo $cep;?> </label>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Selfie</label>
                                         <div class="col-lg-2">
                                               <img src="img/<?php 
                                               		$aux = explode('/', $foto);
                                               echo $aux[3];?>" height="200" width="200"> 
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Doc. Frente</label>
                                         <div class="col-lg-2">
                                               <img src="img/<?php 
                                               		$aux = explode('/', $doc_frente);
                                               echo $aux[3];?>" height="200" width="200"> 
                                          </div>
                                      </div>

                                       <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Doc. Verso</label>
                                          <div class="col-lg-2">
                                               <img src="img/<?php 
                                               		$aux = explode('/', $doc_verso);
                                               echo $aux[3];?>" height="200" width="200"> 
                                          </div>
                                      </div>


                                      <div class="form-group ">
                                          <input type="hidden" name='id_cliente' value="<?php echo  $_GET['id'];?>">
                                          <label for="cname" class="control-label col-lg-2">Número do Cartão<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <input class="form-control" id="subject" name="numeroCartao" maxlength="19" type="text" required  value = "<?php echo $num; ?>"   />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Validade<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <input class="form-control" id="subject" name="validade" maxlength="10" type="text" required value="<?php echo $dt;?>" />
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Cod. Segurança<span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control" id="subject" name="codseg" maxlength="3" type="text" required value="<?php echo $codseg;?>" />
                                          </div>
                                          
                                          <label for="cname" class="control-label col-lg-2">Limite<span class="required">*</span></label>
                                          <div class="col-lg-2">
                                              <input class="form-control" id="subject" name="limite" maxlength="8" type="text" 
                                              value="<?php echo $valor; ?>" 
                                              required />
                                          </div>
                                      </div> 


                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Aprovar</button>
                                              <button class="btn btn-default" type="button">Recusar</button>
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
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    

<script language="JavaScript" type="text/javascript"> 

function img1(obj) { 
    var img1 = "";
    alert(document.feedback_form.foto1.value);
    img1 = document.feedback_form.foto1.value; 
    document.feedback_form.capa.src=img1;
} 
</script> 

  </body>
</html>
