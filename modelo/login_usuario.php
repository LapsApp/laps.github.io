<?php
//    print_r($_POST);
   $login = $_POST['login'];
   $pass= $_POST['senha'];
   $connect = mysqli_connect('localhost','root','','laps');
   if (isset($entrar)) {
       $verifica = mysqli_query($connect, "SELECT * FROM usuarios WHERE cpf = '".$login."' AND senha = '".$pass.'" ") or die("erro ao selecionar");
      print_r($verifica);
       if (mysqli_num_rows($verifica)<=0){
           echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
           die();
           }else{
               setcookie("login",$login);
               header("Location:cadastro.php");
           }
       }
?>


