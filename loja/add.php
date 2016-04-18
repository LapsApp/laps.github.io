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
	$sql = "UPDATE produto set addcar = addcar+1 where id_prod = '".$id."'";
// Increasing the current value with 1
	if (mysqli_query($link, $sql)) { }
 ?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">alert ("PRODUTO ADICIONADO AO CARRINHO")</SCRIPT>
<SCRIPT language="JavaScript">window.location.href="http://localhost/laps/loja/lojaonline.php?cat=GERAL";</SCRIPT>