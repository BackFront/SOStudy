<?php
/******************************************************
DATA TRANSFORM
 * ***************************************************/
 function date_transform__($data,$x = null) {
	$timestamp = explode(" ",$data);
	$getData = $timestamp[0];
	$getTime = $timestamp[1];
	$setData = explode('-',$getData);
	$mes = $setData[1];
	if($x) {
		switch ($mes) {
			case 01: $mes = 'Janeiro'; break;
			case 02: $mes = 'Fevereiro'; break;
			case 03: $mes = 'Março'; break;
			case 04: $mes = 'Abril'; break;
			case 05: $mes = 'Maio'; break;
			case 06: $mes = 'Junho'; break;
			case 07: $mes = 'Julho'; break;
			case 08: $mes = 'Agosto'; break;
			case 09: $mes = 'Setembro'; break;
			case 10: $mes = 'Outubro'; break;
			case 11: $mes = 'Novembro'; break;
			case 12: $mes = 'Dezembro'; break;
		}
		
		return array(
			'dia' => $setData[2],
			'mes' => $mes,
			'ano' => $setData[0]
		);
	} else {
		return array(
			'dia' => $setData[2],
			'mes' => $setData[1],
			'ano' => $setData[0]
		);
	}
}
 

/******************************************************
DEBUG
******************************************************/
function _debug($arg = null){
	echo $html = '<div style="padding:15px;width:100%;height:200px;position:fixed;top:0;color:#fff;left:0;background: rgba( 0, 0, 0, .7 );">';
		echo '<pre>';
			print_r($arg);
		echo '</pre>';
	echo $html = '</div>';
}	


/******************************************************
REDIRECT
******************************************************/
function redirect($z, $x = 0){
	echo "<meta http-equiv='refresh' content='$x;url=$z'>";
	//echo" <script>document.location.href='$z'</script>";
}
/******************************************************
CLASS - GET LOG USER
******************************************************/
function _Log()
{   
    //echo "<pre>";
    //print_r($_SERVER);
    //echo "</pre>";
    $DB = new Database(HOST,USER,PASS);
    $ip = $_SERVER["REMOTE_ADDR"];
    $url = $_SERVER['REQUEST_URI'];
    $archive = substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - strlen(strrchr($_SERVER['SCRIPT_FILENAME'], "\\")));
    $method = $_SERVER['REQUEST_METHOD'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];
    $user = '['.IDUSER.']['.NAMEUSER.']['.EMAILUSER.']';
    
    $datas = array( 
        'ip' => $ip, 
        'url' => $url,
        'archive' => $archive,
        'method' => $method,
        'navegador' => $navegador,
        'user' => $user
    );
    $DB->QRInsert('_log', $datas);
}

if(LOG == true){_Log();}

/*****************************
GERA RESUMOS
*****************************/

	function lmWord($string, $words = '100'){
		$string 	= strip_tags($string);
		$count		= strlen($string);
		
		if($count <= $words){
			return $string;	
		}else{
			$strpos = strrpos(substr($string,0,$words),' ');
			return substr($string,0,$strpos).'...';
		}
		
	}
	
/*****************************
VALIDA O CPF
*****************************/	

	function valCpf($cpf){
		$cpf = preg_replace('/[^0-9]/','',$cpf);
		$digitoA = 0;
		$digitoB = 0;
		for($i = 0, $x = 10; $i <= 8; $i++, $x--){
			$digitoA += $cpf[$i] * $x;
		}
		for($i = 0, $x = 11; $i <= 9; $i++, $x--){
			if(str_repeat($i, 11) == $cpf){
				return false;
			}
			$digitoB += $cpf[$i] * $x;
		}
		$somaA = (($digitoA%11) < 2 ) ? 0 : 11-($digitoA%11);
		$somaB = (($digitoB%11) < 2 ) ? 0 : 11-($digitoB%11);
		if($somaA != $cpf[9] || $somaB != $cpf[10]){
			return false;	
		}else{
			return true;
		}
	}	

