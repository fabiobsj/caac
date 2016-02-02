<?php
include "conexao.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <TITLE>gerenciamento de cadastro</TITLE>
 </head>
<html> 
<BODY>
	<form method="POST" action="inserirusuario.php">
	
		Nome<input type="text" size="50" name="nome" required=""><br />
		Endere&ccedil;o<input type="text" size="50" name="endereco" required=""><br />
		Cpf<input type="text" size="10" name="cpf"><br />
		Telefone<input type="text" size="10" name="telefone"><br />
		Tipo <select name="tipo" onchange="verifica_campos(this.value)" required="">
			<option selected disabled value="">Selecione...</option>
				<?php
					$sql = "SELECT id, nome FROM tipo_cadastro";
					$query = mysql_query($sql) or die(mysql_error());
					while ($lin = mysql_fetch_object($query)) {
						echo "<option value='".$lin->id."'>".$lin->nome."</option>";
					}
				?>
			</select><br />
		login<input type="text" size="10" name="login"><br />
		Senha<input type="password" size="10" name="senha">
		
		<br/ >
		<input type="submit"value="Cadastrar" name="cadastrar">
	</form>
</body>
</html>
<?php
mysql_close($conect);
?>