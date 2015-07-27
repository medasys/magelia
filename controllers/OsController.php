<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Distribution.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Version.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/classes/Orderline.php';

class OsController {

	public $distribution;
	public $version;
	public $orderline;
	
	public function __construct() {
		$this->distribution = new Distribution();
		$this->version = new Version();
		$this->orderline = new Orderline();
	}
	
	public function selectDistributions() {
		if($_POST && ($_POST['osId'] != '')) {
			$data = "";
			$distributions = $this->distribution->getAllByOs($_POST['osId']);
			foreach($distributions as $distribution) {
				$data .= $distribution['id'].'&'.$distribution['name'].';';
			}
			echo $data;
		}
		else
			echo 'data_error';
	}

	public function selectVersions() {
		if($_POST && ($_POST['osId'] != '')) {
			$data = "";
			$versions = $this->version->getAllByOs($_POST['osId']);
			foreach($versions as $version) {
				$data .= $version['id'].'&'.$version['name'].';';
			}
			echo $data;
		}
		else
			echo 'data_error';
	}
	
	public function selectTotalVersion() {
		if($_POST && ($_POST['versionId'] != '')) {
			$version = $this->version->get($_POST['versionId']);
			
			echo $version['ttc_total'];
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