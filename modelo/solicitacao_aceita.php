<?php

header('Content-Type: text/html; charset=iso-8859-1');
$from = 'lapsuvv@gmail.com';

require_once("../phpmailer/class.phpmailer.php");

define('GUSER', $from); // <-- Insira aqui o seu GMail
define('GPWD', 'lapsuvv2016');  // <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
    global $error;
    $mail = new PHPMailer();
    $mail->IsHTML(true);
    $mail->IsSMTP();  // Ativar SMTP
    $mail->SMTPDebug = 1;  // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;  // Autenticação ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465;    // A porta 465 deverá estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
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
<img src="http://lapsapp.github.io/img/assign1.jpg"><br>
<table id="t2" width="800">
<tr>
<td width="500">
<p align="Justify"><b>Prezado(a) usuário! </b>
<p align="Justify">Seja muito bem-vindo!<br><br>
<p align="Justify">Você foi escolhido para poder participar.<br>
Complete seu cadastro, acesse:
</td>
<td width="300" align="center"><img src="http://lapsapp.github.io/img/laps.png" width="140" height="160">
</td>
</tr>
</table>
<p align="center"><a href="http://localhost/laps/trunk/pages_user/cadastro_default.php?id=' . $aceita . '"><b>LAPSAPP.GITHUB.IO</b></a><br><br>
<p align="Justify">A Equipe LAPS realizará todos os procedimentos para que a validação de sua solicitação de participação ocorra em apenas alguns dias.<br><br>
<p align="Justify">Com o LAPS você poderá acompanhar em tempo real suas compras, visualizar seu limite disponível, gerar boletos de sua fatura, realizar bloqueios e desbloqueios do seu cartão, tudo online.
<br><br>
<p align="center">Atenciosamente,</p>
<p align="center"><b>EQUIPE LAPS</b><br><br></p>
<img src="http://lapsapp.github.io/img/assign2.jpg">
</td>
</tr>
</table>
</body>
</html>';

if (smtpmailer($mail, $from, 'LAPS', 'LAPS - Aceito', $msg)) {
    $volta = $_SERVER['HTTP_REFERER'];
    echo "<script>window.location='$volta?obj=Aceite&type=sucesso';</script>";
}
if (!empty($error))
    echo $error;
?>
