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
	
	### TRATANDO IMAGENS ###
	//$foto = $_POST['foto'];
	//$frente = $_POST['frente'];
	//$verso = $_POST['verso'];
	

	$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

//recupera os dados enviados atraves do formulário
//NOME TEMPORÁRIO
$file_tmp = $_FILES['foto']['tmp_name'];
$file_type = $_FILES['foto']['type'];
$nome_correto = $_FILES['foto']['name'];

$pont = fopen($file_tmp, "rb"); 
$dados = fread($pont,filesize($file_tmp));
fclose($pont);
$dados = addslashes($dados); 

$sql =	"UPDATE cliente set rg = ".$rg."
renda = ".$renda."
where id_cliente = ".$id_cliente;
mysqli_query($link, $sql);

//echo $sql;

$sql =	"INSERT into Endereco(id_cliente, rua, num, complemento, cep, cidade, estado) values(".$id_cliente.", 
		'".$rua."', 
		".$numero.",
		'".$complemento."',
		".$cep.",
		'".$cidade."',
		'".$estado."')";
mysqli_query($link, $sql);
//echo $sql;


$sql =	"INSERT into Conta(id_cliente, renda) values(".$id_cliente.", ".$renda.")";
mysqli_query($link, $sql);
//echo $sql;


/*$sql =	"INSERT into Documentacao(id_cliente, foto, doc_frente, doc_verso) values('".$id_cliente."', 
		'".$foto."',
		'".$frente."',
		'".$verso."')";*/
$sql =	"INSERT into Documentacao(id_cliente, foto) values('".$id_cliente."', 
		'../img/".$nome_correto."')";
mysqli_query($link, $sql);

//echo $sql;

$upload = move_uploaded_file($file_tmp, "../img/live.jpg");
echo "<img src='../img/$nome_correto' border='1'><br><br>";


/*
$query = "SELECT id_doc, foto FROM documentacao";
$resultado = mysqli_query($link, $query);

if($resultado){

while ($campo = mysqli_fetch_array($resultado)){
  $id   = $campo['0']; 
  $foto   = $campo['1'];

  echo "tipo__:".$file_type;
echo "<img src='modelo/visualiza_imagem_foto.php?id=$id&tipo=$file_type' border='1'><br><br>";
}  // Fecha if($resultado){
}

*/

?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("cadastro efetuado com sucesso!")</SCRIPT>
<SCRIPT language="JavaScript">window.location.href="http://localhost/LAPS/";</SCRIPT>