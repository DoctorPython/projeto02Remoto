<?php include('config.php');?>
<?php Site::updateUsuarioOnline();?>
<?php Site::contador();?>
<!DOCTYPE>
<html>
<head>
	<title>Projeto 01</title>
	<meta name="viweport" content="width-device-width, initial-scale-1.0">
	<meta name="keywords" content="palavras,do,meu,site">
	<meta name="description" content="descrição do meu site">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;  ?>estilo/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;  ?>estilo/font-awesome.css">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH;  ?>estilo/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/e7d987adc5.js"></script>
	
	
	
</head>
<body>
	
<base base = "<?php echo INCLUDE_PATH; ?>"/>	
	<?php
		$url = isset($_GET['url'])? $_GET['url'] : 'home';
		switch ($url) {
			case 'depoimentos':
				echo '<target target= "depoimentos"/>';
				break;
			case 'servicos':
			 	echo'<target target= "servicos"/>';
			 	break;
			

		}

	?>
	<div class="sucesso">formulario enviado com sucesso!</div>
	<div class="overlay-loading">
		<img src=" <?php echo INCLUDE_PATH;  ?>img/ajax-loader.gif">

	</div> <!--overlay-loading-->
	<?php new Email('ns66.hostgator.com.br','ti@frigoum.com.br','123456789','Bruno'); ?>

	<header>
		<div class="center">
			<div class="logo left"><i class="fa fa-connectdevelop" aria-hidden="true"></i></div>
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH;  ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH;  ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH;  ?>servicos">Serviços</a></li>
					<li><a realtime ="contato" href="<?php echo INCLUDE_PATH;  ?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH;  ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH;  ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH;  ?>servicos">Serviços</a></li>
					<li><a realtime ="contato" href="<?php echo INCLUDE_PATH;  ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
		</div><!--center-->
	</header>
	<div class="conteiner-principal"><!--conteiner-principal-->
	<?php 
			
			if (file_exists('pages/'.$url.'.php')) {
				include('pages/'.$url.'.php');

			}else{
				if ($url != 'depoimentos' && $url !='servicos') {
					$pagina404 = true;
					include('pages/404.php');
				}else{
					include('pages/home.php');
				}
				
			}
			
	?>
	</div><!--conteiner-principal-->
	<footer  <?php if (isset($pagina404) && $pagina404 = true) echo 'class="fixed"'; ?> >
		<div class="center">
			<p>todos direitos reservados</p>
		</div>	
	
	</footer>
	<script src="<?php echo INCLUDE_PATH;  ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH;  ?>js/script.js"></script>
	<script src="<?php echo INCLUDE_PATH;  ?>js/slider.js"></script>
	<script src="<?php echo INCLUDE_PATH;  ?>js/contato.js"></script>
	<script src="<?php echo INCLUDE_PATH;  ?>js/formularios.js"></script>
	<script src="<?php echo INCLUDE_PATH;  ?>js/constantes.js"></script>
	
	
	
	

	


</body>
</html>