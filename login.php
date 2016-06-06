<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LAPS - Login</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="CSS/style-responsive.css" rel="stylesheet" />
    </head>
    <body class="login-img3-body">
        <div class="container">
            <form class="login-form" action="modelo/login.php" method="post">
                <div class="login-wrap">
                    <p class="login-img">LAPS <i class="icon_lock_alt"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" name="login" id="login" placeholder="CPF" minlength="11" maxlength="11" onkeypress="return SomenteNumero(event);" required autofocus>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                    </div>
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Relembrar
                        <span class="pull-right"> <a href="#"> Esqueceu?</a></span>
                    </label>
                    <input class="btn btn-primary btn-lg btn-block"  name="entrar" id="entrar" type="submit" value = 'Login' >
                    <br>
                    <input class="btn btn-info btn-lg btn-block" type="button" onclick="window.open('index.php#cadastro', '_parent');" value="Cadastre-se">
                </div>
            </form>
        </div>

        <script language='JavaScript'>
            function SomenteNumero(e) {
                var tecla = (window.event) ? event.keyCode : e.which;
                if ((tecla > 47 && tecla < 58))
                    return true;
                else {
                    if (tecla == 8 || tecla == 0)
                        return true;
                    else
                        return false;
                }
            }
        </script>

        <script src="js/jquery.js"></script>
        <script src="js/jquery.singlePageNav.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include ('modelo/funcoesJS.php');
        include ('modelo/TesteMen.php');
        ?>
    </body>
</html>
