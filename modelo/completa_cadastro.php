<?php

	$link = mysqli_connect("localhost", "root", "", "laps");
	if(!empty($_GET['recusa']))
	{
		$user = $_GET['id_cliente'];
		$sql = "UPDATE set solicitacao = 0 where id_cliente = ".$user;
		if (mysqli_query($link, $sql)) { //echo "inserido";
		}
		$mail = $_GET['email'];
		include("solicitacao_recusa.php");
	}	
	else
	{
		$numero = $_POST['numero'];
		$validade = $_POST['validade'];
		$limite = $_POST['limite'];
		$codseg = $_POST['codseg'];
		$id_conta = $_POST['id_conta'];
		$para = $_POST['email'];
		$nome = $_POST['nome'];

		if (!$link) {
		    die('Não foi possível conectar: '.mysql_error());
		}


		$sql = "INSERT into cartao(bandeira, codigo, criacao,id_conta, nome_cliente, numero, validade)values('UVV', 
		    ".$codseg.", 
		    '".date(Y-m-d)."',
		    ".$id_conta.",
		    '".$nome."',
		    '".$numero."',
		    '".$validade."')";


		//mysqli_query($link, $sql);
		if (mysqli_query($link, $sql)) { //echo "inserido";
		}


		$from = 'lapsuvv@gmail.com';
		$mail = $_POST['email'];

		require_once("../phpmailer/class.phpmailer.php");

		define('GUSER', $from); // <-- Insira aqui o seu GMail
		define('GPWD', 'lapsuvv2016'); // <-- Insira aqui a senha do seu GMail

		function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
		    global $error;
		    $mail = new PHPMailer();
		    $mail->IsHTML(true);
		    $mail->IsSMTP(); // Ativar SMTP
		    $mail->SMTPDebug = 0; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
		    $mail->SMTPAuth = true; // Autenticação ativada
		    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
		    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
		    $mail->Port = 465; // A porta 465 deverá estar aberta em seu servidor
		    $mail->Username = GUSER;
		    $mail->Password = GPWD;
		    $mail->SetFrom($de, $de_nome);
		    $mail->Subject = $assunto;
		    $mail->Body = $corpo;
		    $mail->AddAddress($para);
		    if (!$mail->Send()) {
		        $error = 'Mail error: '.$mail->ErrorInfo;
		        return false;
		    } else {
		        $error = 'Mensagem enviada!';
		        return true;
		    }
		}

		$msg = '<html>
		<head>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width">
		  <title>SOLICITAR PARTICIPAÇÃO</title>
		<style id="jsbin-css">
		#t1{
		  background: #FFFFFF;
		  border: 2px solid;
		  font-family: calibri;
		  font-size: 20px; 

		}
		</style>
		</head>
		<body>
		<table id="t1" width="800"> 
		<tr>
		<td>
		  <img src="http://lapsapp.github.io/images/assign1.jpg"><br>
		<table id="t2" width="800"> 
		<tr>
		<td width="500">
		  <p align="Justify"><b>Prezado(a) '.$nome.'! </b>
		  <p align="Justify">Seja muito bem-vindo! <br><br> 
		  <p align="Justify">Você já faz parte da nossa rede.</td>
		<td width="300" align="center"><img src="http://lapsapp.github.io/images/laps.png" width="140" height="160">
		</td>
		</tr>
		</table>
		  
		  <p align="Justify">Cartão : $cartão.<br>
		  					Nome: $Nome<br>
		  					Limite: $limite<br>
		  					Nome: $Nome<br>
		  					Código de Segurança: $codseg<br>
		  					<br>
		  <p align="Justify">Com o LAPS você poderá acompanhar em tempo real suas compras, visualizar seu limite disponível, gerar boletos de sua fatura, realizar bloqueios e desbloqueios do seu cartão, tudo online. 
		<br><br>
		<p align="center">Atenciosamente,</p>
		<p align="center"><b>EQUIPE LAPS</b><br><br></p>
		  <img src="http://lapsapp.github.io/images/assign2.jpg">
		</td>
		</tr>
		</table>
		</body>
		</html>';

		if (smtpmailer($mail, $from, 'LAPS', 'Convite Enviado', $msg)) {
		    $volta = $_SERVER['HTTP_REFERER'];
		    echo "<script>window.location='$volta';alert('$nome, Cliente Aprovado com Sucesso! Uma mensagem foi enviada');</script>";
		} else {
		    $volta = $_SERVER['HTTP_REFERER'];
		    echo "<script>window.location='$volta';alert('$nome, Ocorreu um erro ao enviar o email. Por favor tente novamente');</script>";
		}
		if (!empty($error)) {
		    $volta = $_SERVER['HTTP_REFERER'];
		    echo "<script>window.location='$volta';alert('$nome, Ocorreu um erro ao enviar o email. Por favor tente novamente');</script>";
		}
	}
?>