<?php
$rg = $_POST['rg'];
$cel = $_POST['cel'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$renda = $_POST['renda'];
$id_cliente = $_POST['id_cliente'];
$senha = $_POST['senha'];
$bairro = $_POST['bairro'];


$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
	die('Não foi possível conectar: ' . mysql_error());
}

// foto
$file_tmp = $_FILES['foto']['tmp_name'];
$file_type = $_FILES['foto']['type'];
$nome_correto = $_FILES['foto']['name'];

$pont = fopen($file_tmp, "rb");
$dados = fread($pont,filesize($file_tmp));
fclose($pont);
$dados = addslashes($dados);

// doc frente
$file_tmp_df = $_FILES['frente']['tmp_name'];
$file_type_df = $_FILES['frente']['type'];
$nome_correto_df = $_FILES['frente']['name'];

$pont_df = fopen($file_tmp_df, "rb");
$dados_df = fread($pont_df,filesize($file_tmp_df));
fclose($pont_df);
$dados_df = addslashes($dados_df);


// doc verso
$file_tmp_dv = $_FILES['verso']['tmp_name'];
$file_type_dv = $_FILES['verso']['type'];
$nome_correto_dv = $_FILES['verso']['name'];

$pont_dv = fopen($file_tmp_dv, "rb");
$dados_dv = fread($pont_dv,filesize($file_tmp_dv));
fclose($pont_dv);
$dados_dv = addslashes($dados_dv);

$sql =	"UPDATE cliente set rg = '".$rg."', cel = '".$cel."', senha = '".$senha."', cadastro = 3  where id_cliente = ".$id_cliente;
if (! mysqli_query($link, $sql))
{
	$volta = $_SERVER['HTTP_REFERER'];
    $volta=explode("&",$volta);
    echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
}

//echo $sql;

$sql =	"INSERT into Endereco(id_cliente, rua, num, complemento, cep, cidade,bairro,estado) values(".$id_cliente.",
'".$rua."',
".$numero.",
'".$complemento."',
".$cep.",
'".$cidade."',
'".$bairro."',
'".$estado."')";
if (! mysqli_query($link, $sql))
{
	$volta = $_SERVER['HTTP_REFERER'];
    $volta=explode("&",$volta);
    echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
}
//echo $sql;


$sql =	"INSERT into Conta(id_cliente, renda) values(".$id_cliente.", ".$renda.")";
if (! mysqli_query($link, $sql))
{
	$volta = $_SERVER['HTTP_REFERER'];
    $volta=explode("&",$volta);
    echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
}
//echo $sql;


/*$sql =	"INSERT into Documentacao(id_cliente, foto, doc_frente, doc_verso) values('".$id_cliente."',
'".$foto."',
'".$frente."',
'".$verso."')";*/
$sql =	"INSERT into Documentacao(id_cliente, foto, doc_frente,doc_verso) values('".$id_cliente."',
'localhost/LAPS/img/".$nome_correto."','localhost/LAPS/img/".$nome_correto_df."'".",'localhost/LAPS/img/".$nome_correto_dv."')";
if (! mysqli_query($link, $sql))
{
	$volta = $_SERVER['HTTP_REFERER'];
    $volta=explode("&",$volta);
    echo "<script>window.location='$volta[0]&obj=Alterar dados&type=erro'</script>";
}

//echo 'INSERT: '.$sql;


$upload = move_uploaded_file($file_tmp,'../img/'.$nome_correto);
//echo "<img src='../img/$nome_correto' border='1'><br><br>";

$upload = move_uploaded_file($file_tmp_df,'../img/'.$nome_correto_df);
//echo "<img src='../img/$nome_correto_df' border='1'><br><br>";

$upload = move_uploaded_file($file_tmp_dv,'../img/'.$nome_correto_dv);
//echo "<img src='../img/$nome_correto_dv' border='1'><br><br>";


$volta = $_SERVER['HTTP_REFERER'];
$volta=explode("&",$volta);
echo "<script>window.location='$volta[0]&obj=Cadastro&type=sucesso'</script>";
