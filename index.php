<?php
include "cabecalho.php";
?>
<style>
	.formulario{
		margin-top: 180px;
		padding: 25px 150px;
	}
</style>
<div class="row">
	<div class="formulario col-md-4 col-md-offset-4 well">
	<form method="POST" class="form">
		<div class="form-group">
			<label>Usuário</label> <input type="text" size="50" class="form-control" name="login">
		</div>
		<div class="form-group">
			<label>Senha</label> <input type="password" size="50" class="form-control" name="senha">
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-success" name="bt">LOGAR</button>
		</div>
	</form>
	
	<?php
		if(isset($_POST['bt'])){
			if($_POST['login'] == "admin" && $_POST['senha'] == "admin"){
				echo "<script>alert('ok')</script>";
				echo "<script>window.location='caac.php'</script>";
			}else{
				echo "<script>alert('Favor Incluir os Dados Corretamente');</script>";
			}
		}
	?>
	</div>
</div>
<?php include "rodape.php"; ?>