<?php
	
	/**
	 * 
	 */
	class Usuario{
		
		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = Mysql::conectar()->prepare("UPDATE `tb.admin_usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))) {
				return true;
				
			}else{
				return false;
			}

		}

		public static function userExists($user){
			$sql = Mysql::conectar()->prepare("SELECT `id` FROM `tb.admin_usuarios` WHERE user = ?");
			$sql->execute(array($user));
			if ($sql->rowCount() == 1) 
				return true;
			else
				return false;
			

		}
		public function cadastrarUsuario($user,$senha,$imagem,$nome,$cargo){
			$sql =  Mysql::conectar()->prepare("INSERT INTO `tb.admin_usuarios` VALUES (null,?,?,?,?,?) ");
			$sql->execute(array($user,$senha,$imagem,$nome,$cargo));
		}
	}


?>