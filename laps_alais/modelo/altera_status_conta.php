<?php

$id_conta = $_POST['id_conta'];
$email = $_POST['email'];
$status = $_POST['status'];
$obs = $_POST['obs'];
$nome = $_POST['nome'];
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');
$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}


$sql = "UPDATE CONTA set  status = " . $status . ", comentario = '" . $obs . "' where id_conta =" . $id_conta;
echo $sql;
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
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

if ($status == 1) {
    $tipo = "BLOQUEIO";
} else {
    $tipo = "DESBLOQUEIO";
}
$msg = '<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>' . $tipo . ' DE CONTA</title>
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
<p align="Justify"><b>Prezado(a) ' . $nome . '! </b>
<p align="Justify">INFORMAMOS QUE OCORREU UM ' . $tipo . ' NA SUA CONTA  <br><br>
<p align="Justify">O MOTIVO DO ' . $tipo . '. FOI: ' . $obs . '</td>
<td width="300" align="center"><img src="http://lapsapp.github.io/img/laps.png" width="140" height="160">
</td>
</tr>
</table>

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
if (smtpmailer($mail, $from, 'LAPS', 'LAPS - ' . $tipo, $msg)) {
    $volta = $_SERVER['HTTP_REFERER'];
    echo "<script>window.location='http://localhost/laps/trunk/listar_contas.php?obj=Alteracao&type=sucesso'</script>";
} else {
    $volta = $_SERVER['HTTP_REFERER'];
    echo "<script>window.location='http://localhost/laps/trunk/listar_contas.php?obj=Alteracao&type=erro'</script>";
}
if (!empty($error)) {
    $volta = $_SERVER['HTTP_REFERER'];
    echo "<script>window.location='http://localhost/laps/trunk/listar_contas.php?obj=Alteracao&type=erro'</script>";
}
?>
