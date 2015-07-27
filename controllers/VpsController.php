<?php
require_once 'functions/VMCreate.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Os.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Order.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Customer.php';

class VpsController {

	public $vm;
	public $os;
	public $version;
	public $product;
	public $order;
	public $orderline;
	public $customer;
	
	public function __construct() {
		$this->vm = new Vm();
		$this->os = new Os();
		$this->version = new Version();
		$this->product = new Product();
		$this->order = new Order();
		$this->orderline = new Orderline();
		$this->customer = new Customer();
	}
	
	public function index() {
		$staticProducts = $this->product->getAllStatic();
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vps.php';
	}
	
	public function order() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			if(!isset($_SESSION['order'])) {
				$customerId = $this->customer->getIdByLogin($_SESSION['login']);
				$customerOrder = $this->order->getByCustomer($customerId[0]);
				
				if($customerOrder == NULL) {
					if($this->order->save($customerId[0]))
						$customerOrder = $this->order->getByCustomer($customerId[0]);
				}
				$_SESSION['order'] = $customerOrder[0];
			}
			
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
	
	public function payment() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getCount($_SESSION['login']);
				
			if($_POST && !empty($_POST['versionId']) && !empty($_POST['productId']) && !empty($_POST['vmName']) && !empty($_POST['vmSubscription'])) {
				$_SESSION['versionId'] = $_POST['versionId'];
				$_SESSION['productId'] = $_POST['productId'];
				$_SESSION['vmName'] = $_POST['vmName'];
				$_SESSION['vmSubscription'] = $_POST['vmSubscription'];
				
				include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsPayment.php';
			}
			else {
				header('Location: vpsConfigure.php');
			}
		}
	}
	
	public function validate() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			if(isset($_SESSION['vmSubscription']) && isset($_SESSION['productId']) && isset($_SESSION['vmName']) && isset($_SESSION['versionId'])) {
				$this->product->id = $_SESSION['productId'];
				$staticProduct = $this->product->getStatic();
				$vmSubscription = $_SESSION['vmSubscription'];
				$version = $this->version->get($_SESSION['versionId']);
				$vmName = $_SESSION['vmName'];
				$this->vm->hostname = $_SESSION['vmName'];
				
				if($this->vm->getByHostname() == NULL) {
					$lastCommandNum = $this->orderline->getLastCommandNum();
					if($lastCommandNum == NULL) {
						$commandNum = date('Y').date('m').str_pad(1, 3, '0', STR_PAD_LEFT);
					}
					else {
						if( (int)date('Y') > (int)substr($lastCommandNum[0], 0, 4) || (int)date('m') > (int)substr($lastCommandNum[0], 4, 2)) {
							$commandNum = date('Y').date('m').str_pad(1, 3, '0', STR_PAD_LEFT);
						}
						else {
							$commandNum = date('Y').date('m').str_pad((int)(substr($lastCommandNum[0], 6, 3))+1, 3, '0', STR_PAD_LEFT);
						}
					}
					$this->orderline->date = date('Y-m-d H:i:s');
					$this->orderline->expireCommandDate = date('Y-m-d H:i:s', strtotime($this->orderline->date.'+14 days'));
					$this->orderline->commandNum = $commandNum;
					$this->orderline->month = $_SESSION['vmSubscription'];
					$this->orderline->htTotal = ($staticProduct['ht_total']+$version['ht_total'])*$_SESSION['vmSubscription'];
					$this->orderline->tva = $staticProduct['tva'];
					$this->orderline->ttcTotal = ($staticProduct['ttc_total']+$version['ttc_total'])*$_SESSION['vmSubscription'];
					$this->orderline->productId = $staticProduct['id'];
					$this->orderline->versionId = $_SESSION['versionId'];
					$this->orderline->orderId = $_SESSION['order'];
					
					if($this->orderline->save()) {
						$orderlineId = $this->orderline->getId();
						$this->vm->hostname = $vmName;
						$this->vm->orderlineId = $orderlineId[0];
					
						if($this->vm->save()) {
							$orderline = $this->orderline->getByHostname($this->vm->hostname);
							
							include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsValidation.php';
						}
						else
							header('Location: vpsConfigure.php');
					}
					else
						header('Location: vpsConfigure.php');
				}
				else {
					$orderline = $this->orderline->getByHostname($this->vm->hostname);
					
					include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsValidation.php';
				}
			}
			else {
				header('Location: vpsConfigure.php');
			}
		}
	}
	
	public function VMCreate() {
		if( $_POST && !empty( $_POST['productId'] ) && !empty( $_POST['versionId'] ) && !empty($_POST['vmName']) && !empty($_POST['userEmail'])) {
			set_time_limit(600);
			
			$this->version->id = $_POST['versionId'];
			$this->product->id = $_POST['productId'];

			$versionData = $this->version->get();
			$staticProduct = $this->product->getStatic();
		
			$nameTemplate = $versionData['template_name'];
			$nbSocket = $staticProduct['cpu'];
			$ram = $staticProduct['ram'];
			$disk = $staticProduct['disk'];
			
			_CreerVM("test", "test", "test", $_POST['userEmail'], $_POST['vmName'], $nameTemplate, $nbSocket, $ram, $disk);
			sleep(350);
			
			$this->vm->hostname = $_POST['vmName'];
			
			$vmData = $this->vm->getByHostname();
			
			if( $vmData != NULL && $vmData['create_vm'] != 0) {
				$_SESSION['hostname'] = $vmData['hostname'];
				$_SESSION['ipAddr'] = $vmData['ip_addr'];
				
				echo "success+".$vmData['hostname']."+".$vmData['ip_addr'];	
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