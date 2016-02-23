<?php
include "../cabecalho.php";
include "../menu.php";
include "../conexao.php";

// Executa uma consulta que pega cinco notícias
$sql = "SELECT `id`, `nome` FROM `entidade`";
$query = $mysqli->query($sql);

?>

<h2>Lista de Entidades</h2>
<a href="cadastrarentidade.php" target="_self" class="btn btn-primary">Cadastrar</a>
<br /><br />
<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>A&ccedil;&atilde;o</th>
                </tr>
            </thead>
            <?php
            while ($dados = $query->fetch_array()) {
                echo "<tr>";
                echo "<td>$dados[nome]</td>";
                echo "<td>
                        <a href='editarentidade.php?id=$dados[id]' class='btn btn-default'><i class='glyphicon glyphicon-edit'></i></a>
                        <a href='javascript:removeEntidade($dados[id]);' class='btn btn-default'><i class='glyphicon glyphicon-trash'></i></a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<script>
    function removeEntidade(id){
        if(confirm('Deseja remover esta entidade?')){
            window.location = 'removeentidade.php?id=' + id;
        }
    }
</script>
<?php include "../rodape.php";