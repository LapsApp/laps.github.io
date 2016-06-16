<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="../pages_adm/menu_adm.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_house_alt"></i>
                    <span>INICIO</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_adm/listar_cadastros.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_documents_alt"></i>
                    <span>VERIFICAR<br>CADASTROS</span>
                </a>
            </li>
            <li>
                <a class="" href="../pages_adm/listar_solicitacao.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_documents_alt"></i>
                    <span>VERIFICAR<br>SOLICITAÇÕES</span>
                </a>
            </li>
            <li class="">
                <a class="" href="../pages_adm/listar_contas.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_desktop"></i>
                    <span>BLOQUEAR<br>USUÁRIOS</span>
                </a>
            </li>
			<li>
                <a class="" href="../modelo/logout.php?id=<?php echo $id_cliente; ?>">
                    <i class="icon_lock-open"></i>
                    <span>LOGOUT</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

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