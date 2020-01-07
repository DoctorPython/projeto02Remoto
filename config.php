<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if ($class == 'Email') {
				require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);
	
	define('INCLUDE_PATH','http://192.168.51.103/projeto02/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	//conectar com banco de dados.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto_01');

	define('NOME_EMPRESA','BS TECNOLOGY');

	//function

	function pegarCargo($cargo){
		$arr=[
			'0' => 'Normal',
			'1' => 'Sub Administrador',
			'2' => 'Administrador'];

			return $arr[$cargo]; 
		
	}

?>