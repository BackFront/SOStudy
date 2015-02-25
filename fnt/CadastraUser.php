<?php
	include '../Sistem/iniSis.php';
	
	@$name = $_POST['nome'];
	@$name .=' '.$_POST['sobrenome'];
	@$email = $_POST['email'];
	@$cemail = $_POST['cemail'];
	@$senha = md5( sha1( $_POST['senha'] ));
	@$rsenha = md5( sha1( $_POST['rsenha'] ));
	@$sexo = $_POST['sexo'];
	
	$verMail = $DB->QRSelect('_user',"WHERE email = '$email'");	
	$checkMail = emailValidation($email);
	
	if ($email == '' || $email != $cemail){
		echo '<script>alert("Email não Confere");</script>';
		echo '<script>alert(history.go(-1));</script>';
	} else if ($checkMail == false) {
		$arrayVar = array('head'=>'Erro: 302','box'=>'Formato de Email inválido <meta http-equiv="refresh" content="3;URL=../index.php">');
		$MSG->info($arrayVar);
	} else if ($verMail){
		$arrayVar = array('head'=>'O email já está cadastrado','box'=>'Aguarde!! você está sendo redirecionado <meta http-equiv="refresh" content="3;URL=../index.php"> ');
		$MSG->info($arrayVar);
	} else if ($senha == '' || $senha != $rsenha){
		echo '<script>alert("Senha  não Confere")</script>';
		echo '<script>alert(history.go(-1));</script>';
	} else {
		$datas = array(
			'name' => $name,
			'email' => $email,
			'password' => $senha,
			'sexo' => $sexo,
			'situation' => 1
		);
		$DB->QRInsert('_user', $datas);
		$arrayVar = array('head'=>'Cadastrado Com Sucesso','box'=>'Aguarde!! você está sendo redirecionado <meta http-equiv="refresh" content="3;URL=../index.php"> ');
		$MSG->sucess($arrayVar);
	}
?>