/*****************************
VALIDA O EMAIL
*****************************/	
	
	function emailValidation($email){
		if(preg_match('/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return true;
		}else{
			return false;
		}
	}
	
/*****************************
ENVIA O EMAIL
*****************************/	

	function sendMail($assunto,$mensagem,$remetente,$nomeRemetente,$destino,$nomeDestino, $reply = NULL, $replyNome = NULL){
		
		require_once('mail/class.phpmailer.php'); //Include pasta/classe do PHPMailer
		
		$mail = new PHPMailer(); //INICIA A CLASSE
		$mail->IsSMTP(); //Habilita envio SMPT
		$mail->SMTPAuth = true; //Ativa email autenticado
		$mail->IsHTML(true);
		
		$mail->Host = MAILHOST; //Servidor de envio
		$mail->Port = MAILPORT; //Porta de envio
		$mail->Username = MAILUSER; //email para smtp autenticado
		$mail->Password = MAILPASS; //seleciona a porta de envio
		
		$mail->From = utf8_decode($remetente); //remtente
		$mail->FromName = utf8_decode($nomeRemetente); //remtetene nome
		
		if($reply != NULL){
			$mail->AddReplyTo(utf8_decode($reply),utf8_decode($replyNome));	
		}
		
		$mail->Subject = utf8_decode($assunto); //assunto
		$mail->Body = utf8_decode($mensagem); //mensagem
		$mail->AddAddress(utf8_decode($destino),utf8_decode($nomeDestino)); //email e nome do destino
		
		if($mail->Send()){
			return true;
		}else{
			return false;
		}
	}	

/*****************************
FORMATA DATA EM TIMESTAMP
*****************************/	

	function formDate($data){
		$timestamp = explode(" ",$data);
		$getData = $timestamp[0];
		$getTime = $timestamp[1];
		
			$setData = explode('/',$getData);
			$dia = $setData[0];
			$mes = $setData[1];
			$ano = $setData[2];
			
		if(!$getTime):
			$getTime = date('H:i:s');
		endif;
			
		$resultado = $ano.'-'.$mes.'-'.$dia.' '.$getTime;
		
		return $resultado;
		
	}
	
/*****************************
MANAGE ESTATÍSCAS
*****************************/

	function viewManager($times = 2){
		$selMes = date('m');
		$selAno = date('Y');
		if(empty($_SESSION['startView']['sessao'])){
			$_SESSION['startView']['sessao'] = session_id();
			$_SESSION['startView']['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['startView']['url'] = $_SERVER['PHP_SELF'];
			$_SESSION['startView']['time_end'] = time() + $times;
			create('up_views_online',$_SESSION['startView']);
			$readViews = read('up_views',"WHERE mes = '$selMes' AND ano = '$selAno'");
			if(!$readViews){
				$createViews = array('mes' => $selMes, 'ano' => $selAno);	
				create('up_views',$createViews);
			}else{
				foreach($readViews as $views);
				if(empty($_COOKIE['startView'])){
					$updateViews = array(
						'visitas' => $views['visitas']+1,
						'visitantes' => $views['visitantes']+1
					);
					update('up_views',$updateViews,"mes = '$selMes' AND ano = '$selAno'");
					setcookie('startView',time(),time()+60*60*24,'/');
				}else{
					$updateVisitas = array('visitas' => $views['visitas']+1);
					update('up_views',$updateVisitas,"mes = '$selMes' AND ano = '$selAno'");
				}
			}
		}else{
			$readPageViews = read('up_views',"WHERE mes = '$selMes' AND ano = '$selAno'");
			if($readPageViews){
				foreach($readPageViews as $rpgv);
				$updatePageViews = array('pageviews' => $rpgv['pageviews']+1);
				update('up_views',$updatePageViews,"mes = '$selMes' AND ano = '$selAno'");
			}
			$id_sessao = $_SESSION['startView']['sessao'];
			if($_SESSION['startView']['time_end'] <= time()){
				delete('up_views_online',"sessao = '$id_sessao' OR time_end <= time(NOW())");
				unset($_SESSION['startView']);	
			}else{
				$_SESSION['startView']['time_end'] = time() + $times;
				$timeEnd = array('time_end' => $_SESSION['startView']['time_end']);	
				update('up_views_online',$timeEnd,"sessao = '$id_sessao'");
			}	
		}
	}

/*****************************
Paginação de resultados
*****************************/

	function readPaginator($tabela, $cond, $maximos, $link, $pag, $width = NULL, $maxlinks = 4){
		$readPaginator = read("$tabela","$cond");
		$total = count($readPaginator);
		if($total > $maximos){
			$paginas = ceil($total/$maximos);
			if($width){
				echo '<div class="paginator" style="width:'.$width.'">';
			}else{
				echo '<div class="paginator">';
			}
			echo '<a href="'.$link.'1">Primeira Página</a>';
			for($i = $pag - $maxlinks; $i <= $pag - 1; $i++){
				if($i >= 1){
					echo '<a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
				}
			}
			echo '<span class="atv">'.$pag.'</span>&nbsp;&nbsp;&nbsp;';
			for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
				if($i <= $paginas){
					echo '<a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
				}
			}
			echo '<a href="'.$link.$paginas.'">Última Página</a>';
			echo '</div><!-- /paginator -->';
		}
	}
?>