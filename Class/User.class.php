<?php	
	class User
	{
		/*=======================================
		Funcao que Loga o usuario
		=======================================*/
		public function Logar($table, $L_user, $L_pass)
		{
			//Inicia a clases de box de Mensagens
			$MSG = new MessageBox();
			//Instancia a classe Database 
			$DB = new Database(HOST,USER,PASS);
			$condition = "WHERE email = '$L_user'";			
			$selection = $DB->QRSelect('_user',$condition);
			if($selection) {
				$condition = "WHERE email = '{$L_user}' AND password = '{$L_pass}'";
				$selection2 = $DB->QRSelect('_user',$condition);
				if($selection2) {
					//Recupera as informacoes do usuario
					foreach ($selection2 as $key) {
						$idUser = $key['id'];
						$thumb = $key['thumb'];
						$token = $key['token'];
						$nameUser = $key['name'];
						$emailUser = $key['email'];
						$passwordUser = $key['email'];
						$situationUser = $key['situation'];
					}
					//Cria as Sessoes com essas informacoes
					$_SESSION['token'] 			 = $token;
					$_SESSION['thumb'] 			 = $thumb;
					$_SESSION['idUser'] 		 = $idUser;
					$_SESSION['nameUser'] 	 	 = $nameUser;
					$_SESSION['emailUser'] 		 = $emailUser;
					$_SESSION['passwordUser'] 	 = $passwordUser;
					$_SESSION['situationdlUser'] = $situationUser;
					
					echo '<meta http-equiv="refresh" content="0;URL='.URL.'/user/">';
				} else {
					$arrayVar = array('head'=>'Erro ao Logar','box'=>'Login e/ou Senha não conferem<meta http-equiv="refresh" content="3;URL=../index.php"> ');
					$MSG->info($arrayVar);
				}
			} else {
				$arrayVar = array('head'=>'Erro ao Logar','box'=>'Email não encontrado<meta http-equiv="refresh" content="3;URL=../index.php"> ');
				$MSG->info($arrayVar);
			}
		}

		/*=======================================
		Funcao que Verifica se esta logado
		=======================================*/
		public function authenticUser()
		{
			$DB = new Database(HOST,USER,PASS);
			if(isset($_SESSION['emailUser']) && isset($_SESSION['passwordUser'])) {
				$L_user = $_SESSION['emailUser'];
				$L_pass = $_SESSION['passwordUser'];
				$condition = "WHERE email = '{$L_user}' AND password = '{$L_pass}'";
				$selection = $DB->QRSelect('_user',$condition);
				if ($selection) {
					session_destroy(); 
					unset($_SESSION['passwordUser']); 
					unset($_SESSION['emailUser']); 
					echo '<meta http-equiv="refresh" content="0;URL='.URL.'">';
					die;
				}
			} else {
				session_destroy();
				unset($_SESSION['emailUser']);
				unset($_SESSION['passwordUser']); 
				echo '<meta http-equiv="refresh" content="0;URL='.URL.'">';
				die; 
			}
		}
		/*=======================================
		Redireciona sem mostrar tela de login
		=======================================*/
		public function redirectLogado()
		{
			$DB = new Database(HOST,USER,PASS);
			if(isset($_SESSION['emailUser']) && isset($_SESSION['passwordUser'])) {
				$L_user = $_SESSION['emailUser'];
				$L_pass = $_SESSION['passwordUser'];
				$condition = "WHERE email = '{$L_user}' AND password = '{$L_pass}'";
				$selection = $DB->QRSelect('_user',$condition);
				if ($selection) {
					session_destroy(); 
					unset($_SESSION['passwordUser']); 
					unset($_SESSION['emailUser']); 
					return false;
					die;
				}
			} else {
				session_destroy();
				unset($_SESSION['emailUser']);
				unset($_SESSION['passwordUser']); 
				return false;
				die; 
			} return true;
		}
		/*=======================================
		Funcao desloga usuario
		=======================================*/
		public function logout()
		{
			session_destroy();
			unset($_SESSION['idUser']);
			unset($_SESSION['nameUser']);
			unset($_SESSION['emailUser']);
			unset($_SESSION['passwordUser']);
			unset($_SESSION['situationdlUser']);
			echo '<meta http-equiv="refresh" content="0;URL='.URL.'">';
			die; 
		}
	}
?>
