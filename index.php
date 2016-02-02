<!document html>
<html>
<head>
<meta http-equiv="Content-Type" Content-Type: text/html; charset=utf-8 />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <TITLE>index</TITLE>
</HEAD> 
<BODY>
	<form method="POST">
	Usuário<input type="text" size="50" name="login">
	Senha<input type="password" size="50" name="senha">
	<input type="submit" value="LOGAR" name="bt">
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
</BODY>
</HTML>
