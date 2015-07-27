<?php

require_once 'functions/VMCreate.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Os.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Order.php';

class CartController {

	public $vm;
	public $os;
	public $version;
	public $product;
	public $orderline;
	public $order;
	
	public function __construct() {
		$this->vm = new Vm();
		$this->os = new Os();
		$this->version = new Version();
		$this->product = new Product();
		$this->orderline = new Orderline();
		$this->order = new Order();
	}
	
	public function index() {
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
			$orderlines = $this->orderline->getAllCurrents($_SESSION['login']);
			$validatedOrderlines = $this->orderline->getAllValidated($_SESSION['login']);
		} else {
			$orderlines = NULL;
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/cart.php';
	}
	
	public function deleteOrderline() {
	
		if($_POST && !empty($_POST['orderlineId'])) {
			$this->orderline->id = $_POST['orderlineId'];
			$orderId = $this->orderline->getOrder();
			$this->order->id = $orderId[0];
			$orderlineCount = $this->orderline->getCountByOrder($orderId[0]);
			
			if($orderlineCount != NULL) {
				if($orderlineCount[0] == 1) {
					$this->vm->deleteByOrderline($_POST['orderlineId']);
					$this->orderline->delete();
					$this->order->delete();
					
					echo 'success';
				}
				else {
					$this->vm->deleteByOrderline($_POST['orderlineId']);
					$this->orderline->delete();
					
					echo 'success';
				}
			}
			else {
				echo 'db_error';
			}
		}
		else {
			echo 'data_error';
		}
		
	}
			
}