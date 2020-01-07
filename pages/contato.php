
<section class="banner-contato">
		<div class="w50">
		<div style="background-image: url('<?php echo INCLUDE_PATH?>img/muma.jpg');" class="contato-single"></div></div><!--banner-single-->
		<div class="w50">
		<div style="background-image: url('<?php echo INCLUDE_PATH?>img/muma02.jpg');" class="contato-single"></div></div>
		<div class="w50">
		<div style="background-image: url('<?php echo INCLUDE_PATH?>img/muma03.jpg');" class="contato-single"></div></div>
		
		<div class="overlay"></div>
		<div class="bolas">
			<span class="active-slides"></span>
			<span class="active-slides"></span>
			<span class="active-slides"></span>
		</div><!--bullets-->
	
	</section><!--banner-conteiner-->

<div class="contato-container">
	<div class="center">
		<form method="post">
			
			<input type="text" name="nome" placeholder="Nome" required="">
			<div></div>
			<input type="text" name="email" placeholder="E-mail" required="">
			<div></div>
			<input type="text" name="telefone" placeholder="Telefone" required="">
			<div></div>
			<textarea name="mensagem" placeholder="Minha Mensagem" required=""></textarea>
			<div></div>
			<input type="hidden" name="identificador" value="form_contato"/>
			<input type="submit" name="acao" value="Enviar">
		</form>
	</div><!--center-->
</div><!--contato-container-->