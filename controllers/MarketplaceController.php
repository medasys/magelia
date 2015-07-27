<?php
require_once 'functions/VMCreate.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Vm.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Os.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Distribution.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Product.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Order.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Customer.php';

class MarketplaceController {

	public $vm;
	public $os;
	public $distribution;
	public $version;
	public $product;
	public $order;
	public $orderline;
	public $customer;
	
	public function __construct() {
		$this->vm = new Vm();
		$this->os = new Os();
		$this->distribution = new Distribution();
		$this->version = new Version();
		$this->product = new Product();
		$this->order = new Order();
		$this->orderline = new Orderline();
		$this->customer = new Customer();
	}
	
	public function index() {
		$distributions = $this->distribution->getAllServices(1);
		
		if(isset($_SESSION['login'])) {
			$cart = $this->orderline->getCount($_SESSION['login']);
		}
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplace.php';
	}
	
	public function search() {
		$distributions = $this->distribution->getAllServices(1);
		
		$cart = $this->orderline->getCount($_SESSION['login']);
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceSearch.php';
	}
	
	public function chooseService() {
		if(isset($_GET['service_id'])) $_SESSION['serviceId'] = $_GET['service_id'];
		
		$staticProducts = $this->product->getAllStatic();
		
		$cart = $this->orderline->getCount($_SESSION['login']);
		
		include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/chooseService.php';
	}
	
