<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>LOJAONLINE</title>
<style id="jsbin-css">
#header {
    color: white;
    background: linear-gradient(to top, black, white, black);
    text-align:center;
    padding:5px;
    font-size:30px;
    text-shadow: 5px 5px 5px grey;
}

.btn {
  color: #FFFFFF;
  background-color: #000000;
  border-color: grey;
  line-height: 20px
}

.btn:hover {
  color: #000000;
  background-color: #FFFFFF;
  border-color: grey;
  line-height: 20px
}

#barra {
    background: linear-gradient(to top, black, white);
    color:white;
    clear:both;
    text-align:center;
    padding:5px; 
}

</style>
</head>
<body style="margin: 0px; padding: 0px; height: 100%; width:100%;">
 
<div id="header">
<h1>LOJAONLINE.COM</h1>
</div>
  
<div id="barra" style="line-height: 40px"><b>
CATEGORIAS : 
<select class="postform" id="cat" name="cat" width="500" onchange="location=this.options[this.selectedIndex].value;">
<option>SELECIONE UMA CATEGORIA</option>
<option value="../loja/lojaonline.php?cat=GERAL">GERAL
   </option>
<option value="../loja/lojaonline.php?cat=ALIMENTACAO">ALIMENTACAO
   </option>
<option value="../loja/lojaonline.php?cat=TECNOLOGIA">TECNOLOGIA
   </option>
<option value="../loja/lojaonline.php?cat=LIVRARIA">LIVRARIA
   </option>
<option value="../loja/lojaonline.php?cat=ESPORTE">ESPORTE
   </option>
<option value="../loja/lojaonline.php?cat=LAZER">LAZER
   </option>
<option value="../loja/lojaonline.php?cat=CALCADO">CALCADOS
   </option>
<option value="../loja/lojaonline.php?cat=VESTUARIO">VESTUARIO
   </option>
<option value="../loja/lojaonline.php?cat=ELETRODOMESTICO">ELETRODOMESTICO
   </option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
CARRINHO : 
<?php
                        $link = mysqli_connect("localhost", "root", "", "loja");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }

                        $result=mysqli_query($link,"SELECT sum(addcar) as total FROM produto");
                        $data=mysqli_fetch_assoc($result);

                        if($data['total']>0){
                           echo $data['total'];
                        }else{ echo "0";}
                        ?>

ITENS&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn' name='adicionar' value='' type='submit' onclick="window.location='../loja/visualizar_carrinho.php';">VISUALIZAR CARRINHO</button></b></div>

<table align="center" width="1100" border="0" cellspacing="30"> 
<tr>

<?php
header('Content-Type: text/html; charset=iso-8859-1');
$cat = $_GET['cat'];

  $link = mysqli_connect("localhost", "root", "", "loja");
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

if($cat!='GERAL'){$sql = "SELECT id_prod, nome, estoque, valor, categoria, loja, foto FROM Produto WHERE categoria='".$cat."' ORDER BY nome";}
else {$sql = "SELECT id_prod, nome, estoque, valor, categoria, loja, foto FROM Produto ORDER BY nome";}
$result = $link->query($sql);

$i =1;
if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()) { 
    echo "<td align='center'><form method='post' action='add.php?id=".$row["id_prod"]."&nome=".$row["nome"]."&cat=".$row["categoria"]."'>";
if($row["categoria"]=="ALIMENTACAO"){echo "<div style='width: 250px; height: 350px; background: #FF9999; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="TECNOLOGIA"){echo "<div style='width: 250px; height: 350px; background: #CCFFE5; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="LIVRARIA"){echo "<div style='width: 250px; height: 350px; background: #FFE5CC; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="ESPORTE"){echo "<div style='width: 250px; height: 350px; background: #CCFF99; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="LAZER"){echo "<div style='width: 250px; height: 350px; background: #C6E2FF; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="CALCADO"){echo "<div style='width: 250px; height: 350px; background: #EEDD82; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="VESTUARIO"){echo "<div style='width: 250px; height: 350px; background: #FFBBFF; box-shadow: 0px 20px 15px grey'>";}
if($row["categoria"]=="ELETRODOMESTICO"){echo "<div style='width: 250px; height: 350px; background: #CFCFCF; box-shadow: 0px 20px 15px grey'>";}
echo "<br><b>".$row["loja"]."</b><br><br>
<div id='img'><img src='".$row["foto"]."'>
</div><b><br>".$row["nome"]."<br>R$".$row["valor"]."<br><br>
<button id='btn' class='btn' name='adicionar' value='' type='submit'>ADICIONAR AO CARRINHO</button>
</b></div></form>
</td>";
if($i%4==0){echo "</tr><tr>";}
$i++;
  }
}

?>
</tr>

</table>

<div id="barra">
Copyright © LOJAONLINE.COM
</div>
 
   <script src="../js/jquery.js"></script>
   <script src="../js/jquery.singlePageNav.min.js"></script>
   <script src="../js/wow.min.js"></script>
   <script src="../js/custom.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
   <?php
      include ('../modelo/funcoesJS.php');
      include ('../modelo/TesteMen.php');
   ?>
</body>
</html>