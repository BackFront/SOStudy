<?php
require '../Sistem/iniApi.php';
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	
	$id_post = $obj->id_post;
	$id_user = $obj->id_user;
	
	$select2 = $DB->QRSelect("_likes","WHERE id_user = {$id_user} AND id_post = {$id_post}");
	if(!$select2){
		$select = $DB->QRSelect("_post","WHERE id = {$id_post}");
		$like = $select[0]['post_unlike']+1;
		$datas = array('post_unlike'=>$like);
		$DB->QRUpdate("_post",$datas,"WHERE id = {$id_post}");
		$datas2 = array(
			'id_post' => $id_post, 
			'id_user' => $id_user,
			'like_unlike' => 0
		);
		$cadUser = $DB->QRInsert('_likes', $datas2);
		return true;
	} else {
		return false;
	}
