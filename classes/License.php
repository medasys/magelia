<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class License {
	private $id;
	private $num;
	private $month;
	private $activationDate;
	private $expireDate;
	private $commennts;
	private $versionId;
	private $vmId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('num' === $property)
			$this->num = $value;
		elseif('month' === $property)
			$this->month = $value;
		elseif('activationDate' === $property)
			$this->activationDate = $value;
		elseif('expireDate' === $property)
			$this->expireDate = $value;
		elseif('comments' === $property)
			$this->comments = $value;
		elseif('versionId' === $property)
			$this->versionId = $value;
		elseif('vmId' === $property)
			$this->vmId = $value;
		elseif('archive' === $property)
			$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('num' === $property)
			return $this->num;
		elseif('month' === $property)
			return $this->month;
		elseif('activationDate' === $property)
			return $this->activationDate;
		elseif('expireDate' === $property)
			return $this->expireDate;
		elseif('comments' === $property)
			return $this->comments;
		elseif('versionId' === $property)
			return $this->versionId;
		elseif('vmId' === $property)
			return $this->vmId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.licence WHERE archive = :licenseArchive' );
		$qry->execute(array(':licenseArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllByCustomer($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT l.id, l.num, l.activation_date, l.expire_date, vm.hostname, v.name as versionName FROM medacloud.licence as l, medacloud.vm as vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE l.vm_id = vm.id AND vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND l.version_id = v.id AND ol.validate = :orderlineValidate AND l.archive = :licenseArchive' );
		$qry->execute(array(':userLogin' => $login, ':orderlineValidate' => 1, ':licenseArchive' => 0));
		$data = $qry->fetchAll();
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
		$qry = $bdd->prepare( 'SELECT l.id, l.num, l.activation_date, l.expire_date, vm.hostname, vm.ip_addr, v.name as versionName, ol.month FROM medacloud.licence as l, medacloud.vm as vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE l.vm_id = vm.id AND vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND l.version_id = v.id AND ol.validate = :orderlineValidate AND l.id = :licenseId AND l.archive = :licenseArchive' );
		$qry->execute(array(':userLogin' => $login, ':orderlineValidate' => 1, ':licenseId' => $id, ':licenseArchive' => 0));
		$data = $qry->fetch();
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.os WHERE id = :osId AND archive = :osArchive' );
		$qry->execute(array(':osId' => $this->id, ':osArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
}