<?php
header('Content-Type: text/html; charset=iso-8859-1');
include ('funcoesJS.php');
include ('TesteMen.php');
$id_cliente = $_GET['id']; 
$from = 'lapsuvv@gmail.com';
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d h:i:s a');

echo $date;

$connect = mysqli_connect('localhost', 'root', '', 'laps');

	$sql = "SELECT email FROM cliente WHERE id_cliente = '$id_cliente'";
    $result = $connect->query($sql);

    if ($result->num_rows <= 0) {
        $volta = $_SERVER['HTTP_REFERER'];
        echo "<script>window.location='$volta?obj=Login&type=erro';</script>";
        die();
    } else {
        while($row = $result->fetch_assoc()) {
	        $mail = $row["email"];      
	    }

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
<title>MENSAGEM</title>
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
<p align="Justify"><b>LAPS - O Cartão de Crédito que VOCÊ controla!!</b><br>
</td>
<td width="300" align="center"><img src="http://lapsapp.github.io/images/laps.png" width="140" height="160">
</td>
</tr>
</table>
<p align="Justify"><b>'.$assunto.'</b>
<p align="Justify">'.$mensagem.'
<br><br><br><br>
<img src="http://lapsapp.github.io/images/assign2.jpg">
</td>
</tr>
</table>
</body>
</html>';

if (smtpmailer($from, $mail, 'SUPORTE', $assunto, $msg)) {
header('Content-Type: text/html; charset=iso-8859-1');
$sql =	"INSERT INTO `suporte` (`id_cliente`, `assunto`, `dt_msg`, `mensagem`) VALUES ('".$id_cliente."', '".$assunto."', '".$date."', '".$mensagem."')";
mysqli_query($connect, $sql);

	$volta = $_SERVER['HTTP_REFERER'];
	
	//$volta = 'suporte.php';
	//echo "<script>window.location='$volta?cat=GERAL&obj=Mensagem enviada com sucesso&type=sucesso'</script>";

}

echo "<script>alert('Mensagem enviada com sucesso para $from');</script>";

if (!empty($error)) //echo $error;
     $volta = "../suporte.php?id=".$id_cliente;
	echo "<script>window.location='$volta&cat=GERAL&obj=Mensagem enviada com sucesso&type=sucesso'</script>";
}
?>
