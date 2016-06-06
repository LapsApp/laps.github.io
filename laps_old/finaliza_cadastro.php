<?
		$id_cliente = $_GET['id'];
?>


<html>
	<form action='modelo/salva_finaliza_cadastro.php'  method="post">
		
		<input type="hidden" name='id_cliente' value="<?php echo  $_GET['id'];?>">
		<input type='text' name='rg'><br>
		<input type='text' name='cel'><br>
		<input type='text' name='rua'><br>
		<input type='text' name='numero'><br>
		<input type='text' name='complemento'><br>
		<input type='text' name='cep'><br>
		<input type='text' name='cidade'><br>
		<input type='text' name='estado'><br>
		<input type='text' name='renda'><br>
		<input type='file' name='foto'><br>
		<input type='file' name='frente'><br>
		<input type='file' name='verso'><br>
		<input type="submit" value="Enviar">
	</form>
</html>