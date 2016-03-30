<!DOCTYPE html>
<?
    $id_cliente = $_GET['id'];
?>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>LAPS</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
    </head>

    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="index.html" class="logo">L<span class="lite">APS</span></a>
                <!--logo end-->

                <div class="nav search-row" id="top_menu">
                    <!--  search form start -->
                    <ul class="nav top-menu">
                        <li>
                            <form class="navbar-form">
                                <input class="form-control" placeholder="Search" type="text">
                            </form>
                        </li>
                    </ul>
                    <!--  search form end -->
                </div>


            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a class="" href="index.html">
                                <i class="icon_house_alt"></i>
                                <span>INICIO</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="cadastro.php?id=0">
                                <i class="icon_document_alt"></i>
                                <span>MEUS DADOS</span>
                            </a>
                        </li>
                        <li>
                            <a class="" href="convites.php">
                                <i class="icon_genius"></i>
                                <span>INDICADOS</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="">
                                <i class="icon_desktop"></i>
                                <span>XXXXX</span>
                            </a>
                        </li>
                        <li>
                            <a class="">
                                <i class="icon_piechart"></i>
                                <span>XXXXX</span>
                            </a>
                        </li>
                        <li class="">
                            <a class="">
                                <i class="icon_table"></i>
                                <span>XXXXX</span>
                            </a>
                            <li class="">
                                <a class="">
                                    <i class="icon_documents_alt"></i>
                                    <span>XXXXX</span>
                                </a>
                            </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-files-o"></i> INDICADOS</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">INÍCIO</a></li>
                                <li><i class="icon_document_alt"></i>INDICADOS</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Form validations -->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    INDICADOS
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="form-validate form-horizontal" id="feedback_form" method="post" action="modelo/envia_convite.php">
                                            <div class="form-group ">

                                                <label for="cname" class="control-label col-lg-2">Email indicado <span class="required">*</span></label>
                                                <div class="col-lg-4">
                                                    <input class="form-control" id="subject" name="email" type="mail" required />
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-primary" type="submit">ENVIAR CONVITE</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
        <!-- container section end -->

        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- jquery validate js -->
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>

        <!-- custom form validation script for this page-->
        <script src="js/form-validation-script.js"></script>
        <!--custome script for all page-->
        <script src="js/scripts.js"></script>


    </body>

    </html>