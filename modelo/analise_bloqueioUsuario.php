<?php

$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
   die('Não foi possível conectar: ' . mysql_error());
}

if (isset($_POST["bloqueia"])) {$bloqueia = $_POST['bloqueia'];}
if (isset($_POST["ativa"])) {$ativa = $_POST['ativa'];}



if (isset($bloqueia))
{

   $up =	"UPDATE conta set status = 1"." where id_conta = ".$bloqueia;
   mysqli_query($link, $up);

}else
{

   $up =	"UPDATE conta set status = 0"." where id_conta = ".$ativa;
   mysqli_query($link, $up);
}

if (isset($up)) {
   $volta = $_SERVER['HTTP_REFERER'];
   $volta=explode("&",$volta);
   echo "<script>window.location='$volta[0]&obj=Conta&type=sucesso'</script>";
} else {
   $volta = $_SERVER['HTTP_REFERER'];
   $volta=explode("&",$volta);
   echo "<script>window.location='$volta[0]&obj=Conta&type=erro'</script>";
}
if (!empty($error)) {
   $volta = $_SERVER['HTTP_REFERER'];
   $volta=explode("&",$volta);
   echo "<script>window.location='$volta[0]&obj=Conta&type=erro'</script>";
}

?>
