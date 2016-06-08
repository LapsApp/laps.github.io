<?php
$nome = $_POST['nome'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$id_cliente = $_POST['id_cliente'];
$bairro = $_POST['bairro'];


$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
	die('Não foi possível conectar: ' . mysql_error());
}

$sql =	"UPDATE cliente set nome = '".$nome."', email = '".$email."', cel = '".$cel."' where id_cliente = ".$id_cliente;
if (! mysqli_query($link, $sql))
{
	//$volta = $_SERVER['HTTP_REFERER'];
    //$volta=explode("&",$volta);
//echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
echo "<script>window.location='../cadastro.php?id=$id_cliente&obj=Alterar dados&type=erro'</script>";
}

$sql =	"UPDATE endereco set rua = '".$rua."', num = '".$numero."', complemento = '".$complemento."', cep = '".$cep."', cidade = '".$cidade."', bairro = '".$bairro."', estado = '".$estado."' where id_cliente = ".$id_cliente;

if(! mysqli_query($link, $sql))
{
	//$volta = $_SERVER['HTTP_REFERER'];
    //$volta=explode("&",$volta);
    //echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
	echo "<script>window.location='../cadastro.php?id=$id_cliente&obj=Alterar dados&type=erro'</script>";
}

	//$volta = $_SERVER['HTTP_REFERER'];
    //$volta=explode("&",$volta);
    //echo "<script>window.location='$volta[0]&obj=Alterar dados&type=sucesso'</script>";
echo "<script>window.location='../cadastro.php?id=$id_cliente&obj=Alterar dados&type=sucesso'</script>";


?>

