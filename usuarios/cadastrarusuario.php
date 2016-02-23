<?php
include "../conexao.php";

if(isset($_POST['nome'])){
    $sql = "INSERT INTO usuario (
          nome
        , endereco
        , cpf
        , telefone
        , entidade_id
        , tipo_id
        , login
        , senha
    ) VALUES (
          '$_POST[nome]'
        , '$_POST[endereco]'
        , '$_POST[cpf]'
        , '$_POST[telefone]'
        , '$_POST[entidade]'
        , '$_POST[tipo]'
        , '$_POST[login]'
        , '$_POST[senha]'
    )";

    $query = $mysqli->query($sql);

    if($query) {
        echo "<script>alert('Cadastrado com sucesso.'); window.location = 'listausuarios.php';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar usuário.'); window.location = 'cadastrarusuario.php';</script>";
    }

}

include "../cabecalho.php";
include "../menu.php";

?>

    <br /><br />
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form well" method="post">
                <h2>Cadastro de Usu&aacute;rio</h2>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" name="nome" type="text" required>
                </div>
                <div class="form-group">
                    <label>Endere&ccedil;o</label>
                    <input class="form-control" name="endereco" type="text" required>
                </div>
                <div class="form-group">
                    <label>CPF</label>
                    <input class="form-control" name="cpf" type="text" required>
                </div>
                <div class="form-group">
                    <label>Telefone</label>
                    <input class="form-control" name="telefone" type="text" required>
                </div>
                <div class="form-group">
                    <label>Entidade</label>
                    <select class="form-control" name="entidade" required>
                        <option value="" disabled selected>Selecione...</option>
                        <?php
                            $sql = "SELECT `id`, `nome` FROM `entidade`";
                            $query = $mysqli->query($sql);
                            while ($dados = $query->fetch_array()) {
                                echo "<option value='$dados[id]'>" . utf8_encode($dados['nome']) . "</option>";
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
                            echo "<option value='$dados[id]'>" . utf8_encode($dados['nome']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Login</label>
                    <input class="form-control" name="login" type="text">
                    <small class="text-danger">*S&oacute; para funcion&aacute;rios</small>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" name="senha" type="password">
                    <small class="text-danger">*S&oacute; para funcion&aacute;rios</small>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <br/><br/>
                <a href="../caac.php" class="btn btn-default">Voltar</a>
            </form>
        </div>
    </div>
<?php include "../rodape.php";