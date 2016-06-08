<?php
	include('funcoesJS.php');
	if(!empty($_GET['obj']) && !empty($_GET['type']))
	{
?>

<link rel='stylesheet' href='http://localhost/laps/jAlert/src/jAlert-v3.css'>
<script src='http://localhost/laps/jAlert/vendor/jquery-1.11.3.min.js'></script>
<script src='http://localhost/laps/jAlert/src/jAlert-v3.js'></script>
<script src='http://localhost/laps/jAlert/src/jAlert-functions.js'></script>

	
<?php
	if($_GET['type'] == 'sucesso')
	{	
?>
	<script>
		$(function(){
			$.jAlert({
				'title': 'Sucesso!',
				'content': '<div style="display: flex; align-items: center;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 34px; color: greenyellow; width: 63px;"></span>Sucesso no(a) <?php echo $_GET['obj'];?></div>',
				'closeBtn': true,
				'closeOnEsc': true
			});
		});
	</script>
<?php
	}
?>

<?php
	if($_GET['type'] == 'erro')
	{	
?>
	<script>
		$(function(){
			$.jAlert({
				'title': 'Erro!',
				'content': '<div style="display: flex; align-items: center;"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true" style="font-size: 34px; color: red; width: 63px;"></span>Falha no(a) <?php echo $_GET['obj'];?></div>',
				'closeBtn': true,
				'closeOnEsc': true
			});
		});
	</script>
<?php
	}
?>

<?php
	if($_GET['type'] == 'inclusao')
	{	
?>
	<script>
		$(function(){
			$.jAlert({
				'title': 'Sucesso!',
				'content': '<div style="display: flex; align-items: center;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 34px; color: greenyellow; width: 63px;"></span> <?php echo $_GET['obj'];?> cadastrado(a) com sucesso!</div>',
				'closeBtn': true,
				'closeOnEsc': true
			});
		});
	</script>
<?php
	}
?>

<?php
	if($_GET['type'] == 'edicao')
	{	
?>
	<script>
		$(function(){
			$.jAlert({
				'title': 'Sucesso!',
				'content': '<div style="display: flex; align-items: center;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size: 34px; color: greenyellow; width: 63px;"></span> <?php echo $_GET['obj'];?> alterado(a) com sucesso!</div>',
				'closeBtn': true,
				'closeOnEsc': true
			});
		});
	</script>
<?php
	}
?>

<?php
	if($_GET['type'] == 'exclusao')
	{	
?>
	<script>
		$(function(){
			$.jAlert({
				'title': 'Sucesso!',
				'content': '<div style="display: flex; align-items: center;"><span class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size: 34px; color: greenyellow; width: 63px;"></span> <?php echo $_GET['obj'];?> excluido(a) com sucesso!</div>',
				'closeBtn': true,
				'closeOnEsc': true
			});
		});
	</script>
<?php
	}
}
?>