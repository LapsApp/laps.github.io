<?php
$id_loja = $_GET['loja'];
$id_cliente = $_GET['cliente'];
$paginaTitulo = 'Lista de Loja';
include 'partes/header.php';
$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
mysqli_query($link, 'SET NAMES utf8');
ini_set ('default_charset', 'UTF8');
$result2 = mysqli_query($link, "SELECT NOME, ENDERECO, CATEGORIA, LATITUDE, LONGITUDE FROM LOJAS WHERE id_loja = ".$id_loja);
$data2 = mysqli_fetch_assoc($result2);
$nome = $data2["NOME"];
$endereco = $data2["ENDERECO"];
$categoria = $data2["CATEGORIA"];
$latitude = $data2["LATITUDE"];
$longitude = $data2["LONGITUDE"];
//header('Content-Type: text/html; charset=iso-8859-1');
//header('Content-Type: text/html; charset=utf-8');
?>

<body style="color: #000;">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/lista_compras.css" rel="stylesheet" />
    <script src="../js/tablefilter/tablefilter.js"></script>  
    <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>

    <!-- container section startt -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>" class="logo">L<span class="lite">APS</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <ul class="nav top-menu">
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <?php include 'partes/nav.php'; ?>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> VERIFICAR COMPRAS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_documents_alt"></i>LISTAR LOJA</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                LISTAR LOJA
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <?php echo $nome . " - ". $categoria; ?>
                                    <?php echo "<br><small>".$endereco. "</small>"; ?>
                                    <div id="map" style="width: 500px; height: 400px;"></div>
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

    <script data-config>
        var filtersConfig = {
            base_path: '../js/tablefilter/',
            col_1: 'select',
            col_2: 'select',
            col_3: 'select',
            alternate_rows: true,
            rows_counter: true,
            btn_reset: true,
            loader: true,
            status_bar: true,
            mark_active_columns: true,
            highlight_keywords: true,
            col_number_format: [
                null, null, null,
                'EU'],
            custom_options: {
                cols: [3],
                texts: [[
                        '0 - 200',
                        '201 - 200',
                        '401 - 300',
                        '601 - 400',
                        '801 - 500',
                        '> 1000'
                    ]],
                values: [[
                        '>0 && <=200',
                        '>200 && <=400',
                        '>400 && <=600',
                        '>600 && <=700',
                        '>800 && <=1000',
                        '>1000',
                    ]],
                sorts: [false]
            },
            col_widths: [
                '150px', '100px', '100px',
                '70px', '70px', '70px',
                '70px', '60px', '60px'
            ]
        };

        var tf = new TableFilter('demo', filtersConfig);
        tf.init();
    </script>
      <script type="text/javascript">
    var locations = [
      ['Loja 1', <?php echo $latitude; ?>, <?php echo $longitude; ?>, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>


    <?php
    include ('../modelo/TesteMen.php');
    include ('../modelo/funcoesJS.php');
    include ('partes/footer.php');
    ?>