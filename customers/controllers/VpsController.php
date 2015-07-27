<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Os.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Order.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Customer.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/api/rhev/Methodes.php';

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
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getPending($_SESSION['login']);
			$vpsList = $this->vm->getAllHostnameByCustomer($_SESSION['login']);
			$servicesList = $this->vm->getAllServicesByCustomer($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/vps.php';
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
				$vps = $this->vm->getByIdByCustomer($_GET['id'], $_SESSION['login']);
			}
			else
			{	$vps = NULL;}
			$methodes=new Methodes();
			$disks=$methodes->disks($vps['id_hyp']);
			$disk=$disks[0];
			$persDisk=variant_int(((float)$disk["used"]/(float)$disk["size"])*100);
			$statistic=$methodes->statistics($vps['id_hyp']);
			$perMemory=variant_int(((float)$statistic[1]["value"]/(float)$statistic[0]["value"])*100);
			$perCpu=variant_int($statistic[2]["value"]/10);
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/views/vps-view.php';
		}
		else {
			header('Location: authentification.php');
		}
	}
	
	public function restart() {
		if( $_POST && !empty( $_POST['vmId'] ) ) {
			session_start();
			$vpsItem = $this->vm->getByIdByCustomer($_POST['vmId'], $_SESSION['login']);
				
			//$vpsItem['guid']
			//$vpsItem['id_api']
			//$vpsItem['id_hyp']
			$methodes=new Methodes();
			$result=$methodes->restart($vpsItem['id_hyp']);
			if($result)
			echo "success";
			else "erreur";
		}
	}
	
	public function passwordReset() {
		echo "success";
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
			
			$cart = $this->orderline->getPending($_SESSION['login']);
			
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
			
			$cart = $this->orderline->getPending($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsConfigure.php';
		}
	}
	
	public function validate() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['product_id'])) $_SESSION['productId'] = $_GET['product_id'];
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getPending($_SESSION['login']);
			
			if($_POST && !empty($_POST['versionId']) && !empty($_POST['productId']) && !empty($_POST['vmName'])) {
				$this->version->id = $_POST['versionId'];
				$this->product->id = $_POST['productId'];

				$versionData = $this->version->get();
				$staticProduct = $this->product->getStatic();
				$vmName = $_POST['vmName'];
				
				$this->orderline->htTotal = $staticProduct['ht_total'];
				$this->orderline->tva = $staticProduct['tva'];
				$this->orderline->ttcTotal = $staticProduct['ttc_total'];
				$this->orderline->productId = $staticProduct['id'];
				$this->orderline->versionId = $_POST['versionId'];
				$this->orderline->orderId = $_SESSION['order'];
				$this->orderline->validate = 0;
				
				if($this->orderline->save()) {
					$orderlineId = $this->orderline->get();
					$this->vm->hostname = $vmName;
					$this->vm->orderlineId = $orderlineId[0];
					$this->vm->createvm = 0;
					$this->vm->ipAddr = NULL;
					$this->vm->comments = NULL;
					
					if($this->vm->save())
						include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/vpsValidation.php';
					else
						echo 'db_error';
				}
				else
					echo 'db_error';
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