function gerar() {
   <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
    if (!$link) {
        die('Não foi possível conectar: '.mysql_error());
    }
    $id_cliente = $_GET['id'];
    $dt_inicial = "2016/01/01";
    $dt_final = "2017/12/31";
    $alimentacao = 0;
    $tecnologia = 0;
    $livraria = 0;
    $esporte = 0;
    $lazer = 0;
    $calcado = 0;
    $vestuario = 0;
    $eletrodomestico = 0;

    $sql = "SELECT  cp.valor, cp.quantidade, cp.categoria, cp.data
    FROM compras cp
    join cartao c on cp.id_cartao = c.id_cartao
    join conta ct on ct.id_conta = c.id_conta
    WHERE cp.data BETWEEN '$dt_inicial' AND '$dt_final' AND ct.id_cliente = '$id_cliente'";
                                   
    $result = $link ->query($sql);


    if ($result ->num_rows > 0) {
        while ($row = $result ->fetch_assoc()) {


            $alimentacao = 10;
            $tecnologia = 20;
            $livraria = 30;
            $esporte = 40;
            $lazer = 50;
            $calcado = 60;
            $vestuario = 70;
            $eletrodomestico = 80;

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
            legend: { position: 'top', alignment: 'center', maxLines: 2 },
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
    } ";
        ?>
  }