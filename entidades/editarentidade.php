<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "UPDATE entidade SET nome = '$_POST[nome]' WHERE id = $_GET[id]";

    $query = $mysqli->query($sql);
    if($query) {
        echo "<script>alert('Alterado com sucesso.'); window.location = 'listaentidades.php';</script>";
    }else{
        echo "<script>alert('Erro ao alterar entidade.'); window.location = 'editarentidade.php?id=$_GET[id]';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

$sql = "SELECT `id`, `nome` FROM `entidade` WHERE id = $_GET[id]";
$query = $mysqli->query($sql);

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post" action="?id=<?=$_GET['id']?>">
                <h2>Alterar de Entidade</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome" value="<?=$query->fetch_assoc()['nome']?>">
                </div>
                <button type="submit" class="btn btn-success">Editar</button>
                <br/><br/>
                <a href="../caac.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";