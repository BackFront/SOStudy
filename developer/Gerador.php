<?php
require '../Sistem/iniSis.php';
if(isset($_GET['L_email']) && isset($_GET['L_pass'])){
	$email = $_GET['L_email'];
	$senha = md5( sha1( $_GET['L_pass'] ) );
	$condition = "WHERE email = '$email' AND password = '$senha'";
	$select = $DB->QRSelect('_user',$condition);
	if($select){	
		$i = 0;
		$content[$i] =	'<?xml version="1.0" encoding="UTF-8"?>';
		$content[$i] .=		'<info>';
		foreach ($select as $key) {
			$content[$i].=			'<user>';
			$content[$i].=				'<id>'.$key['id'].'</id>';
			$content[$i].=				'<name>'.$key['name'].'</name>';
			$content[$i].=				'<email>'.$key['email'].'</email>';
			$content[$i].=				'<password>'.$key['password'].'</password>';
			$content[$i].=				'<sexo>'.$key['sexo'].'</sexo>';
			$content[$i].=				'<situation>'.$key['situation'].'</situation>';
			$content[$i].=			'</user>';
			$i++;
		}
		$content[$i] .=		'</info>';
		file_put_contents('infoUser.xml', $content);
		header("Location: infoUser.xml");
		return true;	
	}
}

//_________________
if(isset($_GET['l'])){

	$email = $_POST['email'];
	$senha = md5( sha1( $_POST['pass'] ));
	
}
?>
