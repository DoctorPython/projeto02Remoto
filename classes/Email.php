<?php

 class Email{
 	private $mailer;
 	
 	public function __construct($host,$username,$senha,$name)
 	{
			$this->mailer = new PHPMailer;
		 	$this->mailer->isSMTP();                                            // Send using SMTP
		    $this->mailer->Host       =  $host; //'ns66.hostgator.com.br';                    // S
		    $this->mailer->SMTPAuth   = true;                                   // Enable SMTP aut
		    $this->mailer->Username   =    $username;                          // SM
		   	$this->mailer->Password   = $senha;                               // SMTP passwo
		    $this->mailer->SMTPSecure = 'ssl';        
		    $this->mailer->Port       = 465;
		    $this->mailer->setFrom($username, $name);
		  	$this->mailer->isHTML(true);                                  // Set email format to H
	}

	public function addAdress($email,$nome){
		$this->mailer->addAddress($email,$nome); 
	}
	public function formatarEmail($info){
		$this->mailer->Subject = $info['assunto'];
		$this->mailer->Body    = $info['corpo'];
		$this->mailer->AltBody = strip_tags($info['corpo']) ;
	}
	public function enviarEmail(){
		if ($this->mailer->send()) {
			return true;
		}else{
			return false;
		}
	}
 	
}

 ?>
