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
        echo "<script>window.location='$volta?obj=Login&type=erro';</script>";
        die();
    } else {
        while ($row = $result->fetch_assoc()) {
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