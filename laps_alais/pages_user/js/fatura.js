google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['FATURAS', 'VALORES'],

          <?php
                                    $link = mysqli_connect("localhost", "root", "", "laps");
    if (!$link) {
        die('Não foi possível conectar: '.mysql_error());
    }
    $id_cliente = $_GET['id'];
    $valorpre = 0;
    $valoratual = 0;
    $valorpos = 0;
    $limitetotal = 0;

    //----------------------------------PRÓXIMAS FATURAS
    $sql = "SELECT  cp.id_compra, cp.id_cartao, cp.parcelas,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, cp.categoria, cp.data, cp.pago, ct.limitetotal,
    EXTRACT(YEAR FROM cp.data) AS ano,
        EXTRACT(MONTH FROM cp.data) AS mes,
            EXTRACT(DAY FROM cp.data) AS dia
    FROM compras cp
    join cartao c on cp.id_cartao = c.id_cartao
    join conta ct on ct.id_conta = c.id_conta
    WHERE cp.data BETWEEN '2016/05/15' AND '2017/05/14' AND cp.pago = 0 AND ct.id_cliente = ".$id_cliente;

    $result = $link ->query($sql);

    if ($result ->num_rows > 0) {
        while ($row = $result ->fetch_assoc()) {

            $t_parcela = $row["t_parcelas"];
            $parcela = $row["parcelas"];

            if ($t_parcela == NULL or $t_parcela == ""){

                $t_parcela = $row["parcelas"];
            }
            $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');
            $valorpos = $valorpos + $valor;
            $limitetotal = $row["limitetotal"];

        } $valorpos = number_format($valorpos, 2, '.', '');
        echo"['PRÓXIMAS FATURAS',".$valorpos."],";

    }

    //----------------------------------FATURAS FECHADAS
    $sql = "SELECT  cp.id_compra, cp.id_cartao, cp.parcelas,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, cp.categoria, cp.data, cp.pago, ct.limitetotal,
    EXTRACT(YEAR FROM cp.data) AS ano,
        EXTRACT(MONTH FROM cp.data) AS mes,
            EXTRACT(DAY FROM cp.data) AS dia
    FROM compras cp
    join cartao c on cp.id_cartao = c.id_cartao
    join conta ct on ct.id_conta = c.id_conta
    WHERE cp.data BETWEEN '2016/03/15' AND '2016/04/14' AND cp.pago = 0 AND ct.id_cliente = ".$id_cliente;

    $result = $link ->query($sql);

    if ($result ->num_rows > 0) {
        while ($row = $result ->fetch_assoc()) {

            $t_parcela = $row["t_parcelas"];
            $parcela = $row["parcelas"];

            if ($t_parcela == NULL or $t_parcela == ""){

                $t_parcela = $row["parcelas"];
            }
            $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');
            $valorpre = $valorpre + $valor;
            $limitetotal = $row["limitetotal"];

        } $valorpre = number_format($valorpre, 2, '.', '');
        echo"['PENDENTES',".$valorpre."],";

    }

    //----------------------------------FATURAS ATUAL
    $sql = "SELECT  cp.id_compra, cp.id_cartao, cp.parcelas,SUBSTRING(cp.parcelas,1,1) as n_parcelas,SUBSTRING(cp.parcelas,3,1) as t_parcelas,cp.parcelas, cp.valor, cp.quantidade, cp.categoria, cp.data, cp.pago, ct.limitetotal,
    EXTRACT(YEAR FROM cp.data) AS ano,
        EXTRACT(MONTH FROM cp.data) AS mes,
            EXTRACT(DAY FROM cp.data) AS dia
    FROM compras cp
    join cartao c on cp.id_cartao = c.id_cartao
    join conta ct on ct.id_conta = c.id_conta
    WHERE cp.data BETWEEN '2016/04/15' AND '2016/05/14' AND cp.pago = 0 AND ct.id_cliente = ".$id_cliente;

    $result = $link ->query($sql);

    if ($result ->num_rows > 0) {
        while ($row = $result ->fetch_assoc()) {

            $t_parcela = $row["t_parcelas"];
            $parcela = $row["parcelas"];

            if ($t_parcela == NULL or $t_parcela == ""){

                $t_parcela = $row["parcelas"];
            }
            $valor = number_format($row["valor"] * $row["quantidade"] / $t_parcela, 2, '.', '');
            $valoratual = $valoratual + $valor;
            $limitetotal = $row["limitetotal"];

        } $valoratual = number_format($valoratual, 2, '.', '');
        echo"['FATURA ATUAL',".$valoratual."],";

    }

    //----------------------------------LIMITE DISPONÍVEL
    $limitetotal = $limitetotal - $valorpre - $valoratual - $valorpos;

    echo"['LIMITE DISPONÍVEL',".$limitetotal."],"; 

                                    ?>

        ]);

    var options = {
        title: '',
        legend: 'none',
        legend: { position: 'top', maxLines: 3 },
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