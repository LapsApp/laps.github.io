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
    $mail->SMTPAuth = true;  // Autentica��o ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465;    // A porta 465 dever� estar aberta em seu servidor
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

if (isset($bloqueia)) {
    $msg = '
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>BLOQUEIO DE CONTA</title>
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
<p align="Justify"><b>Prezado(a) usu�rio! </b>
<p align="Justify">Sua conta foi bloqueada com sucesso.<br><br>
</table>
<p align="Justify">Com o LAPS voc� poder� acompanhar em tempo real suas compras, visualizar seu limite dispon�vel, gerar boletos de sua fatura, realizar bloqueios e desbloqueios do seu cart�o, tudo online.
<br><br>
<p align="center">Atenciosamente,</p>
<p align="center"><b>EQUIPE LAPS</b><br><br></p>
<img src="http://lapsapp.github.io/img/assign2.jpg">
</td>
</tr>
</table>
</body>
</html>';

    if (smtpmailer($mail, $from, 'LAPS', 'LAPS - Bloqueio da conta', $msg) == false) {
        /* $volta = $_SERVER['HTTP_REFERER'];
          $volta=explode("&",$volta);
          echo "<script>window.location='$volta[0]&obj=Bloqueio&type=sucesso';</script>"; */
        $falhou = 'Erro';
    }
//if (!empty($error)) echo $error;
}

//N�o � pra ativar
/*
  if (isset($ativa)){
  $msg = '
  <html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ATIVA��O DE CONTA</title>
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
  <p align="Justify"><b>Prezado(a) usu�rio! </b>
  <p align="Justify">Sua conta foi ativada com sucesso.<br><br>
  </table>
  <p align="Justify">Com o LAPS voc� poder� acompanhar em tempo real suas compras, visualizar seu limite dispon�vel, gerar boletos de sua fatura, realizar bloqueios e desbloqueios do seu cart�o, tudo online.
  <br><br>
  <p align="center">Atenciosamente,</p>
  <p align="center"><b>EQUIPE LAPS</b><br><br></p>
  <img src="http://lapsapp.github.io/img/assign2.jpg">
  </td>
  </tr>
  </table>
  </body>
  </html>';

  if (smtpmailer($mail, $from, 'LAPS', 'LAPS - Ativacao da conta', $msg)) {
  $volta = $_SERVER['HTTP_REFERER'];
  $volta=explode("&",$volta);
  echo "<script>window.location='$volta[0]&obj=Ativacao&type=sucesso';</script>";

  }
  if (!empty($error)) echo $error;
  } */
?>
