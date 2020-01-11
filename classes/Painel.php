<?php
	/**
	 * 
	 */ 
	class Painel
	{
		public static function userExists($login){

		}
		public static $cargos=[ //variavel global cargos.
		'0' => 'Normal',
		'1' => 'Sub Administrador',
		'2' => 'Administrador'];

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}
		public static function loggout(){
			session_destroy();
			header('Location'.INCLUDE_PATH_PAINEL);

		}
		//metodo chamado no arquivo main.php
		public static function carregarPagina(){
			if(isset($_GET['url'])){
				//função explode cria um array em cada barra.
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não existe!
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}

		public static function listarUsuarioOnline(){
			self::limparUsuarioOnline();
			$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
			$sql->execute();
			return $sql->fetchAll();

		}//end
		public static function limparUsuarioOnline(){
			$date = date('Y-m-d H:i:s');
			$sql = Mysql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");

		}//end
		//função chamada na tela editar usuario.
		public static function alert($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo '<div style="background:#2e7d32;width:100%;text-align:center;color: white;"class "box-alert sucesso"> <i class="fa fa-check-square" aria-hidden="true"></i> '.$mensagem.'</div>';
			}else if ($tipo == 'erro') {
				echo '<div style="background:#d50000;width:100%;text-align:center;color: white;
"  class "box-alert erro"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$mensagem.'</div>';
			}
		}//end


		public static function imagemValida($imagem){
			if($imagem['type'] == 'image/jpeg' ||
				$imagem['type'] == 'imagem/jpg' ||
				$imagem['type'] == 'imagem/png'){

				$tamanho = intval($imagem['size']/1024);
				if($tamanho < 300)
					return true;
				else
					return false;
			}else{
				return false;
			}
		}

		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
				return $imagemNome;
			else
				return false;
		}
		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}



		
	}


?>