<?php
$id_cliente = $_GET['id'];
$paginaTitulo = 'Lista de Compras';
include 'partes/header.php';
$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

//header('Content-Type: text/html; charset=iso-8859-1');
//header('Content-Type: text/html; charset=utf-8');
?>

<body style="color: #000;">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/lista_compras.css" rel="stylesheet" />
    <script src="../js/tablefilter/tablefilter.js"></script>  
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
                        <h3 class="page-header"><i class="fa fa-files-o"></i> VERIFICAR COMPRAS</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">INÍCIO</a></li>
                            <li><i class="icon_documents_alt"></i>VERIFICAR COMPRAS</li>
                        </ol>
                    </div>
                </div>
                <!-- Form validations -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                VERIFICAR COMPRAS
                            </header>
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="    ">
                                        <div class="form-group ">
                                            <div class="col-lg-12">
                                                <table id="demo" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Loja</th>
                                                            <th>Categoria</th>
                                                            <th>Data</th>
                                                            <th>Valor</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        mysqli_query($link, 'SET NAMES utf8');
														ini_set ('default_charset', 'UTF8');
                                                        //$id_cliente = 22; // remover depois de criar o link, GET no inicio da pagina
                                                        $r_cli = mysqli_query($link, "SELECT car.id_cartao FROM cartao car INNER JOIN conta cc ON cc.id_conta = car.id_conta where cc.id_cliente = " . $id_cliente . ";");
                                                        $data_cli = mysqli_fetch_assoc($r_cli);

                                                        $result = mysqli_query($link, "SELECT DISTINCT id_compra FROM compras where id_cartao = " . $data_cli['id_cartao'] . ";");
                                                        $total = 0;
                                                        while ($data = mysqli_fetch_assoc($result)) {
                                                            $result2 = mysqli_query($link, "SELECT sum(c.quantidade*c.valor) valor_compra,DATE_FORMAT(c.data,'%d/%m/%Y %H:%i:%S') data,l.categoria, l.nome, l.endereco FROM compras c
                                                            join lojas l on l.id_loja = c.id_loja where id_compra = " . $data['id_compra'] . ";");
                                                            $data2 = mysqli_fetch_assoc($result2);
                                                            //$result3=mysqli_query($link,"SELECT data,categoria FROM `compras` where id_compra = ".$data['id_compra'].";");
                                                            //$data3=mysqli_fetch_assoc($result3);
                                                            //$subtotal = ($data['quantidade'])*str_replace(",",".",$data["valor"]);
                                                            ?>
                                                            <tr>
                                                                <td style="line-height: 1;"><?php echo $data2["nome"] . "
                                                            <br> <small>" . $data2["endereco"] . "</small>" ?></td>
                                                                <td><?php echo $data2["categoria"] ?></td>
                                                                <td><?php echo $data2["data"] ?></td>
                                                                <td><?php echo number_format($data2["valor_compra"], 2, ',', '.'); ?></td>
                                                            </tr>
                                                        <?php } // FIM WHILE COMPRAS  ?>
                                                    </tbody>
                                                </table>
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


    <?php
    include ('../modelo/TesteMen.php');
    include ('../modelo/funcoesJS.php');
    include ('partes/footer.php');
    ?>