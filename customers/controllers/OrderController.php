<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';

class OrderController {

	public $orderline;
	public $vm;
	
	public function __construct() {
		$this->orderline = new Orderline();
		$this->vm = new Vm();
	}
	
	public function index() {
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getPending($_SESSION['login']);
			$vpsList = $this->vm->getAllHostnameByCustomer($_SESSION['login']);
			$servicesList = $this->vm->getAllServicesByCustomer($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/pending-orders.php';
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function invoices() {
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getPending($_SESSION['login']);
			$vpsList = $this->vm->getAllHostnameByCustomer($_SESSION['login']);
			$servicesList = $this->vm->getAllServicesByCustomer($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/invoices.php';
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function view() {
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getPending($_SESSION['login']);
			$vpsList = $this->vm->getAllHostnameByCustomer($_SESSION['login']);
			$servicesList = $this->vm->getAllServicesByCustomer($_SESSION['login']);
			
			if( $_GET && !empty( $_GET['id'] ) ) {
				$_SESSION['orderline_id'] = $_GET['id'];
				$orderline = $this->orderline->getPendingById($_GET['id'], $_SESSION['login']);
			}				
			else
				$orderline = NULL;
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/pending-orders-view.php';
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function selectVersions() {
		if($_POST && ($_POST['distributionId'] != '')) {
			$data = "";
			$versions = $this->version->getAllByDistribution($_POST['distributionId']);
			foreach($versions as $version) {
				$data .= $version['id'].'&'.$version['name'].'&'.$version['total'].';';
			}
			echo $data;
		}
		else
			echo 'data_error';
	}
	
	public function configure() {
		session_start();
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$osData = $this->os->getAll();
			$langData = $this->lang->getAll();
			
			if(isset($_GET['product_id'])) 
				$this->product->id = $_GET['product_id'];
			else
				$this->product->id = $_SESSION['productId'];
			
			$staticProduct = $this->product->getStatic();
			
			$cart = $this->orderline->getPending($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsConfigure.php';
		}
	}
	
	public function validate() {
		session_start();
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getPending($_SESSION['login']);
			
			if($_POST && !empty($_POST['osId']) && !empty($_POST['productId']) && !empty($_POST['nameVM'])) {
				$this->os->id = $_POST['osId'];
				$this->product->id = $_POST['productId'];

				$osData = $this->os->get();
				$staticProduct = $this->product->getStatic();
				$nameVM = $_POST['nameVM'];
				
				include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsValidation.php';
			}
			else {
				header('Location: vpsConfigure.php');
			}
		}
	}
	
	public function VMCreate() {
		if( $_POST && !empty( $_POST['productId'] ) && !empty( $_POST['osId'] ) && !empty($_POST['nameVm'])) {
			set_time_limit(600);
			
			$this->os->id = $_POST['osId'];
			$this->product->id = $_POST['productId'];

			$osData = $this->os->get();
			$staticProduct = $this->product->getStatic();
		
			$nameTemplate = $osData['template_name'];
			$nbSocket=$staticProduct['cpu'];
			$ram=$staticProduct['ram'];
			
			_CreerVM("test", "test", "test", "test", $_POST['nameVm'], $nameTemplate, $nbSocket, $ram);
			sleep(270);
			
			$this->vm->hostname = $_POST['nameVm'];
			
			$vmData = $this->vm->getByHostname();
			
			if( $vmData != NULL ) {
				echo "success";	
			}
			else {
				echo "db_error";
			}
		}	
		else {
			echo "data_error";
		}
	}
		
}