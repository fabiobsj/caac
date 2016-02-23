<?php

include "../conexao.php";

if(!isset($_GET['id'])){
    echo "<script>alert('Selecione um usuario.'); window.location = 'listausuarios.php';</script>";
}

$sql = "DELETE FROM usuario WHERE id = $_GET[id]";

$query = $mysqli->query($sql);

if($query) {
    echo "<script>alert('Removido com sucesso.'); window.location = 'listausuarios.php';</script>";
}else{
    echo "<script>alert('Erro ao remover usuário.'); window.location = 'listausuarios.php';</script>";
}
