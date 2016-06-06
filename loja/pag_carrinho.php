<?php

// arquivo atual.

include ('../modelo/funcoesJS.php');
include ('../modelo/TesteMen.php');

$controle = 1;

$link = mysqli_connect("localhost", "root", "", "loja");
$link_laps = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}


if (isset($_POST["vl_total"])) {
    $vl_total = $_POST['vl_total'];
}

if (isset($_POST["num_cartao"])) {
    $num_cartao = $_POST['num_cartao'];
}
if (isset($_POST["validade"])) {
    $validade = $_POST['validade'];
}
if (isset($_POST["nome"])) {
    $nome = $_POST['nome'];
}
if (isset($_POST["codigo"])) {
    $codigo = $_POST['codigo'];
}
if (isset($_POST["num_parcelas"])) {
    $num_parcelas = $_POST['num_parcelas'];
}

$r = "SELECT id_cartao FROM cartao WHERE numero = " . $num_cartao . " AND validade = '" . $validade . "' AND nome_cliente = '" . $nome . "' AND codigo = " . $codigo . ";";

$result0 = mysqli_query($link_laps, $r);
$data0 = mysqli_fetch_assoc($result0);

// trocando para id cartao

if ($data0['id_cartao']) {
    $_POST["num_cartao"] = $data0['id_cartao'];
} else {
    $controle = 0;
    $volta = 'lojaonline.php';
    echo "<script>window.location='$volta?cat=GERAL&obj=Compra devido ao cartao&type=erro'</script>";
}

$result = mysqli_query($link, "SELECT id_prod,id_loja,nome,valor,addcar FROM produto where addcar != 0;");

$result2 = mysqli_query($link_laps, "SELECT MAX(id_compra)+1 as max FROM compras");
$data2 = mysqli_fetch_assoc($result2);

if ($data2['max'] == NULL) {
    $data2['max'] = 1;
}

$result3 = mysqli_query($link_laps, "SELECT cc.limite,cc.id_conta, cc.status FROM CONTA cc INNER JOIN cartao cart ON cc.id_conta = cart.id_conta WHERE cart.id_cartao = " . $_POST["num_cartao"] . ";");
$data3 = mysqli_fetch_assoc($result3);

// VERIFICAR O LIMITE
if ($data3['limite'] < $_POST['vl_total']) {

    $controle = 0;
    $volta = '../loja/lojaonline.php';
    $volta = 'lojaonline.php';
    echo "<script>window.location='$volta?cat=GERAL&obj=Compra por falta de limite&type=erro'</script>";
}

//VERIFICAR CONTA BLOQUEADA
if ($data3['status'] == 1) {

    $controle = 0;
    $volta = '../loja/lojaonline.php';
    $volta = 'lojaonline.php';
    echo "<script>window.location='$volta?cat=GERAL&obj=compra. Conta bloqueada.&type=erro'</script>";
}

$compras_ok = 0;
if ($controle) {
    while ($data = mysqli_fetch_assoc($result)) {

        if ($num_parcelas == 1) {
            $insert = "INSERT INTO compras(id_compra,id_cartao,valor,quantidade,parcelas,id_loja) values(" . $data2['max'] . "," . $_POST["num_cartao"] . "," . str_replace(",", ".", $data["valor"]) . "," . $data['addcar'] . ",'" . $num_parcelas . "','" . $data['id_loja'] . "');";
            echo $insert . "</br>";
            mysqli_query($link_laps, $insert);
            $insert = '';
            $compras_ok = 1;
        } else {


            for ($i = 1; $i <= $num_parcelas; $i++) {


                // na compra sera inserido um registro para cada parcela, mantendo o valor unitario e quantidade, a conta sera feita ao mostrar valor total
                // que sera preciso considerar: valor*quantidade/parcela										 


                $result2 = mysqli_query($link_laps, "SELECT MAX(id_compra)+1 as max FROM compras");
                $data2 = mysqli_fetch_assoc($result2);

                $insert = "INSERT INTO compras(id_compra,id_cartao,valor,quantidade,parcelas,id_loja) values(" . $data2['max'] . "," . $_POST["num_cartao"] . "," . str_replace(",", ".", $data["valor"]) . "," . $data['addcar'] . ",'" . $i . "/" . $num_parcelas . "','" . $data['id_loja'] . "');";
                echo $insert . "</br>";
                mysqli_query($link_laps, $insert);
                //$insert = '';
                $compras_ok = 1;




                // AJUSTANDO A DATA DA COMPRA PARA A PARCELA, VISTO QUE A DATA EH INSERIDA AUTOMATICAMENTE PELO MYSQL

                if ($i > 1) {

                    $result2 = mysqli_query($link_laps, "SELECT MAX(id_compra) as max FROM compras");
                    $data2 = mysqli_fetch_assoc($result2);

                    $up_dt = "";
                    $up_dt = "UPDATE compras set data = ADDDATE(data, INTERVAL 1 MONTH) WHERE id_compra =" . ($data2['max']) . ";";
                    //echo $up_dt."<br/>";
                    mysqli_query($link_laps, $up_dt);




                    if ($i == 3) {
                        mysqli_query($link_laps, $up_dt);
                        $up_dt = "";
                    }
                }
            }
        }
    }
    if ($compras_ok) {
        $novo_limite = $data3['limite'] - ($_POST['vl_total']);
        $novo_limite = number_format($novo_limite, 2, '.', '');

        $up2 = "UPDATE conta set limite = " . $novo_limite . " where id_conta = " . $data3['id_conta'] . ";";
        mysqli_query($link_laps, $up2);

        $up = "UPDATE produto set addcar = 0 where addcar != 0 ";
        mysqli_query($link, $up);

        $volta = 'lojaonline.php';
        echo "<script>window.location='$volta?obj=na compra&type=sucesso&cat=GERAL'</script>";
    }
}
?>