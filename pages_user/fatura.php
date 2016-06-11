<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Fatura';
include 'partes/header.php';
?>
<script src="js/loader.js"></script>
   <script >
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['FATURAS', 'VALORES'],

          <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
                                    if (!$link) {
                                       die('Não foi possível conectar: ' . mysql_error());
                                    }
                                    $id_cliente = $_GET['id'];
                                    $valorpre=0;
                                    $valoratual=0;
                                    $valorpos=0;
                                    $limitetotal=0;

//----------------------------------PRÓXIMAS FATURAS
                                    $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago, ct.limitetotal,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/05/15' AND '2017/05/14' AND ct.id_cliente = " . $id_cliente;
                                   
                                    $result = $link->query($sql);

                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     

                                $t_parcela = $row["t_parcelas"];
                                $parcela = $row["parcelas"];
                                
                                if($t_parcela == NULL or $t_parcela == ""){
                                    
                                    $t_parcela = $row["parcelas"];
                                                                }
                                          $valor=number_format($row["valor"]*$row["quantidade"]/$t_parcela, 2, '.', '');                                       
                                          $valorpos= $valorpos+$valor; 
                                          $limitetotal=$row["limitetotal"];                                

                                       } $valorpos=number_format($valorpos, 2, '.', '');
                                       echo"['PRÓXIMAS FATURAS',".$valorpos."],";                                         
                                    } 

//----------------------------------FATURAS FECHADAS
                                   $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago, ct.limitetotal,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/03/15' AND '2016/05/14' AND ct.id_cliente = " . $id_cliente;
                                   
                                    $result = $link->query($sql);

                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     

                                $t_parcela = $row["t_parcelas"];
                                $parcela = $row["parcelas"];
                                
                                if($t_parcela == NULL or $t_parcela == ""){
                                    
                                    $t_parcela = $row["parcelas"];
                                                                }
                                          $valor=number_format($row["valor"]*$row["quantidade"]/$t_parcela, 2, '.', '');                                                
                                          $valorpre= $valorpre+$valor; 
                                          $limitetotal=$row["limitetotal"];                                

                                       } $valorpre=number_format($valorpre, 2, '.', '');
                                       echo"['PENDENTES',".$valorpre."],";
                                         
                                    } 

//----------------------------------FATURAS ATUAL
                                    $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago, ct.limitetotal,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND ct.id_cliente = " . $id_cliente;
                                   
                                    $result = $link->query($sql);

                                    if ($result->num_rows > 0) { 
                                       while($row = $result->fetch_assoc()) {     

                                $t_parcela = $row["t_parcelas"];
                                $parcela = $row["parcelas"];
                                
                                if($t_parcela == NULL or $t_parcela == ""){
                                    
                                    $t_parcela = $row["parcelas"];
                                                                }
                                          $valor=number_format($row["valor"]*$row["quantidade"]/$t_parcela, 2, '.', '');                                                
                                          $valoratual= $valoratual+$valor; 
                                          $limitetotal=$row["limitetotal"];                                

                                       } $valoratual=number_format($valoratual, 2, '.', '');
                                       echo"['FATURA ATUAL',".$valoratual."],";
                                         
                                    }

//----------------------------------LIMITE DISPONÍVEL
                                    $limitetotal = $limitetotal-$valorpre-$valoratual-$valorpos;

                                    echo"['LIMITE DISPONÍVEL',".$limitetotal."],"; 

                                    ?>

        ]);

        var options = {
          title: '',
		    legend: 'none',
          legend: {position: 'top', maxLines: 3},
          pieHole: 0.5,
          slices: {
            0: { color: '#58ACFA' },
            1: { color: '#FE2E2E' },
            2: { color: '#FE9A2E' },
            3: { color: '#04B45F' }
          }
          
          };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

      }
    </script>
