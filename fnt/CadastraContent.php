<?php
include '../Sistem/iniSis.php';
if( isset ( $_POST['cadastrar'])){
		
	@$titulo = $_POST['titulo'];	
	@$link = $_POST['link'];
	@$categoria = $_POST['categoria'];
	@$midia = $_POST['midia'];
	@$tipo = $_POST['opc'];
	@$descricao = $_POST['descricao'];
	@$autor = $_POST['autor'];
	@$conc = $_POST['concordo'];
	@$idioma = $_POST['idioma'];

	if ($conc != true){
		echo '<div class="msg erro">Você deve concordar com os termos de uso</div>';
	} else if(empty($titulo) || empty($link) || empty($descricao) || empty($autor)){
		echo '<div class="msg erro">Existe algum campo obrigatório em branco</div>';
	} else {
		$datas = array(
			'post_title' => $titulo,
			'post_link' => $link,
			'post_category' => $categoria,
			'post_midia' => $midia,
			'post_type' => $tipo,
			'post_description' => $descricao,
			'user_id' => $autor,
			'post_idioma' => $idioma,
			'post_situation' => 1
		);
		$DB->QRInsert('_post', $datas);
		
		unset($titulo);	
		unset($link);
		unset($categoria);
		unset($midia);
		unset($tipo);
		unset($descricao);
		unset($autor);
		unset($conc);
		unset($idioma);
		
		echo '<div class="msg sucess">Conteúdo cadastrado com sucesso</div>';
	}
}
