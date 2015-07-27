<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/User.php';

class AdminController {
	
	public $user;
	
	public function __construct() {
		$this->user = new User();		
	}
	
	public function authentificateForm() {
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/admin/views/authentification.php';
	}
	
	public function authentificate() {
		if($_POST && !empty($_POST['userLogin']) && !empty($_POST['userPassword'])) {
			$this->user->login = $_POST['userLogin'];
			$this->user->password = $_POST['userPassword'];
			
			$user = $this->user->adminAuthentificate();
			if($user != NULL) {
				$_SESSION['login'] = $user['login'];
					
				header('Location: index.php');
			}
			else {
				$_SESSION['loginError'] = "Identifiant / mot de passe incorrecte(s).";
				header('Location: authentification.php');
			}
		}
		else {
			$_SESSION['loginError'] = "Identifiant / mot de passe incorrecte(s).";
			header('Location: authentification.php');
		}
	}
	
	public function logout() {
		$_SESSION = array();
		session_destroy();
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/admin/views/authentification.php';
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
		
}