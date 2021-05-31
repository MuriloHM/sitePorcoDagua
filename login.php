<html>
	<head><title>LoginPage</title></head>
	<body>
	<form method="post" action="login.php">
	Email: <input type="text" id="email" name="email" /><br/>
	Senha: <input type="password" id="senha" name="senha" /><br/>
	<input type="submit" name="b1" value="Entrar" />
	</form>
	<?php if(isset($_POST["b1"])) validarAcesso(); ?>
	</body>

</html>
<?php
function validarAcesso(){
	$con = new mysqli("localhost","root","", "jogos");	
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$sql = "select * from usuario where email='$email' and senha=md5('$senha')";
	//echo $sql;
	$resultado = mysqli_query($con, $sql);
	if($reg = mysqli_fetch_array($resultado)){
		echo "Acesso Liberado";
	} else {
		echo "usuário ou senha inválidos";	
	}
	$con->close();
}
?>