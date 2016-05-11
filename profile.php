<?
		$id_cliente = $_GET['id'];
?>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>LAPS</title>

    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- google font -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800" rel="stylesheet" type="text/css">
    <!-- custom css -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-img3-body">
    <div class="container">
<section class="panel ">                                          
        <div class="panel-body bio-graph-info">
            <h2 class="text-center"><img class="img-responsive2" src="images/laps.png" width="40px"> COMPLETE SEU CADASTRO</h2>
            <form action='modelo/salva_finaliza_cadastro.php'  method="post" class="form-horizontal" role="form">      
            <input type="hidden" name='id_cliente' value="<?php echo  $_GET['id'];?>">                                            
                <hr>
                <h3>Dados</h3>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">RG</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control"  id="rg" name="rg" placeholder=" " required>
                    </div>
                    <label class="col-lg-1 control-label">Telefone</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="cel" name="cel" placeholder="( )" required>
                    </div>
                </div>
                
                <hr>
                <h3>Endereço</h3>
                <div class="form-group">
                     <!-- RUA -->
                    <label class="col-lg-2 control-label">Rua/Av.</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="rua" name="rua" placeholder=" " required>
                    </div>
                </div>
                
                <div class="form-group">
                    <!-- Nº -->
                    <label class="col-lg-2 control-label">Numero</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control"  id="numero" name="numero" placeholder=" " required>
                    </div>
                    
                    <!----- CEP -->
                    <label class="col-lg-1 control-label">CEP</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="email" placeholder=" " name ='cep' required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Complemento</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder=" ">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Cidade</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder=" " required>
                    </div>
                    
                    <!-- CIDADE -->
                    <label class="col-lg-1 control-label">Estado</label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="estado" name="estado" placeholder=" " required>
                    </div>
                    
                </div>
                
                <hr>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Sua Renda</label>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="renda" name="renda" placeholder="R$ " required>
                        </div>
                </div>
                
                <hr> <h3>Fotos</h3>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Foto Perfil</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">RG Frente</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="frente" name="frente"  required>
                        </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">RG Verso</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="verso" name="verso" required>
                        </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-primary" value="Enviar"/>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
        <!-- start footer -->
    <footer>
        <div class="container">
            <div class="row">
                <p>Copyright © 2016 LAPS - UVV</p>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <?php
      include ('modelo/funcoesJS.php');
      include ('modelo/TesteMen.php');
   ?>
</body>
</html>