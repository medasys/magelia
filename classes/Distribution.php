<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Distribution {
	private $id;
	private $name;
	private $image;
	private $smallDescription;
	private $description;
	private $service;
	private $osId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('name' === $property)
			$this->name = $value;
		elseif('image' === $property)
			$this->image = $value;
		elseif('smallDescription' === $property)
			$this->smallDescription = $value;
		elseif('description' === $property)
			$this->description = $value;
		elseif('service' === $property)
			$this->service = $value;
		elseif('osId' === $property)
			$this->osId = $value;
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
		elseif('image' === $property)
			return $this->image;
		elseif('smallDescription' === $property)
			return $this->smallDescription;
		elseif('description' === $property)
			return $this->description;
		elseif('service' === $property)
			return $this->service;
		elseif('osId' === $property)
			return $this->osId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.distribution WHERE archive = :distArchive' );
		$qry->execute(array(':distArchive' => 0));
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.distribution WHERE os_id = :osId AND service = :distService AND archive = :distArchive' );
		$qry->execute(array(':osId' => $osId, ':distService' => 0, ':distArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getAllServices() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.distribution WHERE service = :distService AND archive = :distArchive' );
		$qry->execute(array(':distService' => 1, ':distArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getVersionByDistribution($id) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT v.*, d.image1, d.image2 FROM medacloud.version as v, medacloud.distribution as d WHERE v.distribution_id = d.id AND v.distribution_id = :distId AND v.archive = :distArchive' );
		$qry->execute(array(':distId' => $id, ':distArchive' => 0));
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.distribution WHERE id = :distId AND archive = :distArchive' );
		$qry->execute(array(':distId' => $this->id, ':distArchive' => 0));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
}