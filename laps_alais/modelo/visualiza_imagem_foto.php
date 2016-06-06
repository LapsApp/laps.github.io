<?php

$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
$id = $_GET['id'];
$tipo = $_GET['tipo'];

// Executa a query, trazendo os dados do banco
$query = "SELECT * FROM documentacao where id_doc = $id";
$resultado = mysqli_query($link, $query);

$foto = mysqli_result($resultado, 0, "foto");
echo "tipoooo:" . $tipo;
header("Content-type: image/jpeg");
print $foto;
?>