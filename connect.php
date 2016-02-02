<?php

$usuario="root";
$senha="";
$localhost="localhost";
$bd="bdcaac";

if(!($con=mysql_connect($localhost, $usuario, $senha))){
	echo "erro";
	
}
else{
	echo "conexao ok";
	
}
if(!(mysql_select_db($bd,$con))){
	echo "erro";
}
else{
	echo "conexao com banco ok";
	
}




/*
// Nas linhas abaixo você poderá colocar as informações do Banco de Dados.
var $host = "localhost"; // Nome ou IP do Servidor
var $user = "root"; // Usuário do Servidor MySQL
var $senha = ""; // Senha do Usuário MySQL
var $dbase = "bdcaac"; // Nome do seu Banco de Dados*/
?>