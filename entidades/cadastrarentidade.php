<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "INSERT INTO entidade (nome) VALUES ('$_POST[nome]')";

    $query = $mysqli->query($sql);

    if($query) {
        echo "<script>alert('Cadastrado com sucesso.'); window.location = 'listaentidades.php';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar entidade.'); window.location = 'cadastrarentidade.php';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post">
                <h2>Cadastro de Entidade</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome">
                </div>
                <button type="submit" class="btn btn-success">Salvar</button>
                <br/><br/>
                <a href="../caac.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";