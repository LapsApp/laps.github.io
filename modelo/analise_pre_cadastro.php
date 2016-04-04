<?php

$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

	if (isset($_POST["aceita"])) {$aceita = $_POST['aceita'];}
	if (isset($_POST["rejeita"])) {$rejeita = $_POST['rejeita'];}
	

	
	if (isset($aceita)) 
	{
    
	   $sql = "SELECT id_cliente, nome, cpf, email, convite, dt_solicitacao FROM Cliente WHERE id_cliente=".$aceita."";
	   $result = $link->query($sql);
	   if ($result->num_rows > 0) 
	   {
			while($row = $result->fetch_assoc()) 
			{ 
			$mail = $row["email"];
			include("./solicitacao_aceita.php");
			}
	   }
	   
	$up =	"UPDATE cliente set cadastro = 2"." where id_cliente = ".$aceita;
	mysqli_query($link, $up);
	
	}else
	{
	   $sql = "SELECT id_cliente, nome, cpf, email, convite, dt_solicitacao FROM Cliente WHERE id_cliente=".$rejeita."";
	   $result = $link->query($sql);
	   if ($result->num_rows > 0) 
	   {
			while($row = $result->fetch_assoc()) 
			{ 
			$mail = $row["email"];
			include("./solicitacao_recusa.php");
			}
	   }
	 
	$up =	"UPDATE cliente set cadastro = 1"." where id_cliente = ".$rejeita;
	mysqli_query($link, $up);
	}
	
?>