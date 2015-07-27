<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';

class HomeController {
	public $product;
	public $orderline;
	public $vm;
	
	public function __construct() {
		$this->product = new Product();
		$this->orderline = new Orderline();
		$this->vm = new Vm();
	}
	
	public function index() {
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getPending($_SESSION['login']);
			$vpsList = $this->vm->getAllHostnameByCustomer($_SESSION['login']);
			$servicesList = $this->vm->getAllServicesByCustomer($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/home.php';
		}
		else {
			header('Location: authentification.php');
		}
	}
}