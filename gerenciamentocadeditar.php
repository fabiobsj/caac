<?php
include "conexao.php";

$cod = filter_input(INPUT_GET, "cod");

$selDados = "SELECT c.id, c.id_tipo, c.nome, c.endereco, c.cpf, c.telefone, u.login
			FROM cadastros c
				LEFT JOIN usuario u ON (c.id = u.id_cadastros)
			WHERE c.id = $cod";
$queryDados = mysql_query($selDados) or die(mysql_error());
$linDados = mysql_fetch_object($queryDados);

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <TITLE>gerenciamento de cadastro</TITLE>
 </head>
<html> 
<BODY>
	<form method="POST" action="editarusuario.php">
	
		Nome<input type="text" size="50" name="nome" required="" value="<?=$linDados->nome?>"><br />
		Endere&ccedil;o<input type="text" size="50" name="endereco" required="" value="<?=$linDados->endereco?>"><br />
		Cpf<input type="text" size="10" name="cpf" value="<?=$linDados->cpf?>"><br />
		Telefone<input type="text" size="10" name="telefone" value="<?=$linDados->telefone?>"><br />
		Tipo <select name="tipo" onchange="verifica_campos(this.value)" required="">
			<option selected disabled value="">Selecione...</option>
				<?php
					$sql = "SELECT id, nome FROM tipo_cadastro";
					$query = mysql_query($sql) or die(mysql_error());
					while ($lin = mysql_fetch_object($query)) {
						$selected = $linDados->id_tipo == $lin->id ? 'selected="selected"' : '';
						echo "<option value='".$lin->id."' ".$selected.">".$lin->nome."</option>";
					}
				?>
			</select><br />
		login<input type="text" size="10" name="login" value="<?=$linDados->login?>"><br />
		Senha<input type="password" size="10" name="senha">
		<input type="hidden" value="<?=$cod?>" name="id" />
		
		<br/ >
		<input type="submit"value="Cadastrar" name="cadastrar">
	</form>
</body>
</html>
<?php
mysql_close($conect);
?>