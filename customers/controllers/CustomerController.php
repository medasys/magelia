<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Country.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/CustomerType.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Customer.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/User.php';

class CustomerController {

	public $country;
	public $customerType;
	public $customer;
	public $user;
	
	public function __construct() {
		$this->country = new Country();
		$this->customerType = new CustomerType();
		$this->customer = new Customer();
		$this->user = new User();		
	}
	
	public function authentificateForm() {
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/authentification.php';
	}
	
	public function registerForm() {
		if(isset($_SESSION['email'])) {
			$customerTypes = $this->customerType->getAll();
			$countries = $this->country->getAll();
		
			$this->customer->email = $_SESSION['email'];
			$customer = $this->customer->getByEmail();
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/registration.php';
		}
		else {
			session_destroy();
			header('Location: authentification.php');
		}
	}
	
	public function registerStepOne() {
		if($_POST && !empty($_POST['customerFirstname']) && !empty($_POST['customerLastname']) && !empty($_POST['customerEmail']) && !empty($_POST['customerDefaultReal'])) {
			$this->customer->firstname = $_POST['customerFirstname'];
			$this->customer->lastname = $_POST['customerLastname'];
			$this->customer->email = $_POST['customerEmail'];
			
			if($this->customer->save()) {
				session_start();
				$_SESSION['firstname'] = $this->customer->firstname;
				$_SESSION['lastname'] = $this->customer->lastname;
				$_SESSION['email'] = $this->customer->email;
				
				echo 'success';
			}
			else
				echo 'db_error';
		}
		else {
			echo 'data_error';
		}
	}
	
	public function registerStepTwo() {
		if($_POST && !empty($_POST['customerTypeId']) && !empty($_POST['customerFirstname']) && !empty($_POST['customerLastname']) && !empty($_POST['customerEmail']) && !empty($_POST['customerTel']) && !empty($_POST['customerAddress']) && !empty($_POST['customerZipCode']) && !empty($_POST['customerCity']) && ($_POST['customerUseConditions'] == 1) && !empty($_POST['countryId']) && !empty($_POST['userPassword']) && !empty($_POST['userPasswordConfirm']) && ($_POST['userPassword'] == $_POST['userPasswordConfirm'])) {
			session_start();
			$this->customer->customerTypeId = $_POST['customerTypeId'];
			$this->customer->firstname = $_POST['customerFirstname'];
			$this->customer->lastname = $_POST['customerLastname'];
			$this->customer->email = $_POST['customerEmail'];
			$this->customer->tel = $_POST['customerTel'];
			$this->customer->fax = $_POST['customerFax'];
			$this->customer->address = $_POST['customerAddress'];
			$this->customer->zipCode = $_POST['customerZipCode'];
			$this->customer->city = $_POST['customerCity'];
			$this->customer->newsletter = $_POST['customerNewsletter'];
			$this->customer->countryId = $_POST['countryId'];
			
			$this->user->login = $_SESSION['email'];
			$this->user->password = $_POST['userPassword'];
			
			$customer = $this->customer->getByEmail();
			if($customer != NULL) {
				$this->customer->id = $customer['id'];
				$this->user->customerId = $customer['id'];	
			}
			
			if($this->customer->update()) {
				if($this->user->save()) {
					$_SESSION['firstname'] = $this->customer->firstname;
					$_SESSION['lastname'] = $this->customer->lastname;
					$_SESSION['login'] = $this->user->login;
					
					echo 'success';	
				}
				else {
					echo 'db_error';	
				}
			}
			else
				echo 'db_error';
		}
		else {
			echo 'data_error';
		}
	}
	
	public function authentificate() {
		if($_POST && !empty($_POST['userLogin']) && !empty($_POST['userPassword'])) {
			$this->user->login = $_POST['userLogin'];
			$this->user->password = $_POST['userPassword'];
			
			$user = $this->user->customerAuthentificate();
			if($user != NULL) {
				$_SESSION['customername'] = $user['firstname'].' '.$user['lastname'];
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
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/authentification.php';
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
		
}