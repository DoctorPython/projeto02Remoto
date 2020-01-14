<?php
	if (isset($_GET['loggout'])) {
		Painel::loggout();
		# code...
	}
?>
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
	<div class="menu">
		<div class="menu-wraper">
			<div class="box-usuario">
				<?php
					if($_SESSION['img'] == ''){
				?>
					<div class="avatar-usuario">
						<i class="fa fa-user"></i>
					</div><!--avatar-usuario-->
				<?php }else{ ?>
					<div class="imagem-usuario">
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
					</div><!--avatar-usuario-->
				<?php } ?>
				<div class="nome-usuario">
					<p> <?php echo $_SESSION['nome'];?> </p>
					<p><?php echo pegarCargo($_SESSION['cargo']); ?></p>
				</div><!--box-usuario -->
				
			</div><!--box-usuario -->
			<div class="itens-menu">
			
				<h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Cadastrar</h2>
				<a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimentos</a>
				<a <?php selecionadoMenu('cadastrar-servicos'); ?> href="">Cadastrar Serviços</a>
				<a <?php selecionadoMenu('cadastrar-slides'); ?> href="">Cadastrar Slides</a>
				<h2><i class="fa fa-briefcase" aria-hidden="true"></i> Gestão</h2>
				<a <?php selecionadoMenu('listar-depoimentos'); ?> href="">Listar Depoimentos</a>
				<a <?php selecionadoMenu('listar-servicos'); ?> href="">Lista Serviços</a>
				<a <?php selecionadoMenu('listar-slides'); ?> href="">Listar Slides</a>
				<h2><i class="fa fa-lock" aria-hidden="true"></i> Administração do Painel</h2>
				<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuário</a>
				<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar Usuários</a>
				<h2><i class="fa fa-cogs" aria-hidden="true"></i> Configuração Geral</h2>
				<a <?php selecionadoMenu('editar-site'); ?>  href="">Editar Site</a>
			</div><!--itens-menu -->
		</div><!--menu-wraper -->
	</div><!--menu -->
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div><!--menu-btn-->
			<div class="loggout">
				<a <?php if (@$_GET['url'] == '') { ?> style="background: #60727a; padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL?>">
				<i class="fa fa-home" aria-hidden="true"></i> <span>Pagina Inicial</span> </a>
				<a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fa fa-power-off" aria-hidden="true"></i> <span>Sair</span> </a>
			</div><!--loggout -->
			<div class="clear"></div><!--clear -->
		</div><!--center -->
	</header>

	<div class="content">

		<?php Painel::carregarPagina(); ?>
	</div><!--content-->
<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>		
<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>	
</body>
</html>		

	
		

