<?php
	
	extract($_POST);

	include("conexao.php");

	$sql = "INSERT INTO cadastros (id_tipo, nome, endereco, cpf, telefone) 
			VALUES ('$tipo', '$nome', '$endereco', '$cpf', '$telefone')"; 

	mysql_query($sql) or die("Erro ao cadastrar: ".mysql_error());
	
	$id_cad = mysql_insert_id();

	if($tipo==1 && !empty($login) && !empty($senha)){
		$sql1 = "INSERT INTO usuario (id_cadastros, login, senha)
				VALUES ('$id_cad', '$login', '$senha')";

		mysql_query($sql1) or die("Erro ao cadastrar: ".mysql_error());
	}
	
	echo "<script>alert('Cadastro realizado!'); window.location='caac.php';</script>";


?>