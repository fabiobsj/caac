<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "INSERT INTO curso (
          nome
        , palestrante_id
        , entidade_id
        , data_inicio
        , data_fim
        , hora_entrada
        , hora_saida
        , descricao
    ) VALUES (
          '$_POST[nome]'
        , '$_POST[palestrante]'
        , '$_POST[entidade]'
        , '$_POST[data_inicio]'
        , '$_POST[data_fim]'
        , '$_POST[hora_entrada]'
        , '$_POST[hora_saida]'
        , '$_POST[descricao]'
    )";

    $query = $mysqli->query($sql);

    if($query) {
        echo "<script>alert('Cadastrado com sucesso.'); window.location = 'listacursos.php';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar curso.'); window.location = 'cadastrarcurso.php';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post">
                <h2>Cadastro de Curso</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome" type="text" required>
                </div>
                <div class="form-group">
                    <label>Data Inicial</label>
                    <input class="form-control" name="data_inicio" type="date" required>
                </div>
                <div class="form-group">
                    <label>Data Final</label>
                    <input class="form-control" name="data_fim" type="date" required>
                </div>
                <div class="form-group">
                    <label>Hora Entrada</label>
                    <input class="form-control" name="hora_entrada" type="time" required>
                </div>
                <div class="form-group">
                    <label>Hora Sa&iacute;da</label>
                    <input class="form-control" name="hora_saida" type="time" required>
                </div>
                <div class="form-group">
                    <label>Descri&ccedil;&atilde;o</label>
                    <textarea class="form-control" name="descricao" cols="2" required></textarea>
                </div>
                <div class="form-group">
                    <label>Palestrante</label>
                    <select class="form-control" name="palestrante" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                        $sql = "SELECT `id`, `nome` FROM `usuario` WHERE tipo_id = 6";
                        $query = $mysqli->query($sql);
                        while ($dados = $query->fetch_array()) {
                            echo "<option value='$dados[id]'>$dados[nome]</option>";
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
                                echo "<option value='$dados[id]'>$dados[nome]</option>";
                            }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <br/><br/>
                <a href="listacursos.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";