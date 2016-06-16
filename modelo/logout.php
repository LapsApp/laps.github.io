<?php
		
	$id_cliente = $_GET['id'];

	$connect = mysqli_connect('localhost', 'root', '', 'laps');
	
	$sql = "UPDATE cliente set  sessao = 0 where id_cliente =" . $id_cliente;
	if (! mysqli_query($connect, $sql)) {
		echo "<script>window.location='../pages_user/menu_usuario.php?id=".id_cliente ."&obj=logout&type=erro'</script>";
	}
	
	echo "<script>window.location='../index.php'</script>";

?>