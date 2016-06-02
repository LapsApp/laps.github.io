<?php

$from = 'contato@laps.16mb.com';
$to = $_POST['mail'];
$subject = 'Assunto';
$message = 'localhost/laps/index.php?convite=1';
$headers = 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

ini_set(sendmail_from, $from);
if (mail($to, $subject, $message, $headers)) 
{
   echo "<script>window.location='../pages_user/convites.php?obj=Convite&type=sucesso'</script>";
}
else {
   $volta = $_SERVER['HTTP_REFERER'];
   echo "<script>window.location='../pages_user/convites.php?obj=Convite&type=erro'</script>";
}
?>