<?php
	  // arquivo atual.
	  
	  include ('../modelo/funcoesJS.php');
      include ('../modelo/TesteMen.php');
	  
	$link = mysqli_connect("localhost", "root", "", "loja");
	$link_laps = mysqli_connect("localhost", "root", "", "laps");
                        if (!$link) {
                           die('Não foi possível conectar: ' . mysql_error());
                        }
						
						
						
	 if (isset($_POST["vl_total"])) {$vl_total = $_POST['vl_total'];}
	 
	 if (isset($_POST["num_cartao"])) {$num_cartao = $_POST['num_cartao'];}
	 if (isset($_POST["validade"])) {$validade = $_POST['validade'];}
	 if (isset($_POST["nome"])) {$nome = $_POST['nome'];}
	 if (isset($_POST["codigo"])) {$codigo = $_POST['codigo'];}
	 
	 $r = "SELECT id_cartao FROM cartao WHERE numero = ".$num_cartao." AND validade = '".$validade."' AND nome_cliente = '".$nome."' AND codigo = ".$codigo.";";
	 
	 $result0 = mysqli_query($link_laps,$r);
	 $data0 = mysqli_fetch_assoc($result0);
	 
	 // trocando para id cartao
	 
	 
	 
	 if($data0['id_cartao']){
			$_POST["num_cartao"] = $data0['id_cartao'];
	}else{
		echo "erro dados cartao";
	//echo "<script>window.location='$volta&obj=Cliente&type=erro'</script>";
	}
	 
	 //echo "id> ".$_POST["num_cartao"].'</br>';
	 
	 $controle = 1;
	 
	 $result=mysqli_query($link,"SELECT id_prod,nome,valor,categoria,addcar FROM produto where addcar != 0;");
	 
	 
	 
	 $result2=mysqli_query($link_laps,"SELECT MAX(id_compra)+1 as max FROM compras");
	 $data2=mysqli_fetch_assoc($result2);
	 
	 if($data2['max'] == NULL){$data2['max'] = 1;}
	 
	$result3=mysqli_query($link_laps,"SELECT cc.limite,cc.id_conta FROM CONTA cc INNER JOIN cartao cart ON cc.id_conta = cart.id_conta WHERE cart.id_cartao = ".$_POST["num_cartao"].";");
	$data3=mysqli_fetch_assoc($result3);
	
	
	// VERIFICAR O LIMITE 
	
	if($data3['limite'] < $_POST['vl_total']){
	
	$controle = 0;
	$volta = '../loja/lojaonline.php';
	echo "limite erro";
	//echo "<script>window.location='$volta&obj=Cliente&type=erro'</script>";
	}

	if($controle){
		while( $data=mysqli_fetch_assoc($result) ){ 
			  
			  $insert = "INSERT INTO compras(id_compra,id_cartao,valor,quantidade,categoria) values(".$data2['max'].",".$_POST["num_cartao"].",".str_replace(",",".",$data["valor"]).",".$data['addcar'].",'".$data['categoria']."');";
			  
			  echo $insert."</br>";
			  mysqli_query($link_laps, $insert);	
			  $insert = '';
				
			  
												   }
											   
	
	$novo_limite = $data3['limite'] - $_POST['vl_total'];
	
	} 
	
   $up = "UPDATE produto set addcar = 0 where addcar != 0 ";
   mysqli_query($link, $up);
   
   $up2 = "UPDATE conta set limite = ".$novo_limite." where id_conta = ".$data3['id_conta'].";";
   mysqli_query($link_laps, $up2);
		
		    $volta = '../loja/lojaonline.php';
			echo "<script>window.location='$volta&obj=Cliente&type=Sucesso'</script>";
		 
	 
	 
?>