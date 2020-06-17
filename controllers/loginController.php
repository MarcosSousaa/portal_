<?php

class LoginController extends Controller {

	public function index(){
		$u = new Users();
		$data = array();
		if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && empty($_POST['pass'])){	

			$user = addslashes(filter_input(INPUT_POST, 'user'));
			$data['user_new'] = $user;
			if($u->consultaUser($user)){
				$data['error'] = 'Login Possui senha cadastrada';
				$this->loadView('login', $data);	

			}
			else{
				$this->loadView('altersenha', $data);
			}
			

		}
		else if(isset($_POST['newSenha']) && !empty($_POST['newSenha'])){	
			$user = addslashes(filter_input(INPUT_POST, 'usr'));		
			$novaSenha = addslashes(filter_input(INPUT_POST, 'newSenha'));	
			$u->updatePass($novaSenha,$user);
			$data['error'] = 'Senha Criada com Sucesso.';
			$this->loadView('login',$data);
			exit();
		}
		else if(isset($_POST['pass']) && !empty($_POST['pass'])){
			$user = addslashes(filter_input(INPUT_POST, 'user'));
			$pass = addslashes(filter_input(INPUT_POST, 'pass'));			
						
			if($u->doLogin($user,$pass)){				
				header("Location:" . BASE_URL);
				exit();
				
			}
			else {
				$data['error'] = 'Login/Senha - Incorretos';
				$this->loadView('login', $data);
			}		
		}
		else {
			$this->loadView('login', $data);	
		}
		
	}

	public function logout(){
		$u = new Users();
		unset($_SESSION['data1']);
		unset($_SESSION['data2']);
		unset($_SESSION['ext']);
		unset($_SESSION['turno']);				
		session_destroy();
		$u->logout();
		header("Location:".BASE_URL);
	}
	
}