<?php
function uploadFile($file, $directory = null)
{
	$rootDir = 'uploads/';
	if(empty($directory)){
		$openDir = $rootDir; 
	} else {
		$openDir = $directory;
	}
	$dir = dir($openDir);
	$strrfile = strrpos($file['name'],'.');
	$arqExt = substr($file['name'],$strrfile);
	if($arqExt != '.jpg' && $arqExt != '.png'){
		return 'extInvalid';
	} else {
		$arqName = base64_encode(time()).$arqExt;
		move_uploaded_file($file['tmp_name'],$openDir.'/'.$arqName);
		return $arqName;
	}
}

function deletFile($file, $directory = null)
{
	$rootDir = 'uploads/';
	if(empty($directory)){
		$openDir = $rootDir; 
	} else {
		$openDir = $directory;
	}
	$del = unlink($openDir.$file);
	if($del){
		return true;
	}
}
?>