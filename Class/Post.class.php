<?php
class Post {
	
	public function Loop($condition = null)
	{
		$DB = new Database(HOST,USER,PASS);
		return $selection2 = $DB->QRSelect('_post',$condition);
	}
	public function get_autor($idAutor)
	{
		$DB = new Database(HOST,USER,PASS);
		$autor = $DB->QRSelect('_user',"WHERE id = $idAutor");
			return $info = array(
			'name' => $autor[0]['name'],
			'thumb' => $autor[0]['thumb']
		);
	}	
	public function Like($idPost,$quantAtual)
	{
		$DB = new Database(HOST,USER,PASS);
		$datas = array(
			'post_like' => $quantAtual++
		);
		$DB->QRUpdate('_post',$datas,"WHERE id = $idPost");
	}
}