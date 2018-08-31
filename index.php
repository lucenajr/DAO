<?php

	require_once("config.php");

	$usuario = new Usuario();

	$usuario->getId(2);


	$usuario = json_decode($usuario);



?>

<html>
	<head></head>
		<body>
			<form>
				<label>Id do Usuário:</label>
				<?php echo $usuario->idusuario; ?><br>
				<label>Nome:</label>
				<?php echo $usuario->nome; ?><br>
				<label>Data de cadastro: </label>
				<?php echo $usuario->dtcadastro; ?>
			</form>
		</body>
</html>