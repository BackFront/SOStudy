<?php
	include '../Sistem/iniSis.php';
	
	$L_user = $_POST['login-user'];
	$L_pass = md5(sha1($_POST['login-pass']));
	
	if( $L_user == '' || $L_pass == '' ){
		$arrayVar = array('head'=>'Alerta','box'=>'Existe algum campo em branco, volte e tente novamente<meta http-equiv="refresh" content="3;URL=../index.php"> ');
		$MSG->error($arrayVar);
	} else {
		$USER->Logar('_user',$L_user,$L_pass);
	}
?>	