<?php header('Content-Type: text/html; charset=iso-8859-1');
$id_cliente = $_GET['id'];
$mes = $_GET['mes'];
$valorfatura = $_GET['valorfatura'];
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF: Elizeu Alcantara                         |
// +----------------------------------------------------------------------+
$link = mysqli_connect("localhost", "root", "", "laps");
if (!$link) {
    die('N�o foi poss�vel conectar: ' . mysql_error());
}
$r_cli = mysqli_query($link, "SELECT c.id_cliente, c.nome, c.email, c.rg, c.cel, c.cadastro FROM cliente c where c.id_cliente = " . $id_cliente . " ;");
$data_cli = mysqli_fetch_assoc($r_cli);
$r_end = mysqli_query($link, "SELECT e.rua, e.num, e.complemento, e.cep, e.cidade, e.estado, e.bairro FROM endereco e where e.id_cliente = " . $id_cliente . " ;");
$data_end = mysqli_fetch_assoc($r_end);


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 0;
$data_venc ="25/".$mes."/2016";
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias  OU  informe data: "13/04/2006"  OU  informe "" se Contra Apresentacao;
$valor_cobrado = $valorfatura; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["inicio_nosso_numero"] = "24";  // 24 - Padr�o da Caixa Economica Federal
$dadosboleto["nosso_numero"] = "19525086";  // Nosso numero sem o DV - REGRA: M�ximo de 8 caracteres!
$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $data_cli['nome'];
$dadosboleto["endereco1"] = $data_end['rua']." - ".$data_end['num'];
$dadosboleto["endereco2"] = $data_end['cidade']."/".$data_end['estado']." - ".$data_end['cep'];

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compras";
$dadosboleto["demonstrativo2"] = "Fatura do seu Cart�o LAPS";
$dadosboleto["demonstrativo3"] = "Boleto Banc�rio";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 10% ap�s o vencimento";
$dadosboleto["instrucoes2"] = "- Em caso de d�vidas entre em contato conosco: lapsuvv@gmail.com";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "----------";
$dadosboleto["valor_unitario"] = "----------";
$dadosboleto["aceite"] = "----------";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "----------";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "1565"; // Num da agencia, sem digito
$dadosboleto["conta"] = "13877"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "4"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "87000000414"; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["conta_cedente_dv"] = "3"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "SR";  // C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "LapsApp Pagamentos S.A";
$dadosboleto["cpf_cnpj"] = "27.067.651/0001-55";
$dadosboleto["endereco"] = "Av. Comiss�rio Jos� Dantas de Melo, N� 21, Vila Velha - ES, Brasil - (27) 3421-2001 ";
$dadosboleto["cidade_uf"] = "Vila Velha / ES";
$dadosboleto["cedente"] = "LapsApp Pagamentos S.A";

// N�O ALTERAR!
include("include/funcoes_cef.php"); 
include("include/layout_cef.php");
?>
