<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Consumo Categoria';
include 'partes/header.php';
?>
 <script src="js/loader.js"></script>
   <script >
      function gerar(){
   <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                       die('Não foi possível conectar: ' . mysql_error());
                                    }
                                    $id_cliente = $_GET['id'];
                                    $dt_inicial="2016/01/01";
                                    $dt_final="2017/12/31";
                                    $alimentacao=0;
                                    $tecnologia=0;
                                    $livraria=0;
                                    $esporte=0;
                                    $lazer=0;
                                    $calcado=0;
                                    $vestuario=0;
                                    $eletrodomestico=0;

                                    $sql = "SELECT  cp.valor, cp.quantidade, cp.categoria, cp.data
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    WHERE cp.data BETWEEN '$dt_inicial' AND '$dt_final' AND ct.id_cliente = '$id_cliente'";
                                   
                                    $result = $link->query($sql);

                                    
                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     
                                          

                                          $alimentacao=10;
                                          $tecnologia=20;
                                          $livraria=30;
                                          $esporte=40;
                                          $lazer=50;
                                          $calcado=60;
                                          $vestuario=70;
                                          $eletrodomestico=80;                              

                                       } 
                                         
                                    }


 echo"google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['CATEGORIAS', 'GASTOS'],
          ['ALIMENTAÇÃO', ".$alimentacao."], ['TECNOLOGIA', ".$tecnologia."], ['LIVRARIA', ".$livraria."],
          ['ESPORTE', ".$esporte."], ['LAZER', ".$lazer."], ['CALÇADOS', ".$calcado."],
          ['VESTUÁRIO', ".$vestuario."], ['ELETRODOMÉSTICO', ".$eletrodomestico."]       
        ]);       

        var options = {
          title: '',
          legend: '',
          legend: {position: 'top', alignment: 'center', maxLines: 2},
          is3D: true,
          slices: {
            0: { color: '#E02F2F', offset: 0.1 },
            1: { color: '#7AF4A9', offset: 0.1 },
            2: { color: '#F1A677', offset: 0.1 },
            3: { color: '#FFFF99', offset: 0.1 },
            4: { color: '#689DEA', offset: 0.1 },
            5: { color: '#B58F2A', offset: 0.1 },
            6: { color: '#EA5BEA', offset: 0.1 },
            7: { color: '#6F6F6F', offset: 0.1 },
          }
          
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }";
      ?>

  }
    </script>
  
<body style="color: #000;">
    <!-- container section start -->
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i> CONSUMO POR CATEGORIAS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_document_alt"></i>CONSUMO POR CATEGORIAS</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                CONSUMO POR CATEGORIAS
                            </header>
                            <div class="panel-body">
                                <table width="1100" border="0" align="center"> 
                                    <tr>
                                        <td align="center">
                                            <b>PERÍODO</b><br><br>
                                            DATA INÍCIAL: <input id="dt_inicial" type="date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            DATA FINAL: <input id="dt_final" id="piechart" type="date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button class='btn btn-primary' name='gerar' onclick="gerar()">GERAR GRÁFICO DE CONSUMO</button><br><br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <b>CONSUMO POR CATEGORIAS</b>
                                            <div id="piechart" style="width: 900px; height: 500px;"></div></div>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
    <style>
        .tabs-container {
            position: relative;
            height: 360px;
            max-width: 100%;
            margin: 0 auto;
        }
        .tabs-container p{
            margin: 0;
            padding: 0;
        }
        .tabs-container:after {
            content: '.';
            display: block;
            clear: both;
            height: 0;
            font-size: 0;
            line-height: 0;
            visibility: none;
        }
        input.tabs {
            display: none;
        }
        input.tabs + label {
            line-height: 10px;
            padding: 14px 14px 14px 14px;
            float: left;
            align: left;
            background: #444;
            color: #fff;
            cursor: pointer;
            transition: background ease-in-out .3s;
        }
        input.tabs:checked + label {
            color: #000;
            background: #eee;
        }

        input.tabs + label + div {
            width: 98%;
            opacity: 0;
            position: absolute;
            background: #eee;
            top: 40px;
            left: 0;
            height: 300px;
            padding: 10px;
            z-index: -1;
            transition: opacity ease-in-out .3s;
        }
        input.tabs:checked + label + div {
            opacity: 1;
            z-index: 1000;
        }
    </style>

    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>