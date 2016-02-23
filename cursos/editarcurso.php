<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "UPDATE usuario SET
          nome = '$_POST[nome]'
        , endereco = '$_POST[endereco]'
        , cpf = '$_POST[cpf]'
        , telefone = '$_POST[telefone]'
        , entidade_id = '$_POST[entidade]'
        , tipo_id = '$_POST[tipo]'
        , login = '$_POST[login]'
        , senha = '$_POST[senha]'
    WHERE id = $_GET[id]";

    $query = $mysqli->query($sql);

    if($query) {
        echo "<script>alert('Alterado com sucesso.'); window.location = 'listausuarios.php';</script>";
    }else{
        echo "<script>alert('Erro ao alterar usuário.'); window.location = 'editarusuario.php';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

$sql = "SELECT
        u.id, u.nome, entidade_id, tipo_id, endereco, cpf, telefone, login, senha
        FROM `usuario` u WHERE id = $_GET[id]";
$query = $mysqli->query($sql);
$usuario = $query->fetch_assoc();

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post">
                <h2>Alterar de Usu&aacute;rio</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome" value="<?=utf8_encode($usuario['nome'])?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Endere&ccedil;o</label>
                    <input class="form-control" name="endereco" value="<?=utf8_encode($usuario['endereco'])?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" name="cpf" value="<?=utf8_encode($usuario['cpf'])?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input class="form-control" name="telefone" value="<?=utf8_encode($usuario['telefone'])?>" type="text" required>
                </div>
                <div class="form-group">
                    <label>Entidade</label>
                    <select class="form-control" name="entidade" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                        $sql = "SELECT `id`, `nome` FROM `entidade`";
                        $query = $mysqli->query($sql);
                        while ($dados = $query->fetch_array()) {
                            echo "<option value='$dados[id]' ".($usuario['entidade_id'] == $dados['id'] ? 'selected' : '').">" . utf8_encode($dados['nome']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" name="tipo" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                        $sql = "SELECT `id`, `nome` FROM `tipo_cadastro`";
                        $query = $mysqli->query($sql);
                        while ($dados = $query->fetch_array()) {
                            echo "<option value='$dados[id]' ".($usuario['tipo_id'] == $dados['id'] ? 'selected' : '').">" . utf8_encode($dados['nome']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Login</label>
                    <input class="form-control" name="login" value="<?=utf8_encode($usuario['login'])?>" type="text">
                    <small class="text-danger">*S&oacute; para funcion&aacute;rios</small>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" name="senha" value="<?=utf8_encode($usuario['senha'])?>" type="password">
                    <small class="text-danger">*S&oacute; para funcion&aacute;rios</small>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <br/><br/>
                <a href="listausuarios.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";