	public function order() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['service_id'])) $_SESSION['serviceId'] = $_GET['service_id'];
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
			
			if(isset($_GET['service_id'])) 
				$this->distribution->id = $_GET['service_id'];
			else
				$this->distribution->id = $_SESSION['serviceId'];

			$service = $this->distribution->getVersionByDistribution($this->distribution->id);
			
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceOrder.php';
		}
	}
	
	public function configure() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['service_id'])) {
				$this->version->id = $_GET['service_id'];
				$_SESSION['serviceId'] = $this->version->getDistributionId();
			}
			header('Location: authentification.php');
		}
		else {
			if(isset($_GET['service_id'])) {
				$service = $this->version->get($_GET['service_id']);
			}
			else {
				$service = $this->distribution->getVersionByDistribution($_SESSION['serviceId']);
			}
			
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceConfigure.php';
		}
	}
	
	public function payment() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['service_id'])) {
				$this->version->id = $_GET['service_id'];
				$_SESSION['serviceId'] = $this->version->getDistributionId();
			}
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getCount($_SESSION['login']);
	
			if($_POST && !empty($_POST['versionId']) && !empty($_POST['vmName']) && !empty($_POST['vmSubscription'])) {
				$_SESSION['versionId'] = $_POST['versionId'];
				$_SESSION['vmName'] = $_POST['vmName'];
				$_SESSION['vmSubscription'] = $_POST['vmSubscription'];
				$_SESSION['versionName'] = $_POST['versionName'];
				
				if($_POST['versionName'] == 'drupal') {
					$_SESSION['serviceTitle'] = $_POST['serviceTitle'];
					$_SESSION['serviceUsername'] = $_POST['serviceUsername'];
					$_SESSION['servicePassword'] = $_POST['servicePassword'];
					$_SESSION['serviceEmail'] = $_POST['serviceEmail'];
				}
	
				include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplacePayment.php';
			}
			else {
				header('Location: vpsConfigure.php');
			}
		}
	}
	
	public function validate() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['service_id'])) {
				$this->version->id = $_GET['service_id'];
				$_SESSION['serviceId'] = $this->version->getDistributionId();
			}
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getCount($_SESSION['login']);
				
			if(isset($_SESSION['vmSubscription']) && isset($_SESSION['versionId']) && isset($_SESSION['vmName'])) {
				$this->version->id = $_SESSION['versionId'];
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
					$this->orderline->htTotal = $version['ht_total']*$_SESSION['vmSubscription'];
					$this->orderline->tva = 20;
					$this->orderline->ttcTotal = $version['ttc_total']*$_SESSION['vmSubscription'];
					$this->orderline->versionId = $_SESSION['versionId'];
					$this->orderline->orderId = $_SESSION['order'];
						
					if($this->orderline->save()) {
						$orderlineId = $this->orderline->getId();
						$this->vm->hostname = $vmName;
						$this->vm->orderlineId = $orderlineId[0];
						if($_SESSION['versionName'] == 'drupal') {
							$this->vm->title = $_SESSION['serviceTitle'];
							$this->vm->login = $_SESSION['serviceUsername'];
							$this->vm->password = $_SESSION['servicePassword'];
							$this->vm->email = $_SESSION['serviceEmail'];
						}		
						
						if($this->vm->saveService()) {
							$orderline = $this->orderline->getByHostname($this->vm->hostname);
								
							include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceValidation.php';
						}
						else
							header('Location: marketplaceConfigure.php');
					}
					else
						header('Location: marketplaceConfigure.php');
				}
				else {
					$orderline = $this->orderline->getByHostname($this->vm->hostname);
						
					include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceValidation.php';
				}
			}
			else {
				header('Location: marketplaceConfigure.php');
			}
		}
	}
	
	public function validateOld() {
		if(!isset($_SESSION['login'])) {
			if(isset($_GET['service_id'])) {
				$this->version->id = $_GET['service_id'];
				$_SESSION['serviceId'] = $this->version->getDistributionId();
			}
			header('Location: authentification.php');
		}
		else {
			$cart = $this->orderline->getCount($_SESSION['login']);
			
			if($_POST && !empty($_POST['versionId']) && !empty($_POST['vmName']) && !empty($_POST['domainName']) && !empty($_POST['versionName'])) {
				$this->version->id = $_POST['versionId'];
				$versionData = $this->version->get();
				
				$vmName = $_POST['vmName'];
				$domainName = $_POST['domainName'];
				if($_POST['versionName'] == 'drupal') {
					$serviceUsername = $_POST['serviceUsername'];
					$servicePassword = $_POST['servicePassword'];
					$serviceEmail = $_POST['serviceEmail'];
					$versionName = $_POST['versionName'];
				}
				if($_POST['versionName'] == 'wordpress') {
					$serviceUsername = $_POST['serviceUsername'];
					$servicePassword = $_POST['servicePassword'];
					$serviceEmail = $_POST['serviceEmail'];
					$serviceTitle = $_POST['serviceTitle'];
					$versionName = $_POST['versionName'];
				}
				if($_POST['versionName'] == 'magento') {
					$serviceUserFirstname = $_POST['serviceUserFirstname'];
					$serviceUserLastname = $_POST['serviceUserLastname'];
					$servicePassword = $_POST['servicePassword'];
					$serviceEmail = $_POST['serviceEmail'];
					$serviceLanguage = $_POST['serviceLanguage'];
					$serviceCurrency = $_POST['serviceCurrency'];
					$versionName = $_POST['versionName'];
				}
				if($_POST['versionName'] == 'dolibarr') {
					$serviceUsername = $_POST['serviceUsername'];
					$servicePassword = $_POST['servicePassword'];
					$serviceEmail = $_POST['serviceEmail'];
					$versionName = $_POST['versionName'];
				}
				
				$this->orderline->htTotal = 200;
				$this->orderline->tva = 20;
				$this->orderline->ttcTotal = 300;
				$this->orderline->productId = 3;
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
						include $_SERVER["DOCUMENT_ROOT"].'/medacloud/views/marketplaceValidation.php';
					else
						echo 'db_error';
				}
				else
					echo 'db_error';
			}
			else {
				header('Location: marketplaceConfigure.php');
			}
		}
	}
	
	public function VMCreate() {
		if( $_POST && !empty( $_POST['versionId'] ) && !empty($_POST['vmName']) && !empty($_POST['versionName'])) {
			set_time_limit(2000);
			
			$this->version->id = $_POST['versionId'];
			
			$versionData = $this->version->get();
			
			$nameTemplate = $versionData['template_name'];
			
			if($_POST['versionName'] == 'drupal')
				_CreerService($_POST['serviceUserLastname'], $_POST['serviceUserLastname'], $_POST['servicePassword'], $_POST['serviceEmail'], NULL, NULL, $_POST['versionName'], $_POST['vmName'], $nameTemplate);
			if($_POST['versionName'] == 'wordpress')
				_CreerService($_POST['serviceUserLastname'], $_POST['serviceUserLastname'], $_POST['servicePassword'], $_POST['serviceEmail'], $_POST['serviceTitle'], NULL, $_POST['versionName'], $_POST['vmName'], $nameTemplate);
			if($_POST['versionName'] == 'magento')
				_CreerService($_POST['serviceUserFirstname'], $_POST['serviceUserLastname'], $_POST['servicePassword'], $_POST['serviceEmail'], $_POST['serviceTitle'], $_POST['serviceCurrency'], $_POST['versionName'], $_POST['vmName'], $nameTemplate);
			if($_POST['versionName'] == 'dolibarr')
				_CreerService($_POST['serviceUserLastname'], $_POST['serviceUserLastname'], $_POST['servicePassword'], $_POST['serviceEmail'], NULL, NULL, $_POST['versionName'], $_POST['vmName'], $nameTemplate);
			
			sleep(350);
			
			$this->vm->hostname = $_POST['vmName'];
			
			$vmData = $this->vm->getByHostname();
			$comp = 0;
			
			while($vmData['create_vm'] == 0 || $comp < 10) {
				sleep(30);
				$vmData = $this->vm->getByHostname();
				$comp = $comp + 1;
			}
			
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