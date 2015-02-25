<?php
	require '../Sistem/iniSis.php';
	$USER->authenticUser();
	
	$condition = "WHERE email = '{$_SESSION['emailUser']}'";
	$selection2 = $DB->QRSelect('_user',$condition);
	if($selection2) {
		//Recupera as informacoes do usuario
		foreach ($selection2 as $key) {
			$sexoUser = $key['sexo'];
			$nome = $key['name'];
			$thumbnail = $key['thumb'];
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="<?php echo CHARSET; ?>">
		<title><?php echo SITENAME; ?></title>
		
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<script type="text/javascript" src="../js/jquery.js"> </script>
		<script type="text/javascript" src="../js/main.js"> </script>
		<script type="text/javascript" src="../js/ajax.js"> </script>
	</head>
	<body>
		<header>
			<div class="wrap clearfix mt15">
				<a href="<?php echo URL."/user" ?>" class="logo"> </a>
				<div id="wrap-info-user">
					<input type="text" class="form span-right input" placeholder="O que você procura?" /><input type="submit" value="Pesquisar" class="input button" />
					<a href="#">
						<a href="#">
							<?php
							if(empty($thumbnail)){?>
								<img src="../uploads/user.jpg" class="thumb-user" width="50" /></a>
							<?php } else{ ?>
								<img src="../uploads/<?php echo $thumbnail; ?>" class="thumb-user" width="50" /></a>
							<?php } ?>
					</a>
				
					<ul class="user-name">
						<li>
							<a href="#" >Ola, <?php $name = explode(' ', $nome); echo $name[0];?></a>
							<ul>
								<li><a href="<?php echo SUBURL;?>/user">Início</a></li>								
								<li><a href="new_reference.php">Cadastrar referência</a></li>
								<li><a href="settings.php">Settings</a></li>
								<li><a href="<?php echo URL;?>/fnt/Logout.php">Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</header>