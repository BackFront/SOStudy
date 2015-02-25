<?php
include '../Sistem/iniSis.php';
if( isset ( $_POST['editar'])){
		
	@$titulo = $_POST['titulo'];	
	@$link = $_POST['link'];
	@$categoria = $_POST['categoria'];
	@$midia = $_POST['midia'];
	@$tipo = $_POST['opc'];
	@$descricao = $_POST['descricao'];
	@$idpost = $_POST['post'];
	@$idioma = $_POST['idioma'];
	
	if(empty($titulo) || empty($link) || empty($descricao)){
		echo '<div class="msg erro">Existe algum campo obrigatório em branco</div>';
	} else {
		$datas = array(
			'post_title' => $titulo,
			'post_link' => $link,
			'post_category' => $categoria,
			'post_midia' => $midia,
			'post_type' => $tipo,
			'post_description' => $descricao,
			'post_idioma' => $idioma,
		);
		$DB->QRUpdate('_post', $datas,"WHERE id = {$idpost}");
		
		unset($titulo);	
		unset($link);
		unset($categoria);
		unset($midia);
		unset($tipo);
		unset($descricao);
		unset($idioma);
		header('Location: edit_content.php?id='.$idpost.'&edit=0');
	}
}
if(isset($_GET['edit'])){ echo '<div class="msg sucess">Conteúdo atualizado com sucesso</div>'; }