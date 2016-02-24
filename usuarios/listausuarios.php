<?php
include "../cabecalho.php";
include "../menu.php";
include "../conexao.php";

// Executa uma consulta que pega cinco notícias
$sql = "SELECT
        u.id, u.nome, endereco, cpf, telefone, login, e.nome entidade, tc.nome tipo
        FROM `usuario` u
        LEFT JOIN entidade e ON (u.entidade_id = e.id)
        LEFT JOIN tipo_cadastro tc ON (u.tipo_id = tc.id)";
$query = $mysqli->query($sql);

?>

    <h2>Lista de Usu&aacute;rios</h2>
    <a href="cadastrarusuario.php" target="_self" class="btn btn-primary">Cadastrar</a>
    <br /><br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Entidade</th>
                    <th>Endere&ccedil;o</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Usuário</th>
                    <th>A&ccedil;&atilde;o</th>
                </tr>
                </thead>
                <?php
                while ($dados = $query->fetch_array()) {
                    echo "<tr>";
                    echo "<td>" . $dados['tipo'] ."</td>";
                    echo "<td>" . $dados['nome'] ."</td>";
                    echo "<td>" . utf8_encode($dados['entidade']) ."</td>";
                    echo "<td>" . utf8_encode($dados['endereco']) ."</td>";
                    echo "<td>" . utf8_encode($dados['cpf']) ."</td>";
                    echo "<td>" . utf8_encode($dados['telefone']) ."</td>";
                    echo "<td>$dados[login]</td>";
                    echo "<td>
                        <a href='editarusuario.php?id=$dados[id]' class='btn btn-default'><i class='glyphicon glyphicon-edit'></i></a>
                        <a href='javascript:removeUsuario($dados[id]);' class='btn btn-default'><i class='glyphicon glyphicon-trash'></i></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <script>
        function removeUsuario(id){
            if(confirm('Deseja remover este usuário?')){
                window.location = 'removeusuario.php?id=' + id;
            }
        }
    </script>
<?php include "../rodape.php";