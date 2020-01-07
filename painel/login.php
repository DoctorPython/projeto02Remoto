
<!DOCTYPE html>
<html>
<head>
	<meta name="viweport" content="width-device-width, initial-scale-1.0">
	<meta name="keywords" content="palavras,do,meu,site">
	<meta name="description" content="descrição do meu site">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;  ?>estilo/font-awesome.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;  ?>estilo/style.css">
	<script src="https://use.fontawesome.com/e7d987adc5.js"></script>
	<meta charset="utf-8">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
<title></title>
</head>
<body>

	<div class=" box-login">
		<?php
			if (isset($_POST['acao'])) {
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb.admin_usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if ($sql->rowCount() == 1) {
					$info = $sql->fetch();
					//logamos com sucesso
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password']= $password;
					$_SESSION['cargo']= $info['cargo'];
					$_SESSION['nome']= $info['nome'];
					$_SESSION['img']= $info['img'];


					header('Location:'.INCLUDE_PATH_PAINEL);
					die();
					# code...
				}else{
					//deu errado
					echo '<div class="erro-box"  ><i class="fa fa-times" aria-hidden="true"></i> Usuário ou Senha incorretos!</div>';

				}
			}
		?>
		<h2 class="login"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</h2>
		<form method="post">
			<input type="text" name="user" placeholder="login">
			<input  type="password" name="password" required="" placeholder="senha">
			<input type="submit" name="acao" value="Logar" >
		</form>

	</div><!--box-login-->
</body>
</html>