<?php

include "../conexao.php";

if(!isset($_GET['id'])){
    echo "<script>alert('Selecione uma entidade.'); window.location = 'listaentidades.php';</script>";
}

$sql = "DELETE FROM entidade WHERE id = $_GET[id]";

$query = $mysqli->query($sql);

if($query) {
    echo "<script>alert('Removido com sucesso.'); window.location = 'listaentidades.php';</script>";
}else{
    echo "<script>alert('Erro ao remover entidade.'); window.location = 'listaentidades.php';</script>";
}
