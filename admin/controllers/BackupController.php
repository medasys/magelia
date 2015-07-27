<?php

require_once 'functions/VMCreate.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Os.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';

class BackupController {

	public $vm;
	public $os;
	public $version;
	public $product;
	public $orderline;
	
	public function __construct() {
		$this->vm = new Vm();
		$this->os = new Os();
		$this->version = new Version();
		$this->product = new Product();
		$this->orderline = new Orderline();
	}
	
	public function index() {
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/cloud-backup.php';
	}
	
	public function order() {
		session_start();
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			if(isset($_GET['product_id'])) 
				$this->product->id = $_GET['product_id'];
			else
				$this->product->id = $_SESSION['productId'];
			
			$staticProduct = $this->product->getStatic();
			
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsOrder.php';
		}
	}
	
	public function configure() {
		session_start();
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$osData = $this->os->getAll();
			
			if(isset($_GET['product_id'])) 
				$this->product->id = $_GET['product_id'];
			else
				$this->product->id = $_SESSION['productId'];
			
			$staticProduct = $this->product->getStatic();
			
			$cart = $this->orderline->getCount($_SESSION['login']);
			
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
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			if($_POST && !empty($_POST['versionId']) && !empty($_POST['productId']) && !empty($_POST['vmName'])) {
				$this->version->id = $_POST['versionId'];
				$this->product->id = $_POST['productId'];

				$versionData = $this->version->get();
				$staticProduct = $this->product->getStatic();
				$vmName = $_POST['vmName'];
				
				include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsValidation.php';
			}
			else {
				header('Location: vpsConfigure.php');
			}
		}
	}
	
	public function VMCreate() {
		if( $_POST && !empty( $_POST['productId'] ) && !empty( $_POST['versionId'] ) && !empty($_POST['vmName'])) {
			set_time_limit(600);
			
			$this->version->id = $_POST['versionId'];
			$this->product->id = $_POST['productId'];

			$versionData = $this->version->get();
			$staticProduct = $this->product->getStatic();
		
			$nameTemplate = $versionData['template_name'];
			$nbSocket = $staticProduct['cpu'];
			$ram = $staticProduct['ram'];
			$disk = $staticProduct['disk'];
			
			_CreerVM("test", "test", "test", "test", $_POST['vmName'], $nameTemplate, $nbSocket, $ram, $disk);
			sleep(270);
			
			$this->vm->hostname = $_POST['vmName'];
			
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