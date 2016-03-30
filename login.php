<!DOCTYPE html >
<html lang="en" ng-app="loginApp">

<head>
    <meta charset="utf-8">
    <title>LAPS - Login</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body" ng-controller="LoginController">

    <div class="container">
        <form class="login-form" action="modelo/login_usuario.php" method="post">
            <div class="login-wrap">
                <p class="login-img">LAPS <i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="text" class="form-control" name="login" id="login" placeholder="CPF" autofocus>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Relembrar
                    <span class="pull-right"> <a href="#"> Esqueceu?</a></span>
                </label>
                <input class="btn btn-primary btn-lg btn-block"  name="entrar" id="entrar" type="submit" value = 'Login'>
               <br>       
                <!--<a class="" href="listar_cadastros.php">-->
                <input class="btn btn-info btn-lg btn-block" type="button" ng-click="pageindex()" value="Cadastre-se">
                </a>

            </div>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
<script src="js\controllers\LoginController.js"></script>

</html>