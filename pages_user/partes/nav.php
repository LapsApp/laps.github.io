<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="../pages_user/menu_usuario.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_house_alt"></i>
                    <span>INICIO</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_user/cadastro.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_document_alt"></i>
                    <span>MEUS DADOS</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_user/convites.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_link"></i>
                    <span>INDICADOS</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_user/suporte.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_mail_alt"></i>
                    <span>SUPORTE</span>
                </a>
            </li>
            <li class="">
                <a class="" href="../pages_user/lista_compras.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_documents_alt"></i>
                    <span>LISTA DE<br>COMPRAS</span>
                </a>
            </li>
            <li class="">
                <a class="" href="consumo_categoria_data.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_piechart"></i>
                    <span>CONSUMO POR<br>CATEGORIAS</span>
                </a>
            </li>
            <li class="">
                <a class="" href="../pages_user/fatura.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_documents_alt"></i>
                    <span>DETALHAR<br>FATURAS</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_user/bloqueio.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_blocked"></i>
                    <span>BLOQUEIO</span>
                </a>
            </li>
			<li>
                <a class="" href="../modelo/logout.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_lock-open"></i>
                    <span>LOGOUT</span>
                </a>
            </li>
            <!--<li class="">
               <a class="">
                  <i class="icon_table"></i>
                  <span>XXXXX</span>
               </a>
            </li>
            <li class="">
               <a class="">
                  <i class="icon_documents_alt"></i>
                  <span>XXXXX</span>
               </a>
            </li>-->
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<?php
	if(! isset($link))
	{
		$link = mysqli_connect("localhost", "root", "", "laps");
		if (!$link) {
			die('Não foi possível conectar: ' . mysql_error());
		}
	}

	$cliente = mysqli_query($link, "SELECT c.id_cliente, sessao  FROM cliente c where c.id_cliente = " . $id_cliente . ";");
    $d_cliente = mysqli_fetch_assoc($cliente);
		if($d_cliente['sessao'] == 0)
		{
			echo "<script>window.location='../login.php?obj=sessao&type=erro'</script>";
		}
 ?>