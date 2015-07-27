<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Vm {
	private $id;
	private $guid;
	private $idApi;
	private $idHyp;
	private $hostname;
	private $ipAddr;
	private $title;
	private $login;
	private $password;
	private $email;
	private $comments;
	private $orderlineId;
	private $createvm;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('guid' === $property)
			$this->guid = $value;
		elseif('idApi' === $property)
			$this->idApi = $value;
		elseif('idHyp' === $property)
			$this->idHyp = $value;
		elseif('hostname' === $property)
			$this->hostname = $value;
		elseif('ipAddr' === $property)
			$this->ipAddr = $value;
		elseif('title' === $property)
			$this->title = $value;
		elseif('login' === $property)
			$this->login = $value;
		elseif('password' === $property)
			$this->password = $value;
		elseif('email' === $property)
			$this->email = $value;
		elseif('comments' === $property)
			$this->comments = $value;
		elseif('orderlineId' === $property)
			$this->orderlineId = $value;
		elseif('createvm' === $property)
			$this->createvm = $value;
		elseif('archive' === $property)
			$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('guid' === $property)
			return $this->guid;
		elseif('idApi' === $property)
			return $this->idApi;
		elseif('idHyp' === $property)
			return $this->idHyp;
		elseif('hostname' === $property)
			return $this->hostname;
		elseif('ipAddr' === $property)
			return $this->ipAddr;
		elseif('title' === $property)
			return $this->title;
		elseif('login' === $property)
			return $this->login;
		elseif('password' === $property)
			return $this->password;
		elseif('email' === $property)
			return $this->email;
		elseif('comments' === $property)
			return $this->comments;
		elseif('orderlineId' === $property)
			return $this->orderlineId;
		elseif('createvm' === $property)
			return $this->createvm;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.vm WHERE archive = :vmArchive' );
		$qry->execute(array(':vmArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllHostnameByCustomer($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT vm.id, vm.hostname FROM medacloud.vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND v.service = :versionService AND u.login = :userLogin AND vm.create_vm = :vmCreate AND vm.archive = :vmArchive' );
		$qry->execute(array(':versionService' => 0, ':userLogin' => $login, ':vmCreate' => 1, ':vmArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getAllServicesByCustomer($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT vm.id, vm.hostname FROM medacloud.vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND v.service = :versionService AND u.login = :userLogin AND vm.create_vm = :vmCreate AND vm.archive = :vmArchive' );
		$qry->execute(array(':versionService' => 1, ':userLogin' => $login, ':vmCreate' => 1, ':vmArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function get() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.vm WHERE id = :vmId AND archive = :vmArchive' );
		$qry->execute(array(':vmId' => $this->id, ':vmArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getByIdByCustomer($id, $login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT vm.guid, vm.id_api, vm.id_hyp, vm.id, vm.hostname, vm.ip_addr, vm.creation_date, vm.renewal_date FROM medacloud.vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u WHERE vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND vm.create_vm = :vmCreate AND vm.id = :vmId AND vm.archive = :vmArchive' );
		$qry->execute(array(':userLogin' => $login, ':vmCreate' => 1, ':vmId' => $id, ':vmArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getServiceByIdByCustomer($id, $login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT vm.guid, vm.id_api, vm.id_hyp, vm.id, vm.hostname, vm.ip_addr, vm.creation_date, vm.renewal_date, d.logo FROM medacloud.vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v, medacloud.distribution as d WHERE vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND v.distribution_id = d.id AND u.login = :userLogin AND vm.create_vm = :vmCreate AND vm.id = :vmId AND vm.archive = :vmArchive' );
		$qry->execute(array(':userLogin' => $login, ':vmCreate' => 1, ':vmId' => $id, ':vmArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function getByHostname() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.vm WHERE hostname = :vmHostname AND archive = :vmArchive' );
		$qry->execute(array(':vmHostname' => $this->hostname, ':vmArchive' => 0));
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
		
		$qry = $bdd->prepare('INSERT INTO medacloud.vm(hostname, orderline_id) VALUES(:hostname, :orderlineId)');
		$validation = $qry->execute(array(':hostname' => $this->hostname, ':orderlineId' => $this->orderlineId));
		$qry->closeCursor();
		
		return $validation;
	}
	
	public function saveService() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
	
		$qry = $bdd->prepare('INSERT INTO medacloud.vm(hostname, title, login, password, email, orderline_id) VALUES(:hostname, :title, :login, :password, :email, :orderlineId)');
		$validation = $qry->execute(array(':hostname' => $this->hostname, ':title' => $this->title, ':login' => $this->login, ':password' => $this->password, ':email' => $this->email, ':orderlineId' => $this->orderlineId));
		$qry->closeCursor();
	
		return $validation;
	}
	
	public function deleteByOrderline($orderlineId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
	
		$qry = $bdd->prepare('UPDATE medacloud.vm SET hostname = :vmHostname, archive = :vmArchive WHERE orderline_id = :orderlineId');
		$validation = $qry->execute(array(':orderlineId' => $orderlineId, ':vmHostname' => NULL, ':vmArchive' => 2));
		$qry->closeCursor();
	
		return $validation;
	}
}