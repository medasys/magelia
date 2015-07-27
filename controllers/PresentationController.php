<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';

class PresentationController {

	public $orderline;
	
	public function __construct() {
		$this->orderline = new Orderline();
	}
	
	public function index() {
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/presentation.php';
	}
		
}