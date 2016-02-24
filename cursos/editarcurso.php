<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "UPDATE curso SET
          nome = '$_POST[nome]'
        , palestrante_id = '$_POST[palestrante]'
        , entidade_id = '$_POST[entidade]'
        , data_inicio = '$_POST[data_inicio]'
        , data_fim = '$_POST[data_fim]'
        , hora_entrada = '$_POST[hora_entrada]'
        , hora_saida = '$_POST[hora_saida]'
        , descricao = '$_POST[descricao]'
    WHERE id = $_GET[id]";

    $query = $mysqli->query($sql);

    if($query) {
        echo "<script>alert('Alterado com sucesso.'); window.location = 'listacursos.php';</script>";
    }else{
        echo "<script>alert('Erro ao alterar curso.'); window.location = 'editarcurso.php';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

$sql = "SELECT
        id, nome, entidade_id, palestrante_id, data_inicio, data_fim, hora_entrada, hora_saida, descricao
        FROM `curso` WHERE id = $_GET[id]";
$query = $mysqli->query($sql);
$curso = $query->fetch_assoc();

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post">
                <h2>Alterar de Curso</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome" value="<?=$curso['nome']?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Data Inicial</label>
                    <input class="form-control" name="data_inicio" value="<?=$curso['data_inicio']?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" name="cpf" value="<?=$curso['cpf']?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input class="form-control" name="telefone" value="<?=$curso['telefone']?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Palestrante</label>
                    <select class="form-control" name="palestrante" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                        $sql = "SELECT `id`, `nome` FROM `usuario` WHERE tipo_id = 6";
                        $query = $mysqli->query($sql);
                        while ($dados = $query->fetch_array()) {
                            echo "<option value='$dados[id]' ".($curso['usuario_id'] == $dados['id'] ? 'selected' : '').">$dados[nome]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Entidade</label>
                    <select class="form-control" name="entidade" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                        $sql = "SELECT `id`, `nome` FROM `entidade`";
                        $query = $mysqli->query($sql);
                        while ($dados = $query->fetch_array()) {
                            echo "<option value='$dados[id]' ".($curso['entidade_id'] == $dados['id'] ? 'selected' : '').">$dados[nome]</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <br/><br/>
                <a href="listausuarios.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";