<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Orderline {
	private $id;
	private $date;
	private $expireCommandDate;
	private $commandNum;
	private $htTotal;
	private $tva;
	private $ttcTotal;
	private $month;
	private $expireDate;
	private $productId;
	private $versionId;
	private $orderId;
	private $validate;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('date' === $property)
			$this->date = $value;
		elseif('expireCommandDate' === $property)
			$this->expireCommandDate = $value;
		elseif('commandNum' === $property)
			$this->commandNum = $value;
		elseif('htTotal' === $property)
			$this->htTotal = $value;
		elseif('tva' === $property)
			$this->tva = $value;
		elseif('ttcTotal' === $property)
			$this->ttcTotal = $value;
		elseif('month' === $property)
			$this->month = $value;
		elseif('expireDate' === $property)
			$this->expireDate = $value;
		elseif('productId' === $property)
			$this->productId = $value;
		elseif('versionId' === $property)
			$this->versionId = $value;
		elseif('orderId' === $property)
			$this->orderId = $value;
		elseif('validate' === $property)
			$this->validate = $value;
		elseif('archive' === $property)
			$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('date' === $property)
			return $this->date;
		elseif('expireCommandDate' === $property)
			return $this->expireCommandDate;
		elseif('commandNum' === $property)
			return $this->commandNum;
		elseif('htTotal' === $property)
			return $this->htTotal;
		elseif('tva' === $property)
			return $this->tva;
		elseif('ttcTotal' === $property)
			return $this->ttcTotal;
		elseif('month' === $property)
			return $this->month;
		elseif('expireDate' === $property)
			return $this->expireDate;
		elseif('productId' === $property)
			return $this->productId;
		elseif('versionId' === $property)
			return $this->versionId;
		elseif('orderId' === $property)
			return $this->orderId;
		elseif('validate' === $property)
			return $this->validate;
		elseif('archive' === $property)
			return $this->archive;
		else
			echo 'Invalid property';
	}

	public function getAll() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.orderline WHERE archive = :orderlineArchive' );
		$qry->execute(array(':orderlineArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllByOrder($orderId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.orderline WHERE order_id = :orderId AND archive = :orderlineArchive' );
		$qry->execute(array(':orderlineArchive' => 0, ':orderId' => $orderId));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getCountByOrder($orderId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT count(*) FROM medacloud.orderline WHERE order_id = :orderId AND archive = :orderlineArchive' );
		$qry->execute(array(':orderlineArchive' => 0, ':orderId' => $orderId));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getAllCurrents($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, p.type, p.cpu, p.ram, p.disk, p.traffic, v.name, v.service FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.product as p, medacloud.version as v WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.product_id = p.id AND ol.version_id = v.id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.archive = :orderlineArchive' );
		$qry->execute(array(':userLogin' => $login, ':orderlineValidate' => 0, ':orderlineArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getAllValidated($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, p.type, p.cpu, p.ram, p.disk, p.traffic, v.name, v.service FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.product as p, medacloud.version as v WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.product_id = p.id AND ol.version_id = v.id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.archive = :orderlineArchive' );
		$qry->execute(array(':userLogin' => $login, ':orderlineValidate' => 1, ':orderlineArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getId() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT id FROM medacloud.orderline WHERE archive = :orderlineArchive ORDER by id DESC LIMIT 1' );
		$qry->execute(array(':orderlineArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getByHostname($hostname) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, c.firstname, c.lastname, c.telephone, c.address, c.zip_code, c.city FROM medacloud.orderline as ol, medacloud.vm, medacloud.order as o, medacloud.customer as c WHERE vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND vm.hostname = :vmHostname AND vm.archive = :vmArchive' );
		$qry->execute(array(':vmHostname' => $hostname, ':vmArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getOrder() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT order_id FROM medacloud.orderline WHERE archive = :orderlineArchive AND id = :orderlineId' );
		$qry->execute(array(':orderlineArchive' => 0, ':orderlineId' => $this->id));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getCount($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT count(ol.id) FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.archive = :orderlineArchive' );
		$qry->execute(array(':userLogin' => $login, ':orderlineValidate' => 0, ':orderlineArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getAdminPending() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, v.name, v.service, c.firstname, c.lastname FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.version as v WHERE ol.order_id = o.id AND o.customer_id = c.id AND ol.version_id = v.id AND ol.validate = :orderlineValidate AND ol.expire_command_date > :systemDate AND ol.archive = :orderlineArchive ORDER BY ol.id DESC' );
		$qry->execute(array(':systemDate' => date('Y-m-d h:i:s'), ':orderlineValidate' => 0, ':orderlineArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getPending($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, v.name, v.service FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.expire_command_date > :systemDate AND ol.archive = :orderlineArchive ORDER BY ol.id DESC' );
		$qry->execute(array(':userLogin' => $login, ':systemDate' => date('Y-m-d h:i:s'), ':orderlineValidate' => 0, ':orderlineArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();

		return $data;
	}
	
	public function getPendingById($id, $login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT ol.*, v.name, v.service, c.* FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.expire_command_date > :systemDate AND ol.archive = :orderlineArchive AND ol.id = :orderlineId' );
		$qry->execute(array(':userLogin' => $login, ':systemDate' => date('Y-m-d h:i:s'), ':orderlineValidate' => 0, ':orderlineArchive' => 0, ':orderlineId' => $id));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getLastCommandNum() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT command_num FROM medacloud.orderline ORDER BY id DESC LIMIT 1' );
		$qry->execute();
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function save() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		
		$qry = $bdd->prepare('INSERT INTO medacloud.orderline(date, expire_command_date, command_num, month, ht_total, tva, ttc_total, product_id, version_id, order_id) VALUES(:date, :expireCommandDate, :commandNum, :month, :htTotal, :tva, :ttcTotal, :productId, :versionId, :orderId)');
		$validation = $qry->execute(array(':date' => $this->date, ':expireCommandDate' => $this->expireCommandDate, ':commandNum' => $this->commandNum, ':month' => $this->month, ':htTotal' => $this->htTotal, ':tva' => $this->tva, ':ttcTotal' => $this->ttcTotal, ':productId' => $this->productId, ':versionId' => $this->versionId, ':orderId' => $this->orderId));
		$qry->closeCursor();
		
		return $validation;
	}
	
	public function delete() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
	
		$qry = $bdd->prepare('UPDATE medacloud.orderline SET archive = :orderlineArchive WHERE id = :orderlineId');
		$validation = $qry->execute(array(':orderlineId' => $this->id, ':orderlineArchive' => 2));
		$qry->closeCursor();
	
		return $validation;
	}
}