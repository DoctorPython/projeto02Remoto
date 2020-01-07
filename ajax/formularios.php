<?php
	include('../config.php');
	$data = array();
	$assunto = 'nova mensagem do site';
	$corpo = '';


	foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).":".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto'=>$assunto, 'corpo'=>$corpo );
	$mail = new Email('ns66.hostgator.com.br','ti@frigoum.com.br','123456789','Bruno');
	$mail->addAdress('teste@frigoum.com.br','bruno');
	$mail->formatarEmail($info);
	
	if($mail->enviarEmail()) {
  	$data['sucesso'] = true;
	}else{
		$data['erro'] = true;
	}
	$data['retorno'] = 'sucesso';
	die(json_encode($data));
?>