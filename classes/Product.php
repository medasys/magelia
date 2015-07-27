<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Product {
	
	private $id;
	private $type;
	private $cpu;
	private $ram;
	private $disk;
	private $htTotal;
	private $tva;
	private $ttcTotal;
	private $status;
	private $categoryId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('type' === $property)
			$this->type = $value;
		elseif('ram' === $property)
			$this->ram = $value;
		elseif('cpu' === $property)
			$this->cpu = $value;
		elseif('disk' === $property)
			$this->disk = $value;
		elseif('htTotal' === $property)
			$this->htTotal = $value;
		elseif('ttcTotal' === $property)
			$this->ttcTotal = $value;
		elseif('status' === $property)
			$this->status = $value;
		elseif('categoryId' === $property)
			$this->categoryId = $value;
		elseif('archive' === $property)
			$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('type' === $property)
			return $this->type;
		elseif('cpu' === $property)
			return $this->cpu;
		elseif('ram' === $property)
			return $this->ram;
		elseif('disk' === $property)
			return $this->disk;
		elseif('htTotal' === $property)
			return $this->htTotal;
		elseif('tva' === $property)
			return $this->tva;
		elseif('ttcTotal' === $property)
			return $this->ttcTotal;
		elseif('status' === $property)
			return $this->status;
		elseif('catgoryId' === $property)
			return $this->categoryId;
		elseif('archive' === $property)
			return $this->archive;
		else
			echo 'Invalid property';
	}
	
	public function getAllStatic() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		
		$qry = $bdd->prepare( "SELECT * FROM medacloud.product WHERE status= :productStatic AND archive = :productArchive" );
		$qry->execute(array(":productStatic" => 'static', ":productArchive" => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getStatic() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		
		$qry = $bdd->prepare( "SELECT * FROM medacloud.product WHERE status = :productStatic AND id = :productId AND archive = :productArchive" );
		$qry->execute(array(":productStatic" => 'static', ":productArchive" => 0, ":productId" => $this->id));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
		
}