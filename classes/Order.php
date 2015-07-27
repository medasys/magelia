<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Order {
	private $id;
	private $date;
	private $customerId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('date' === $property)
			$this->date = $value;
		elseif('customerId' === $property)
			$this->customerId = $value;
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
		elseif('customerId' === $property)
			return $this->customerId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.order WHERE archive = :orderArchive' );
		$qry->execute(array(':orderArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getByCustomer($customerId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.order WHERE customer_id = :customerId AND archive = :orderArchive' );
		$qry->execute(array(':orderArchive' => 0, ':customerId' => $customerId));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function save($customerId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		
		$qry = $bdd->prepare('INSERT INTO medacloud.order(customer_id) VALUES(:customerId)');
		$validation = $qry->execute(array(':customerId' => $customerId));
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
	
		$qry = $bdd->prepare('UPDATE medacloud.order SET archive = :orderArchive WHERE id = :orderId');
		$validation = $qry->execute(array(':orderId' => $this->id, ':orderArchive' => 2));
		$qry->closeCursor();
	
		return $validation;
	}
}