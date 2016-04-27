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

<!-- div principal INICIO -->
<div id="barra" style="line-height: 40px"><b>
	
<form name="frmCarrinho" action="../loja/pag_carrinho.php" method="post">
	
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#CCCCCC">
<td width="4%"> </td>
<td width="8%"><span class="style2">Qtde</span></td>
<td width="51%"><span class="style2">Produto</span></td>
<td width="19%"><span class="style2">Valor</span></td>
<td width="18%"><span class="style2">Subtotal</span></td>

</tr>
<?php
	 $result=mysqli_query($link,"SELECT id_prod,nome,valor,addcar FROM produto where addcar != 0;");
	 
	 $total = 0;
	 
     while($data=mysqli_fetch_assoc($result)){ 
	 	 
		$result2=mysqli_query($link,"SELECT SUM(addcar) as soma FROM produto where id_prod =".$data['id_prod'].";");
	    $data2=mysqli_fetch_assoc($result2);
		
		$subtotal = ($data2['soma'])*str_replace(",",".",$data["valor"]);
		
	 
?>

<tr>
<td width="4%"> </td>
<td width="8%"><span class="style2"><?php echo $data2['soma']; ?></span></td>
<td width="51%"><span class="style2"><?php echo $data['nome']; ?></span></td>
<td width="19%"><span class="style2"><?php echo $data['valor']; ?></span></td>
<td width="18%"><span class="style2"><?php echo "R$ ".$subtotal ?></span></td>

</tr>
<?php
	
	$total = $total + $subtotal;
	$subtotal = 0;
	                                         }
											 
?>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" bgcolor="#FF0000"><span class="style5"> Total à pagar: </span></td>
<td width="19%" bgcolor="#FF0000"><span class="style2"><?php echo "R$ ".$total; ?></span>
	<input type="hidden" name="vl_total" value="<?php echo $total; ?>">
</td>



</table>

Num Cartao: 
<input type="text" name="num_cartao" required>
<br>
Validade: 
<input type="text" name="validade" required>
<br>
Nome: 
<input type="text" name="nome" required>
<br>
Codigo: 
<input type="text" name="codigo" required>


<tr>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><span class="style5"></br></span></td>
<td height="50" ><input type="submit" class="form-control text-uppercase" value="FINALIZAR"></td>
</tr>
</form>

<!-- div principal FIM -->
</div>

<div id="barra">
Copyright © LOJAONLINE.COM
</div>

</body>
</html>