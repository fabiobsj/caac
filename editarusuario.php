<?php
	
	extract($_POST);

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	include("conexao.php");

	//Atualiza cadastro
	$sql = "UPDATE cadastros 
			SET id_tipo = '$tipo', 
				nome = '$nome', 
				endereco = '$endereco', 
				cpf = '$cpf', 
				telefone = '$telefone'
			WHERE id = $id"; 


	mysql_query($sql) or die("Erro ao editar: ".mysql_error());

	//Lista usuario se houver
	$sqlUsu = "SELECT id, login, senha FROM usuario WHERE id_cadastros = $id";
	$queryUsu = mysql_query($sqlUsu) or die(mysql_error());
	if(mysql_num_rows($queryUsu)>0){
		if($tipo==1){
			//Atualiza dados de usuario
			$sqlUpdateUsu = "UPDATE usuario
							SET login = '$login',
								senha = '$senha'
							WHERE id_cadastros = $id";
			mysql_query($sqlUpdateUsu) or die("Erro ao cadastrar: ".mysql_error());
		}else{
			//Remove dados de usuario
			$sqlDelUsu = "DELETE FROM usuario WHERE id_cadastros = $id";
			mysql_query($sqlDelUsu) or die("Erro ao cadastrar: ".mysql_error());
		}
	}else{
		//Cadastra novo usuario
		if($tipo==1 && !empty($login) && !empty($senha)){
			$sql1 = "INSERT INTO usuario (id_cadastros, login, senha)
					VALUES ('$id', '$login', '$senha')";

			mysql_query($sql1) or die("Erro ao cadastrar: ".mysql_error());
		}
	}
	
	echo "<script>alert('Cadastro alterado!'); window.location='caac.php';</script>";


?>