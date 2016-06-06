<?php

$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

if (isset($_POST["bloqueia"])) {
    $bloqueia = $_POST['bloqueia'];
    print_r($bloqueia);
}
//if (isset($_POST["ativa"])) {$ativa = $_POST['ativa'];}

if (isset($bloqueia)) {
    $cli_b = mysqli_query($link, "SELECT c.id_cliente, c.email FROM cliente c INNER JOIN conta cc ON cc.id_cliente = c.id_cliente where cc.id_conta = " . $bloqueia . ";");
    $data_cli_b = mysqli_fetch_assoc($cli_b);
    $mail = $data_cli_b["email"];
    include("./envia_msg_bloqueio.php");
    $bloqueia = '1';
    if (isset($falhou) == false) {
        $up = "UPDATE conta set status = " . $bloqueia . "where id_conta = " . $bloqueia;
        mysqli_query($link, $up);
        if (isset($up)) {
            print_r("situação 1");
            $volta = "../pages_user/bloqueio_usuario.php?id=" . $id_cliente;
            echo "<script>window.location='$volta&cat=GERAL&obj=Conta bloqueada com sucesso&type=sucesso'</script>";
            // $volta = $_SERVER['HTTP_REFERER'];
            // $volta=explode("&",$volta);
            // echo "<script>window.location='$volta[0]&obj=Bloqueio da conta&type=sucesso'</script>";
        } else {
            print_r("situação 2");
            $volta = "../pages_user/bloqueio_usuario.php?id=" . $id_cliente;
            echo "<script>window.location='$volta&cat=GERAL&obj=Conta bloqueada com sucesso&type=sucesso'</script>";
            // $volta = $_SERVER['HTTP_REFERER'];
            // $volta=explode("&",$volta);
            // echo "<script>window.location='$volta[0]&obj=Bloqueio da conta.&type=erro'</script>";
        }
    } else {
        $volta = $_SERVER['HTTP_REFERER'];
        $volta = explode("&", $volta);
        echo "<script>window.location='$volta[0]&obj=Bloqueio da conta&type=erro'</script>";
    }
}
//Não é pra ativar
/*
  else
  {
  $cli_a=mysqli_query($link,"SELECT c.id_cliente, c.email FROM cliente c INNER JOIN conta cc ON cc.id_cliente = c.id_cliente where cc.id_conta = ".$ativa.";");
  $data_cli_a=mysqli_fetch_assoc($cli_a);
  $mail = $data_cli_a["email"];
  include("./envia_msg_bloqueio.php");


  $up =	"UPDATE conta set status = 0"." where id_conta = ".$ativa;
  mysqli_query($link, $up);
  } */

/*
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
  } */
?>
