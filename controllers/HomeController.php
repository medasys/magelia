<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';

class HomeController {

	public $product;
	public $orderline;
	
	public function __construct() {
		$this->product = new Product();
		$this->orderline = new Orderline();
	}
	
	public function index() {
		$staticProducts = $this->product->getAllStatic();
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/home.php';
	}
		
}