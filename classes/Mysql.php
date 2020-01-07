<?php
	/**
	 * 
	 */
	class Mysql{
		private static $pdo;
		public static function conectar(){
			if (self::$pdo == null) {
				try {
					self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
					self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
				}catch (Exception $e) {
					echo '<div><h2>erro ao conectar</h2></div>';
				
				}
			}
			return self::$pdo;
			
	

		}
		
	}

 		/**if (isset(self::$pdo)) {
				return self::$pdo;
				# code...
			}else{
				self::$pdo = new PDO('mysql:host'.HOST.';dbname='.DATABASE,USER,PASSWORD);
			}**/
?>