<?php
	 // arquivo atual.
	$link = mysqli_connect("localhost", "root", "", "loja");
	if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }
?>


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
  background-color: #00EE76;
  border-color: grey;
  line-height: 20px
}

.btn:hover {
  color: #00EE76;
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

#barra1 {
    background: linear-gradient(to top, white, black);
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

ITENS&nbsp;&nbsp;&nbsp;&nbsp;</b></div>

<!-- div principal INICIO -->
<div id="barra1" style="line-height: 40px"><b>
	
<form name="frmCarrinho" action="../loja/pag_carrinho.php" method="post">
	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" rules=rows>
<tr bgcolor="#000000">
<td width="2%"> </td>
<td width="4%"><span class="style2">QUANTIDADE</span></td>
<td width="46%"><span class="style2">PRODUTO</span></td>
<td width="15%"><span class="style2">VALOR</span></td>
<td width="15%"><span class="style2">SUBTOTAL</span></td>

</tr>
<?php
     header('Content-Type: text/html; charset=iso-8859-1');
	 $result=mysqli_query($link,"SELECT id_prod,nome,valor,addcar FROM produto where addcar != 0;");
	 
	 $total = 0;
	 
     while($data=mysqli_fetch_assoc($result)){ 
	 	 
		$result2=mysqli_query($link,"SELECT SUM(addcar) as soma FROM produto where id_prod =".$data['id_prod'].";");
	    $data2=mysqli_fetch_assoc($result2);
		
		$subtotal = ($data2['soma'])*str_replace(",",".",$data["valor"]);
		
	 
?>

<tr>
<td width="2%" style="background-color:#FFFFFF;color:#000000;"> </td>
<td width="4%" style="background-color:#FFFFFF;color:#000000;"><span class="style2"><?php echo $data2['soma']; ?></span></td>
<td width="46%" style="background-color:#FFFFFF;color:#000000;"><span class="style2"><?php echo $data['nome']; ?></span></td>
<td width="15%" style="background-color:#FFFFFF;color:#000000;"><span class="style2"><?php echo $data['valor']; ?></span></td>
<td width="15%" style="background-color:#FFFFFF;color:#000000;"><span class="style2"><?php echo "R$ ".$subtotal ?></span></td>

</tr>
<?php
	$total = $total + $subtotal;
	$subtotal = 0;
	                                         }
											 
?>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" bgcolor="#FF0000"><span class="style5"> TOTAL A PAGAR: </span></td>
<td width="15%" bgcolor="#FF0000"><span class="style2"><?php echo "R$ ".$total; ?></span>
	<input type="hidden" name="vl_total" value="<?php echo $total; ?>">
</td>
</table>
</br>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" rules=rows>
<tr>
<td width="10%" bgcolor="#000000"> </td>
<td width="30%" bgcolor="#000000" align="right">
NOME: <input type="text" name="nome" required>
</br>NUM. CARTAO: <input type="text" name="num_cartao" required>
</br>VALIDADE: <input type="text" name="validade" required>
</br>CODIGO: <input type="text" name="codigo" required>
</br>
</td>
<td width="10%" bgcolor="#000000"> </td>
<td width="30%" bgcolor="#000000">
<!--<input type="submit" class="form-control text-uppercase" value="FINALIZAR COMPRA">-->

<button class='btn' name='end' type="submit" class="form-control text-uppercase"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FINALIZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></button>
</td>
</tr>
</table>

</form>

<!-- div principal FIM -->

</br></div>
<div id="barra">
Copyright © LOJAONLINE.COM
</div>

</body>
</html>