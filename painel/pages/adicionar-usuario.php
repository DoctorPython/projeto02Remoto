<?php
	verificaPermissaoPagina(2);
		

?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>


	<form method="post" enctype="multipart/form-data"> 

		<?php
			if(isset($_POST['acao'])){
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
				if ($login == '') {
					Painel::alert('erro','Campo Login Obrigatório!');
				}else if ($nome == '') {
					Painel::alert('erro','Campo Nome Obrigatório!');
				}else if ($senha == '') {
					Painel::alert('erro','Campo Senha Obrigatório!');
				}else if ($imagem['name'] == '') {
					Painel::alert('erro','Campo Imagem Obrigatório!');
				}else if ($cargo == '') {
					Painel::alert('erro','Campo Cargo Obrigatório!');
				}else{
					//podemos cadastrar 
					if ($cargo >= $_SESSION['cargo']) {
						Painel::alert('erro','Você precisa escolher um cargo abaixo do seu');
					}else if (Painel::imagemValida($imagem) == false) {
						Painel::alert('erro','O formato da imagem é invalido ou maior que 300mb');
					}else if (Painel::userExists($login)) {
						Painel::alert('erro','O Login ja exite escolha outro !');
					}else{
						//apenas cadastrar no banco.
						$usuario = new Usuario();
						Painel::alert('sucesso','O cadastro do usuário '.$login.' foi realizado com sucesso!');
		
					}
				}
				

			}

		?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login"  >
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome"  >
		</div><!--form-group-->
		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
				<?php
					foreach (Painel::$cargos as $key => $value) {
						if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password"  >
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem" >
		
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->