<body style="color: #000;">
    <link href="css/fatura.css" rel="stylesheet">
    <!-- container section start -->
    <section id="container" class="">
        <!--header start-->
        <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo startt-->
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i> DETALHAR FATURAS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_document_alt"></i>DETALHAR FATURAS</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                FATURAS
                            </header>
                            <div class="panel-body">
                                <table width="1100" border="0" align="center"> 
                                    <tr>
                                        <td align="center">
                                            <b>FECHAMENTO DIA 15 E VENCIMENTO DIA 25</b>
                                            <div id="donutchart" style="width: 420px; height: 420px;"></div>
                                        </td>
                                        <td align="center">

                                            <div class="tabs-container">

                                                <input type="radio" name="tabs" class="tabs" id="tab3">
                                                <label for="tab3"><b>MAR</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/02/15' AND '2016/03/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            } else {
                                                                echo "<h4 align='center' style='color: red'><b>FATURA PENDENTE</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab4">
                                                <label for="tab4"><b>ABR</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/03/15' AND '2016/04/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            } else {
                                                                echo "<h4 align='center' style='color: red'><b>FATURA PENDENTE</b></h4>
<br><button class='btn btn-success btn-lg' type='submit' onclick='window.open(\"boleto_cef.php?id=$id_cliente&mes=04&valorfatura=$valorfm\")'/>
<b>GERAR BOLETO</b></button>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>

                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab5">
                                                <label for="tab5"><b>MAI</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"]  . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            } else {
                                                                echo "<h4 align='center' style='color: red'><b>FATURA PENDENTE</b></h4>
<br><button class='btn btn-success btn-lg' type='submit' onclick='window.open(\"boleto_cef.php?id=$id_cliente&mes=05&valorfatura=$valorfm\")'/>
<b>GERAR BOLETO</b></button>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                        
                                                </div>


                                                <input type="radio" name="tabs" class="tabs" id="tab6" checked>
                                                <label for="tab6"><b>JUN</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/05/15' AND '2016/06/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            } else {
                                                                echo "<h4 align='center' style='color: red'><b>FATURA PENDENTE</b></h4>
<br><button class='btn btn-success btn-lg' type='submit' onclick='window.open(\"boleto_cef.php?id=$id_cliente&mes=06&valorfatura=$valorfm\")'/>
<b>GERAR BOLETO</b></button>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>



                                                <input type="radio" name="tabs" class="tabs" id="tab7">
                                                <label for="tab7"><b>JUL</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/06/15' AND '2016/07/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            } 
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>


                                                <input type="radio" name="tabs" class="tabs" id="tab8">
                                                <label for="tab8"><b>AGO</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/07/15' AND '2016/08/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>


                                                <input type="radio" name="tabs" class="tabs" id="tab9">
                                                <label for="tab9"><b>SET</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/08/15' AND '2016/09/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>


                                                <input type="radio" name="tabs" class="tabs" id="tab10">
                                                <label for="tab10"><b>OUT</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/09/15' AND '2016/10/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"]. "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab11">
                                                <label for="tab11"><b>NOV</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/10/15' AND '2016/11/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab12">
                                                <label for="tab12"><b>DEZ</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/11/15' AND '2016/12/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab1">
                                                <label for="tab1"><b>JAN</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja
                                    WHERE cp.data BETWEEN '2016/12/15' AND '2017/01/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                $t_parcela = $row["t_parcelas"];
                                                                $parcela = $row["parcelas"];

                                                                if ($t_parcela == NULL or $t_parcela == "") {

                                                                    $t_parcela = $row["parcelas"];
                                                                }
                                                                $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');

                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>

                                                <input type="radio" name="tabs" class="tabs" id="tab2">
                                                <label for="tab2"><b>FEV</b></label>
                                                <div>
                                                    <p><?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = date('Y-m-d');

                                                        $link = mysqli_connect("localhost", "root", "", "laps");
                                                        if (!$link) {
                                                            die('Não foi possível conectar: ' . mysql_error());
                                                        }
                                                        $id_cliente = $_GET['id'];
                                                        $sql = "SELECT  cp.id_compra, cp.id_cartao,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, l.categoria, cp.data, cp.pago,
                                    EXTRACT(YEAR FROM cp.data) AS ano,
                                    EXTRACT(MONTH FROM cp.data) AS mes,
                                    EXTRACT(DAY FROM cp.data) AS dia,
                                    l.nome
                                    FROM compras cp
                                    join cartao c on cp.id_cartao = c.id_cartao
                                    join conta ct on ct.id_conta = c.id_conta
                                    join lojas l on l.id_loja = cp.id_loja   
                                    WHERE cp.data BETWEEN '2017/01/15' AND '2017/02/14' AND ct.id_cliente = " . $id_cliente;

                                                        $result = $link->query($sql);

                                                        echo "<table align='center' rules=rows width=600><tr>                                    
                                    <th><h4><b> LOJA </b></h4></th>
                                    <th><h4><b> DATA DA COMPRA </b></h4></th>
                                    <th><h4><b> CATEGORIA </b></h4></th>
                                    <th><h4><b> PARCELA </b></h4></th>
                                    <th><h4 align='right'><b> VALOR </b></h4></th>
                                    <th><h4><b></b></h4></th></tr>";
                                                        $i = 1;
                                                        $valorfm = 0;
                                                        $pgto = 0;
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {

                                                                if ($row["parcelas"] <= 1) {
                                                                    $row["parcelas"] = 1;
                                                                } //para pagamentos a vista aparecerem como 1
                                                                $valor = number_format($row["valor"] / $row["parcelas"], 2, '.', ''); // dividir as parcelas
                                                                if ($row["parcelas"] <= 1) {
                                                                    $parcela = 1;
                                                                } else {
                                                                    $parcela = $date - $row["mes"];
                                                                }


                                                                $valor = number_format($row["valor"] * $row["quantidade"], 2, '.', '');
                                                                echo "<tr><td>" . $row["nome"] . "</td>
                                          <td>" . $row["data"] . "</td>  
                                          <td>" . $row["categoria"] . "</td>
                                          <td align='center'>" . $parcela . "/" . $row["parcelas"] . "</td>                                          
                                          <td align='right'>R$" . $valor . "</td>";
                                                                $i++;
                                                                $valorfm = $valorfm + $valor;
                                                                if ($row["pago"] == 1) {
                                                                    $pgto = 1;
                                                                }
                                                            } $valorfm = number_format($valorfm, 2, '.', '');
                                                            echo "</tr></table><h4 align='right'><b> VALOR TOTAL = R$" . $valorfm . "                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h4><br><br>";
                                                            if ($pgto == 1) {
                                                                echo "<h4 align='center' style='color: green'><b>FATURA PAGA</b></h4>";
                                                            }
                                                        } else {

                                                            echo "</tr></table><br><br>NENHUMA FATURA PARA ESSE MÊS";
                                                        }
                                                        ?></p>
                                                </div>
                                            </div>
                                            <br><br><br><br><br><br>
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
    <?php
    include ('../modelo/TesteMen.php');
    include 'partes/footer.php';
    ?>