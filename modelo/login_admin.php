<?php

$login = $_POST['login'];
$senha = $_POST['senha'];
$entrar = $_POST['entrar'];

// $sql = "SELECT * FROM  into Cliente(nome, email, cpf,convite)values('".$nome."',
//     '".$email."',
//     '".$cpf."',
//     ".$convite.")";

$connect = mysqli_connect('localhost', 'root', '', 'laps');
if (isset($entrar)) {
    $verifica = mysqli_query($connect, "SELECT * FROM cliente WHERE cpf = '$login' AND senha = '$senha'") or die("erro ao selecionar");
    if (mysqli_num_rows($verifica) <= 0) {
        $volta = $_SERVER['HTTP_REFERER'];
        echo "<script>window.location='$volta';alert('Login e/ou senha incorretos');</script>";
        die();
    } else {
        setcookie("login-admin", $login);
        header("Location:../menu_adm.php");
    }
}
?>
