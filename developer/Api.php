<?php
	require '../Sistem/iniApi.php';
/*==============================================================
 * FUNCOES REFERENTES AO URUARIO
 =============================================================*/	
	//Login
	if($_GET['user'] == 'logar') {
		$json = file_get_contents('php://input');
		$obj = json_decode($json);

		$email = $obj->email;
		$password = md5(sha1($obj->password));
		
		$verUser = $DB->QRSelect('_user',"WHERE email = '$email' AND password  = '$password'");
		if($verUser){
			return true;
		} else {
			return false;
		}
	}
	
	//Cadastro
	if($_GET['user'] == 'cadastrar') {
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		
		$nome = $obj->nome;
		$email = $obj->email;
		$senha = md5(sha1($obj->senha));
		$sexo = $obj->sexo;
		
		$verMail = $DB->QRSelect('_user',"WHERE email = '$email'");	
		$checkMail = emailValidation($email);
		
		if ($email == '' || $senha == '' || $nome == ''){
			return 9;
		} else if ($checkMail == false) {
			return 8;
		} else if ($verMail){
			return 7;
		} else {
			$datas = array(
				'name' => $nome,
				'email' => $email,
				'password' => $senha,
				'sexo' => $sexo,
				'situation' => 1
			);
			
			$cadUser = $DB->QRInsert('_user', $datas);
			if($cadUser){
				return true;
			} else {
				return false;
			}
		}
	}
	
/*==============================================================
 * FUNCOES REFERENTES AO ROTEIRO DE ESTUDOS
 =============================================================*/	
//Login
	if($_GET['guide'] == 'cadastrar') {		
		$json = file_get_contents('php://input');
		$obj = json_decode($json);
		
		
		/*
		 {
		"titulo" 	: "xxxx",
		"midia"  	: "xxxx",
		"descricao" : "xxxx",
		"tags" 	    : "xxxx",
		"tipo" 	    : "xxxx",
		"id_user"   : "xxxx" 
		}		
		 */
		$titulo = $obj->titulo;
		$midia = $obj->midia;
		$descricao = $obj->descricao;
		$tags = $obj->tags;
		$tipo = $obj->tipo;
		$id_user = $obj->id_user;
		 
		if(empty($titulo) || empty($descricao)){
			return 0;
		} else {
			$datas = array(
				'user_id' => $id_user,
				'guide_name' => $titulo,
				'guide_description' => $descricao,
				'guide_midia' => $midia,
				'guide_tags' => $tags,
				'guide_type' => $tipo
			);
			$ins = $DB->QRInsert('_guide', $datas);
			unset($iduser);
			unset($titulo);
			unset($description);
			unset($content);
			unset($tags);
			unset($type);
			
			if($ins){ return 1; echo '1';} else { return 0; echo '0'; }
		}
	}
	
//http://localhost:83/sostudy/developer/Api.php?handling=XXXXXXXx
?>