<?php 
	$usuariosOnline = Painel:: listarUsuarioOnline();

	
	
	$pegarVisitasTotais = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();
	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));
	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>
<div class="box-content left w100">
			<h2 class="painel-controle"><i class="fa fa-cogs" aria-hidden="true"></i> Painel de Controle - <?PHP echo NOME_EMPRESA; ?></h2>

			<div class="box-metricas">
				<div class="box-metrica-single1">
					<div class="box-metrica-wraper">
						<h2>Usuários Online</h2>
						<p><?php echo count($usuariosOnline); ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single1-->
				<div class="box-metrica-single2">
					<div class="box-metrica-wraper">
						<h2>Total de Visitas</h2>
						<p><?php echo $pegarVisitasTotais;?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single-->

				<div class="box-metrica-single3">
					<div class="box-metrica-wraper">
						<h2>Visitas Hoje</h2>
						<p><?php echo $pegarVisitasHoje;?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single-->
				<div class="clear"></div>
			</div><!--box-metricas-->
		</div><!--box-content-->

		
		<div class="box-content   left w100">
			<h2><i class="fa fa-eye" aria-hidden="true"></i> Usuários Online</h2>
			<div class="table-responsive">
				<div class="row">
					<div class="col">
						<span><i class="fa fa-desktop" aria-hidden="true"></i> IP</span>
					</div><!--col-->
					<div class="col">
						<span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Ação</span>
					</div><!--col-->
					<div class="clear"></div>
				</div><!--row-->
				<?php
					foreach ($usuariosOnline as $key => $value) {
			
					
					 	
					 
				?>
				<div class="row">
					<div class="col">
						<span><?php echo $value['ip']; ?></span>
					</div><!--col-->
					<div class="col">
						<span><?php echo date( 'd/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
					</div><!--col-->
					<div class="clear"></div>
				</div><!--row-->
				<?php } ?><!--fim foreach-->
			</div><!--table-responsive-->
			
		</div>

		<div class="box-content   left w100">
			<h2><i class="fa fa-eye" aria-hidden="true"></i> Usuários Painel</h2>
			<div class="table-responsive">
				<div class="row">
					<div class="col">
						<span><i class="fa fa-id-card-o" aria-hidden="true"></i> Nome</span>
					</div><!--col-->
					<div class="col">
						<span><i class="fa fa-level-up" aria-hidden="true"></i> Cargo</span>
					</div><!--col-->
					<div class="clear"></div>
				</div><!--row-->
				<?php
					$usuariosPainel = Mysql::conectar()->prepare("SELECT * FROM `tb.admin_usuarios`");
					$usuariosPainel->execute();
					$usuariosPainel = $usuariosPainel->fetchall();
					foreach ($usuariosPainel as $key => $value) {
			
					
					 	
					 
				?>
				<div class="row">
					<div class="col">
						<span><?php echo $value['user']; ?></span>
					</div><!--col-->
					<div class="col">
						<span><?php echo pegarCargo($value['cargo']) ?></span>
					</div><!--col-->
					<div class="clear"></div>
				</div><!--row-->
				<?php } ?><!--fim foreach-->
			</div><!--table-responsive-->
			
		</div>
		<div class="clear"></div>
		<!--
		<div class="box-content left w50">
			
		</div>
		<div class="box-content right w50">
			
		</div>
		-->
		<div class="clear"></div>