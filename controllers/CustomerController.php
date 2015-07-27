<?php
require_once 'functions/realperson.php';

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
		$customerTypes = $this->customerType->getAll();
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/authentification.php';
	}
	
	public function authentificate() {
		if($_POST && !empty($_POST['userLogin']) && !empty($_POST['userPassword'])) {
			$this->user->login = $_POST['userLogin'];
			$this->user->password = $_POST['userPassword'];
			
			$user = $this->user->authentificate();
			if($user != NULL) {
				$_SESSION['customername'] = $user['firstname'].' '.$user['lastname'];
				$_SESSION['login'] = $user['login'];
				
				if(isset($_GET['product_id']) || isset($_SESSION['productId']))
					header('Location: vpsOrder.php');
				else
					header('Location: index.php');
			}
			else {
				header('Location: authentification.php');
			}
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function register() {
		if($_POST && !empty($_POST['customerTypeId']) && !empty($_POST['customerFirstname']) && !empty($_POST['customerLastname']) && !empty($_POST['customerTel']) && !empty($_POST['customerEmail']) && !empty($_POST['customerAddress']) && !empty($_POST['customerZipCode']) && !empty($_POST['customerCity']) && !empty($_POST['customerCountry']) && !empty($_POST['userLogin']) && !empty($_POST['userPassword'])) {
			$this->customer->firstname = $_POST['customerFirstname'];
			$this->customer->lastname = $_POST['customerLastname'];
			$this->customer->tel = $_POST['customerTel'];
			$this->customer->email = $_POST['customerEmail'];
			$this->customer->address = $_POST['customerAddress'];
			$this->customer->zipCode = $_POST['customerZipCode'];
			$this->customer->city = $_POST['customerCity'];
			$this->customer->country = $_POST['customerCountry'];
			$this->customer->customerTypeId = $_POST['customerTypeId'];
			
			if($this->customer->save()) {
				$customer = $this->customer->getByEmail();
				if($customer != NULL) {
					$this->user->login = $_POST['userLogin'];
					$this->user->password = $_POST['userPassword'];
					$this->user->customerId = $customer['id'];
					
					if($this->user->save()) {
						$customerId = $customer['id'];
						$customerEmail = $_POST['customerEmail'];
						include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/registration.php';
					}
					else {
						header('Location: authentification.php');
					}
				}
				else {
					header('Location: authentification.php');
				}
			}
			else {
				header('Location: authentification.php');
			}
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function activate() {
		if($_GET && !empty($_GET['customerId'])) {
			if($this->user->activate($_GET['customerId'])) {
				include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsOrder.php';
			}
			else {
				header('Location: authentification.php');
			}
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function logout() {
		$_SESSION = array();
		session_destroy();
		
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	}
		
}