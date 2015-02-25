<?php
include '../fnt/UploadFile.php';

if( isset ( $_POST['atualizasenha'] )){
	@$atual = md5(sha1($_POST['atual']));
	@$nova = md5(sha1($_POST['nova']));
	@$cnova = md5(sha1($_POST['cnova']));
	
	if(!empty($atual) || !empty($nova) || !empty($cnova)){
		if($nova == $cnova){
			$id = IDUSER;
			$condition = "WHERE id = '{$id}' AND password = '{$atual}'";
			$selection2 = $DB->QRSelect('_user',$condition);
			
			if($selection2){
				$datas = array('password' => $nova);
				$update = $DB->QRUpdate('_user', $datas,"WHERE id = $id");
				echo '<div class="msg sucess">Senha alterada com sucesso!</div>';
			} else {
				echo '<div class="msg erro">Não foi possivel alterar a senha</div>';
			}
		} else {
			echo '<div class="msg alert">As senhas digitadas não são iguais</div>';
		}
	} else {
		echo '<div class="msg erro">Preencha os treis campos de senha</div>';
	}
}

if( isset ( $_POST['atualiza'] )){
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$up_thumb = $_FILES['thumb'];
	
	if(empty($nome) || empty($sexo)){
		echo '<div class="msg erro">Preencha todos os campos</div>';
	} else if(!empty($up_thumb)){
			$upload = uploadFile($up_thumb,'../uploads');
			if($upload == 'extInvalid'){
				echo '<div class="msg erro">Extensão de arquivo invalida | use: JPG ou PNG</div>';	
			} else {
				$up_thumb = $upload;
			}			
			$datas = array(
				'name' => $nome,
				'sexo' => $sexo,
				'thumb' => $up_thumb
			);
	} else {
		$datas = array(
			'name' => $nome,
			'sexo' => $sexo
		);
	}	
	$id = IDUSER;
	$update = $DB->QRUpdate('_user', $datas,"WHERE id = $id");
	if($update){
		//header('Location: settings.php');
		redirect('settings.php');
	} 
}
if( isset( $_GET['edit'])){
	if( $_GET['edit'] == 'remove-thumb'){		
		$id = IDUSER;
		$condition = "WHERE id = '{$id}'";
		$selection2 = $DB->QRSelect('_user',$condition);
		if($selection2) { $thumb = $key['thumb']; }	
		$datas = array('thumb' => '');
		$update = $DB->QRUpdate('_user', $datas,"WHERE id = $id");
		if($update){
			$del = deletFile($thumb,'../uploads/');
			if($del){
				//header('Location: settings.php');
				redirect('settings.php');
			}
		} 
	}
}
?>