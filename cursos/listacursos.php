<?php
include "../cabecalho.php";
include "../menu.php";
include "../conexao.php";

// Executa uma consulta que pega cinco notícias
$sql = "SELECT
            c.id, c.nome, data_inicio, data_fim, hora_entrada, hora_saida, descricao, u.nome palestrante, e.nome entidade
        FROM `curso` c
            LEFT JOIN usuario u ON c.palestrante_id = u.id
            LEFT JOIN entidade e ON c.entidade_id = e.id
        ";
$query = $mysqli->query($sql);

?>

    <h2>Lista de Cursos</h2>
    <a href="cadastrarcurso.php" target="_self" class="btn btn-primary">Cadastrar</a>
    <br /><br />
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Curso</th>
                    <th>Entidade</th>
                    <th>Palestrante</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Hora Entrada</th>
                    <th>Hora Sa&iacute;da</th>
                    <th>Descri&ccedil;&atilde;o</th>
                    <th>A&ccedil;&atilde;o</th>
                </tr>
                </thead>
                <?php
                while ($dados = $query->fetch_array()) {
                    echo "<tr>";
                    echo "<td>$dados[nome]</td>";
                    echo "<td>$dados[entidade]</td>";
                    echo "<td>$dados[palestrante]</td>";
                    echo "<td>$dados[data_inicio]</td>";
                    echo "<td>$dados[data_fim]</td>";
                    echo "<td>$dados[hora_entrada]</td>";
                    echo "<td>$dados[hora_saida]</td>";
                    echo "<td>$dados[descricao]</td>";
                    echo "<td>
                        <a href='editarcurso.php?id=$dados[id]' class='btn btn-default'><i class='glyphicon glyphicon-edit'></i></a>
                        <a href='javascript:removeCurso($dados[id]);' class='btn btn-default'><i class='glyphicon glyphicon-trash'></i></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <script>
        function removeCurso(id){
            if(confirm('Deseja remover este curso?')){
                window.location = 'removecurso.php?id=' + id;
            }
        }
    </script>
<?php include "../rodape.php";