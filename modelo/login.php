<?php
$login = $_POST['login'];
$senha = $_POST['senha'];
$entrar = $_POST['entrar'];

$connect = mysqli_connect('localhost', 'root', '', 'laps');
if (isset($entrar)) {
    $sql = ("SELECT tipo, id_cliente FROM cliente WHERE cpf = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    $result = $connect->query($sql);

    if ($result->num_rows <= 0) {
        $volta = $_SERVER['HTTP_REFERER'];
		$volta=explode("?",$volta);
        echo "<script>window.location='$volta[0]?obj=Login&type=erro';</script>";
        die();
    } else {
        while ($row = $result->fetch_assoc()) {
			//Atualiza a sessão para 1 - Logado
			$sqlSessao = "UPDATE cliente set sessao = 1 where id_cliente = ".$row["id_cliente"];
			if (! mysqli_query($connect, $sqlSessao))
				{
					$volta = $_SERVER['HTTP_REFERER'];
					$volta=explode("?",$volta);
					echo "<script>window.location='$volta[0]?obj=Login&type=erro'</script>";
				}
			
            if ($row["tipo"] == 1) {
                setcookie("login", $login);
                header("Location:../pages_adm/menu_adm.php?id=" . $row["id_cliente"]);
            } else {
                setcookie("login", $login);
                header("Location:../pages_user/menu_usuario.php?id=" . $row["id_cliente"]);
            }
        }
    }
}
?>