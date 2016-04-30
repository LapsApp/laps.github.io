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
c.cadastro,
ct.renda,
e.rua,
e.num,
e.cidade,
e.estado,
e.bairro,
e.complemento,
e.cep,
d.foto,
d.doc_frente,
d.doc_verso,
c.dt_solicitacao,
ct.comentario,
ct.id_conta
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
	$cadastro =  $row["cadastro"];
	$renda =  $row["renda"];
	$rua =  $row["rua"];
	$num =  $row["num"];
	$cidade =  $row["cidade"];
	$estado =  $row["estado"];
	$bairro =  $row["bairro"];
	$complemento = $row["complemento"];
	$cep =  $row["cep"];
	$foto =  $row["foto"];
	$doc_frente =  $row["doc_frente"];
	$doc_verso =  $row["doc_verso"];
	$dt_solicitacao = $row["dt_solicitacao"];
	$comentario = $row["comentario"];
	$id_conta = $row["id_conta"];
}

if($cadastro == 4){
	$sqlconta = "SELECT 	ct.id_cartao,
	ct.numero,
	ct.validade,
	ct.criacao,
	ct.codigo,
	ct.validade,
	ct.nome_cliente,
	ct.bandeira,
	ct.id_conta,
	c.limite,
	c.renda,
	c.comentario
	FROM cartao ct
	join conta c on ct.id_conta = c.id_conta
	join cliente cl on cl.id_cliente = c.id_cliente
	WHERE cl.id_cliente = ".$id_cliente;

	$var = $link->query($sqlconta);
	
	$resultconta = $link->query($sqlconta);

	while($row = $resultconta->fetch_assoc()) {
		$numero =  $row["numero"];
		$validade =  $row["validade"];
		$criacao =  $row["criacao"];
		$codseg =  $row["codigo"];
		$dt =  $row["validade"];
		$nome_cliente =  $row["nome_cliente"];
		$bandeira =  $row["bandeira"];
		$id_conta =  $row["id_conta"];
		$limite = $row["limite"];
		$renda = $row["renda"];
		$comentario = $row["comentario"];
	}
	//$codseg = $codigo;
	//$dt = $validade;
}else {
	$data = explode('-', $dt_solicitacao);
	$dt = $data[1].'/'.($data[0]+2);
	$numero = mt_rand(0001, 9999).mt_rand(0001, 9999).mt_rand(0001, 9999)	.mt_rand(0001, 9999);
	$codseg = mt_rand(001, 999);

	$sal = $renda / 880;
	if($sal <= 2 )
	{
		$limite = 500.00;
	}elseif(($sal > 2) && ($sal <=5))
	{
		$limite = 1000.00;
	}elseif(($sal > 5) && ($sal <=8))
	{
		$limite = 1500.00;
	}else{
		$limite = 2000.00;
	}
}
?>
<html lang="pt-br">
<style>
#img1:hover {
    transform: scale(2,2);
}
#img2:hover {
    transform: scale(2,2);
}
#img3:hover {
    transform: scale(2,2);
}
</style>
<head>
	<meta charset="utf-8">
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
									<form class="form-validate form-horizontal" method="post" action="modelo/completa_cadastro.php" enctype="multipart/form-data">
										<div class="form-group">
											<span class="title h4 uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DADOS</span>
										</div>
										<div class="form-group ">
											<input type="hidden" name='id_conta' value="<?php echo $id_conta;?>">
											<input type="hidden" name='email' value="<?php echo $email;?>">
											<input type="hidden" name='nome' value="<?php echo $nome;?>">
											<input type="hidden" name='id_cliente' value="<?php echo $id_cliente;?>">

											<label for="cname" class="control-label col-lg-2">Nome</label>
											<div class="col-lg-5">
												<label class="form-control" id="subject"><?php echo $nome;?></label>
											</div>

                      <label for="cname" class="control-label col-lg-1">Celular</label>
                      <div class="col-lg-2">
                        <label class="form-control" id="subject"><?php echo $cel;?></label>
                      </div>
										</div>
                    
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">RG</label>
                      <div class="col-lg-2">
                        <label class="form-control" id="subject"><?php echo $rg;?></label>
                      </div>

											<label for="cname" class="control-label col-lg-1">CPF</label>
                      <div class="col-lg-2">
                        <label class="form-control" id="subject"><?php echo $cpf;?></label>
                      </div>
                      
											<label for="cname" class="control-label col-lg-1">Renda R$</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $renda;?></label>
											</div>
										</div>

                    <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2">E-mail</label>
                      <div class="col-lg-5">
                        <label class="form-control" id="subject"><?php echo $email;?></label>
                      </div>
                    </div>

										<div class="form-group">
											<span class="title h4 uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENDEREÇO</span>
										</div>

										<div class="form-group">
											<label for="cname" class="control-label col-lg-2">Logradouro</label>
											<div class="col-lg-3">
												<label class="form-control" id="subject"><?php echo $rua; ?> </label>
											</div>

											<label for="cname" class="control-label col-lg-1">Número</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $num;?> </label>
											</div>

											<label for="cname" class="control-label col-lg-1">Complemento</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $complemento;?></label>
											</div>
										</div>

										<div class="form-group">
											<label for="cname" class="control-label col-lg-2">Bairro</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $bairro;?></label>
											</div>

                    <label for="cname" class="control-label col-lg-1">Cidade</label>
                      <div class="col-lg-2">
                        <label class="form-control" id="subject"><?php echo $cidade;?> </label>
                      </div>
                    </div>

										<div class="form-group">
											<label for="cname" class="control-label col-lg-2">Estado</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $estado;?> </label>
											</div>

											<label for="cname" class="control-label col-lg-1">CEP</label>
											<div class="col-lg-2">
												<label class="form-control" id="subject"><?php echo $cep;?> </label>
											</div>
										</div>

										<div class="form-group">
											<span class="title h4 uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOTOS</span>
										</div>

										<div class="form-group ">
											<label for="ccomment" class="control-label col-lg-2">Perfil</label>
											<div class="col-lg-2">
												<img id="img1" src="img/<?php
												$aux = explode('/', $foto);
												echo $aux[3];?>" height="200" width="200">
											</div>
										</div>

										<div class="form-group ">
											<label for="ccomment" class="control-label col-lg-2">Doc. Frente</label>
											<div class="col-lg-2">
												<img id="img2" src="img/<?php
												$aux = explode('/', $doc_frente);
												echo $aux[3];?>" height="200" width="200">
											</div>

											<label for="ccomment" class="control-label col-lg-2">Doc. Verso</label>
											<div class="col-lg-2">
												<img id="img3" src="img/<?php
												$aux = explode('/', $doc_verso);
												echo $aux[3];?>" height="200" width="200">
											</div>
										</div>

										<div class="form-group">
											<span class="title h4 uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DADOS DO CARTÃO</span>
										</div>

										<div class="form-group">
											<input type="hidden" name='id_cliente' value="<?php echo  $_GET['id_cliente'];?>">
											<label for="cname" class="control-label col-lg-2">Número do Cartão</label>
											<div class="col-lg-2">
												<input class="form-control" id="subject" name="numeroCartao" maxlength="19" type="text" required value = "<?php echo $numero; ?>"  />
											</div>

											<label for="cname" class="control-label col-lg-2">Validade</label>
											<div class="col-lg-2">
												<input class="form-control" id="subject" name="validade" maxlength="10" type="text" required value="<?php echo $dt;?>" />
											</div>
										</div>

										<div class="form-group ">
											<label for="cname" class="control-label col-lg-2">Cod. Segurança</label>
											<div class="col-lg-2">
												<input class="form-control" id="subject" name="codseg" maxlength="3" type="text" required value="<?php echo $codseg;?>" />
											</div>

											<label for="cname" class="control-label col-lg-2">Limite R$</label>
											<div class="col-lg-2">
												<input class="form-control" id="subject" name="limite" maxlength="8" type="text" required value="<?php echo $limite; ?>" />
											</div>
										</div>

										<div class="form-group">
											<span class="title h4 uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMENTÁRIOS</span>
										</div>

										<div class="form-group ">
											<label for="cname" class="control-label col-lg-2">Texto Adicional</label>
											<!--<input class="form-control" id="comentario" name="comentario" maxlength="50" type="text" value="<?php echo $comentario; ?>"/>-->
											<textarea rows="4" cols="100" id="comentario" name="comentario" maxlength="50"><?php echo $comentario; ?></textarea>
									    </div>
																		
										<br>

										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<input class="btn btn-primary" type="submit" value="Aceitar" />
												<a href="#" onclick="this.href='modelo/completa_cadastro.php?id_cliente=<?php echo $id_cliente; ?>&recusa=1&email=<?php echo $email; ?>&comentario='+document.getElementById('comentario').value;">
													<button class="btn btn-default" type="button">Recusar</button>
												</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>
		</section>
	</section>

	<!-- javascripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollTo.min.js"></script>
	<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script src="js/form-validation-script.js"></script>
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
