<?php
include "conexao.php";

$acao = filter_input(INPUT_GET, "acao");

if($acao=="remover"){
	$id = $_GET["cod"];

	//seleciona tipo de cadastro
	$sel = "SELECT id_tipo FROM cadastros WHERE id = $id";
	$quersel = mysql_query($sel) or die(mysql_error());
	$linsel = mysql_fetch_object($quersel);

	//remove usuario caso tipo de cadastro for funcionario
	if($linsel->id_tipo==1){
		$sqlusu = "DELETE FROM usuario WHERE id_cadastros = $id";
		mysql_query($sqlusu) or die(mysql_error());
	}

	//remove cadastro
	$sqldel = "DELETE FROM cadastros WHERE id = $id";
	mysql_query($sqldel) or die(mysql_error());

	echo "<script>alert('Cadastro removido com sucesso!'); window.location='gerenciamentocadlist.php';</script>";
	die();
}

?>
<!document html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <TITLE>gerenciamento de cadastro</TITLE>
 </head>
 <body>

 	<h2>Gerenciamento de Cadastros</h2>
 	<a href="gerenciamentocad.php">Cadastrar</a>
 	<br /><br /><br />
 	<table border=1 cellspacing=0 cellpadding=0>
		<tr>
			<th>#</th>
			<th>id</th>
			<th>Tipo</th>
			<th>Nome</th>
			<th>Endere&ccedil;o</th>
			<th>CPF</th>
			<th>Telefone</th>
			<th>Usu&aacute;rio</th>
			<th>A&ccedil;&atilde;o</th>
		</tr>
		<?php
			$n=0;
			$sql = "SELECT c.id, c.nome, c.endereco, c.cpf, c.telefone, u.login, tc.nome tipo 
					FROM cadastros c
						LEFT JOIN usuario u ON (c.id = u.id_cadastros)
						, tipo_cadastro tc 
					WHERE c.id_tipo = tc.id";
			$query = mysql_query($sql) or die(mysql_error());
			while ($lin = mysql_fetch_object($query)) {
				echo "<tr>";
				echo "<th>".++$n."</th>";
				echo "<th>".$lin->id."</th>";
				echo "<th>".$lin->tipo."</th>";
				echo "<th>".$lin->nome."</th>";
				echo "<th>".$lin->endereco."</th>";
				echo "<th>".$lin->cpf."</th>";
				echo "<th>".$lin->telefone."</th>";
				echo "<th>".$lin->login."</th>";
				echo "<th>[ <a href='gerenciamentocadeditar.php?cod=".$lin->id."'>editar<a/> ]
						  [ <a href='gerenciamentocadlist.php?cod=".$lin->id."&acao=remover'>remover<a/> ]
					</th>";
				echo "</tr>";
			}
		?>
 	</table>
 </body>
</html>