<?php
// Connection to database
$link = mysqli_connect("localhost", "root", "", "loja");
// Check connection
  if (mysqli_connect_errno())
    {
    echo "ERRO";
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

$id = $_GET['id'];
$nome = $_GET['nome'];
$cat = $_GET['cat'];
	$sql = "UPDATE produto set addcar = addcar+1 where id_prod = '".$id."'";
// Increasing the current value with 1
	if (mysqli_query($link, $sql)) { }
		echo"<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('".$nome." ADICIONADO AO CARRINHO')</SCRIPT>
             <SCRIPT language='JavaScript'>window.location.href='../loja/lojaonline.php?cat=".$cat."';</SCRIPT>"
 ?>
