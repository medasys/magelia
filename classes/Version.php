<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Version {
	private $id;
	private $name;
	private $templateName;
	private $service;
	private $licence;
	private $htTotal;
	private $tva;
	private $ttcTotal;
	private $distributionId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('name' === $property)
			$this->name = $value;
		elseif('templateName' === $property)
			$this->templateName = $value;
		elseif('service' === $property)
			$this->service = $value;
		elseif('licence' === $property)
			$this->licence = $value;
		elseif('htTotal' === $property)
			$this->htTotal = $value;
		elseif('tva' === $property)
			$this->tva = $value;
		elseif('ttcTotal' === $property)
			$this->ttcTotal = $value;
		elseif('distributionId' === $property)
			$this->distributionId = $value;
		elseif('archive' === $property)
			$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('name' === $property)
			return $this->name;
		elseif('templateName' === $property)
			return $this->templateName;
		elseif('service' === $property)
			return $this->service;
		elseif('licence' === $property)
			return $this->licence;
		elseif('htTotal' === $property)
			return $this->htTotal;
		elseif('tva' === $property)
			return $this->tva;
		elseif('ttcTotal' === $property)
		return $this->ttcTotal;
		elseif('distributionId' === $property)
			return $this->distributionId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.version WHERE archive = :versionArchive' );
		$qry->execute(array(':versionArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllByDistribution($distributionId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.version WHERE distribution_id = :distributionId AND archive = :versionArchive' );
		$qry->execute(array(':distributionId' => $distributionId, ':versionArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllByOs($osId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT v.* FROM medacloud.version as v, distribution as d WHERE v.service = :versionService AND v.distribution_id = d.id AND d.os_id = :osId AND v.archive = :versionArchive' );
		$qry->execute(array(':osId' => $osId, ':versionService' => 0, ':versionArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
	
		return $data;
	}
	
	public function get($id) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.version WHERE id = :versionId AND archive = :versionArchive' );
		$qry->execute(array(':versionId' => $id, ':versionArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getDistributionId() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT distribution_id FROM medacloud.version WHERE id = :versionId AND archive = :versionArchive' );
		$qry->execute(array(':versionId' => $this->id, ':versionArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
}