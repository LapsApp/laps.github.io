<?php

$link = mysqli_connect("localhost", "root", "", "laps");
if(!empty($_GET['recusa']))
{
	$cliente = $_GET['id_cliente'];
	$comentario = $_GET['comentario'];
	$sql = "UPDATE Cliente  set cadastro = 0 where id_cliente = '".$cliente."'";
	if (mysqli_query($link, $sql)) { //echo "inserido";
	}
	$sql = "UPDATE Conta  set comentario = '".$comentario."' where id_cliente = '".$cliente."'";
	if (mysqli_query($link, $sql)) { //echo "inserido";
	}
    $from = 'lapsuvv@gmail.com';
	$mail = $_GET['email'];

require_once("../phpmailer/class.phpmailer.php");

define('GUSER', $from);	// <-- Insira aqui o seu GMail
define('GPWD', 'lapsuvv2016');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 465 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		  $volta = $_SERVER['HTTP_REFERER'];
    	echo "<script>window.location='$volta&obj=Cliente&type=erro'</script>";
	} else {
		  $volta = $_SERVER['HTTP_REFERER'];
    	echo "<script>window.location='$volta&obj=Cliente&type=sucesso'</script>";
		return true;
	}

}
$msg = '
<html>
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
  <p align="Justify"><b>Prezado(a) usuário! </b>
  <p align="Justify">Infelizmente, sua solicitação de cadastro foi recusada.<br> 
Você possui pendências em seu nome, tente futuramente.
</td>
<td width="300" align="center"><img src="http://lapsapp.github.io/images/laps.png" width="140" height="160">
</td>
</tr>
</table>
<br><br>'.$comentario.'<br><br>
<p align="center">Atenciosamente,</p>
<p align="center"><b>EQUIPE LAPS</b><br><br></p>
  <img src="http://lapsapp.github.io/images/assign2.jpg">
</td>
</tr>
</table>
</body>
</html>';

if (smtpmailer($mail, $from, 'LAPS', 'LAPS - Cliente Recusado', $msg)) {
    $volta = $_SERVER['HTTP_REFERER'];
    echo "<script>window.location='$volta&obj=Cliente&type=sucesso'</script>";
}
if (!empty($error)) echo $error;


}
else
{
	$numero = $_POST['numeroCartao'];
	$validade = $_POST['validade'];
	$limite = $_POST['limite'];
	$codseg = $_POST['codseg'];
	$id_conta = $_POST['id_conta'];
	$para = $_POST['email'];
	$nome = $_POST['nome'];
	$cliente = $_POST['id_cliente'];
	$comentario = $_POST['comentario'];

	if (!$link) {
		die('Não foi possível conectar: '.mysql_error());
	}

    $sql = "UPDATE Conta  set comentario = '".$comentario."' where id_cliente = '".$cliente."'";
	if (mysqli_query($link, $sql)) { //echo "inserido";
	}

	$sql = "INSERT into cartao(bandeira, codigo, criacao,id_conta, nome_cliente, numero, validade)values('UVV',
		".$codseg.",
		'".date('Y-m-d')."',
		".$id_conta.",
		'".$nome."',
		'".$numero."',
		'".$validade."')";


		//mysqli_query($link, $sql);
		if (mysqli_query($link, $sql)) { //echo "inserido";
		}

		$sql = "UPDATE CLIENTE set cadastro = 4 where id_cliente = ".$cliente;

		if (mysqli_query($link, $sql)) { //echo "inserido";
		}

		$sql = "UPDATE CONTA set limite = '.$limite.' where id_cliente = ".$cliente;

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
		<title>Cadastro Concluído</title>
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

		<p align="Justify">Número : '.$numero.'<br>
		Nome: '.$nome.'<br>
		Limite: '.$limite.'<br>
		Validade: '.$validade.'<br>
		Código de Segurança: '.$codseg.'<br>
		<br><br>'.$comentario.'<br><br>
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

		if (smtpmailer($mail, $from, 'LAPS', 'LAPS - Cliente Aprovado', $msg)) {
	
   $volta = $_SERVER['HTTP_REFERER'];
   echo "<script>window.location='$volta&obj=Cliente&type=sucesso'</script>";
} else {
   $volta = $_SERVER['HTTP_REFERER'];	
   echo "<script>window.location='$volta&obj=Cliente&type=erro'</script>";
}
if (!empty($error)) {
   $volta = $_SERVER['HTTP_REFERER'];
   echo "<script>window.location='$volta&obj=Cliente&type=erro'</script>";
}

	}
	?>
