<?php
if(!empty($_GET['convite']))
{
   $convida = 1;
}else{
   $convida = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="utf-8">
   <title>LAPS</title>
   

   <link rel="stylesheet" href="css/animate.min.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
   <!-- start preloader -->
   <div class="preloader">
      <div class="sk-spinner sk-spinner-rotating-plane"></div>
   </div>
   <!-- end preloader -->
   <!-- start navigation -->
   <nav class="navbar navbar-default navbar-fixed-top templatemo-nav" role="navigation">
      <div class="container">
         <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
            </button>
            <h2 class="brand brand-name navbar-left">
               <a href="#home" ><img class="img-responsive2" src="images/laps.png" width="20px">LAPS</a>
            </h2>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav text-uppercase">
               <li><a href="#home">Home</a></li>
               <li><a href="#feature">Como Funciona</a></li>
               <li><a href="#pricing">Quem Somos</a></li>
               <li><a href="#contact">Contato</a></li>
               <li><a href="#cadastro">Solicitar Parciticação</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li>
                  <button type="button" class="btn btn-primary" onclick="window.location='login.php';">
                     Entrar  <i class="fa fa-sign-in"></i>
                  </button>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!-- end navigation -->
   <!-- start home -->
   <section id="home">
      <div class="overlay">
         <div class="container">
            <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
                  <h1 class="text-upper">LAPS - O Cartão de Crédito que VOCÊ controla</h1>
                  <p class="tm-white">Com o LAPS você poderá acompanhar em tempo real suas compras, visualizar seu limite disponível, gerar
                     boletos de sua fatura, realizar bloqueios e desbloqueios do seu cartão, tudo online!<a href="login.html">Login</a>
                  </p>
                  <img src="images/software-img.png" class="img-responsive" alt="home img">
               </div>
               <div class="col-md-1"></div>
            </div>
         </div>
      </div>
   </section>
   <!-- end home -->

   <!-- start divider -->
   <section id="divider">
      <div class="container">
         <div class="row">
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <!-- <i class="fa fa-laptop"></i> -->
               <img src="images/responsive.png" height="100px" width="100px">
               <h3 class="text-uppercase">RESPONSIVE LAYOUT</h3>
               <p>Nossa página possui um design responsivo que possibilita você acessar sua conta de qualquer dispositivo
                  com a mesma facilidade de sempre!
               </p>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <!-- <i class="fa fa-twitter"></i> -->
               <img src="images/security.png" height="100px" width="100px">
               <h3 class="text-uppercase">SEGURANÇA</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
               </p>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <!--  <i class="fa fa-font"></i>
               <h3 class="text-uppercase">GOOGLE FONT</h3> -->
               <img src="images/support.png" height="100px" width="100px">
               <h3 class="text-uppercase">SUPORTE</h3>
               <p>Qualquer dúvida ou problema poderá rapidamente ser solucionado através de nossa equipe de suporte qye
                  está a disposição para atendê-lo.
               </p>
            </div>
         </div>
      </div>
   </section>
   <!-- end divider -->

   <!-- start feature -->
   <section id="feature">
      <div class="container">
         <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
               <h2 class="text-uppercase">Our Software Features</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
               </p>
               <p>
                  <span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               </p>
               <p>
                  <i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.
               </p>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
               <img src="images/software-img.png" class="img-responsive" alt="feature img">
            </div>
         </div>
      </div>
   </section>
   <!-- end feature -->

   <!-- start feature1 -->
   <section id="feature1">
      <div class="container">
         <div class="row">
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
               <img src="images/software-img.png" class="img-responsive" alt="feature img">
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
               <h2 class="text-uppercase">More of Your Software</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
               </p>
               <p><span><i class="fa fa-mobile"></i></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               </p>
               <p><i class="fa fa-code"></i>Quis autem velis reprehenderit et quis voluptate velit esse quam.
               </p>
            </div>
         </div>
      </div>
   </section>
   <!-- end feature1 -->

   <!-- start pricing -->
   <section id="pricing">
      <div class="container">
         <div class="row">
            <div class="col-md-12 wow bounceIn">
               <h2 class="text-uppercase">Quem Somos</h2>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/alais.png" height="100px" width="100px">
               <h3 class="text-uppercase">Alais Salino</h3>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/diogo.png" height="100px" width="100px">
               <h3 class="text-uppercase">Diogo Diniz</h3>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/felipe.png" height="100px" width="100px">
               <h3 class="text-uppercase">Felipe Vogel</h3>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/lucas.png" height="100px" width="100px">
               <h3 class="text-uppercase">Lucas Azevedo</h3>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/micael.png" height="100px" width="100px">
               <h3 class="text-uppercase">Micael Aguiar</h3>
            </div>
            <div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/myriana.png" height="100px" width="100px">
               <h3 class="text-uppercase">Myriana Freitas</h3>
            </div>
            <div class="col-md-12 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
               <img src="images/rodrigo.png" height="100px" width="100px">
               <h3 class="text-uppercase">Rodrigo Ribeiro</h3>
            </div>
         </div>
      </div>
   </section>
   <!-- end pricing -->

   <!-- start contact -->
   <section id="contact">
      <div class="overlay">
         <div class="container">
            <div class="row">
               <div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                  <h2 class="text-uppercase">Nosso Contato</h2>
                  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p> -->
                  <address>
                     <p><i class="fa fa-map-marker"></i>Av. Comissário José Dantas de Melo, Nº 21, Vila Velha - ES, Brasil</p>
                     <p><i class="fa fa-phone"></i>(27) 3421-2001</p>
                     <p><i class="fa fa-envelope-o"></i> contato@laps.com.br</p>
                  </address>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- end contact -->


   <!-- start feature2 -->
   <section id="cadastro">
      <div class="container">
         <div class="row">
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.6s">
               <h2 class="text-uppercase">Solicite Seu Cadastro</h2>
            </div>
            <div class="col-md-12 wow fadeInUp" data-wow-delay="0.6s">
               <div class="contact-form">
                  <form action="modelo/cria_cliente.php" method="post">
                     <div class="col-md-offset-2 col-md-8">
                        <input type="text" class="form-control" name ='nome' required placeholder="Nome">
                     </div>
                     <div class="col-md-offset-2 col-md-4">
                        <input type="email" class="form-control" name ='email' required placeholder="Email">
                     </div>
                     <div class=" col-md-4">
                        <input type="hidden" name="convite" value="<?php echo $convida; ?>">
                        <input type="text" class="form-control" name ='cpf' minlength="11" maxlength="11" required placeholder="CPF">
                     </div>
                     <div class="col-md-offset-2 col-md-8">
                        <input type="submit" class="form-control text-uppercase" value="SOLICITAR">
                     </div>
                  </form>
               </div>
            </div>
            <p><span class="label label-danger"><i class="fa fa-info-circle"></i> Sujeito à análise e aprovação de crédito</span></p>
         </div>
      </div>
   </section>
   <!-- end feature2 -->


   <!-- start footer -->
   <footer>
      <div class="container">
         <div class="row">
            <p>Copyright © 2016 LAPS - UVV</p>
         </div>
      </div>
   </footer>
   <!-- end footer -->

   <script src="js/jquery.js"></script>
   <script src="js/jquery.singlePageNav.min.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <?php
      include ('modelo/funcoesJS.php');
      include ('modelo/TesteMen.php');
   ?>
</body>

</html>
