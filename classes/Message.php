<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Message {
	private $id;
	private $date;
	private $object;
	private $subject;
	private $comments;
	private $supportId;
	private $userId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('date' === $property)
			$this->date = $value;
		elseif('object' === $property)
			$this->object = $value;
		elseif('subject' === $property)
			$this->subject = $value;
		elseif('comments' === $property)
			$this->comments = $value;
		elseif('supportId' === $property)
			$this->supportId = $value;
		elseif('userId' === $property)
			$this->userId = $value;
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
		elseif('object' === $property)
			return $this->object;
		elseif('subject' === $property)
			return $this->subject;
		elseif('comments' === $property)
			return $this->comments;
		elseif('supportId' === $property)
			return $this->supportId;
		elseif('userId' === $property)
			return $this->userId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.message WHERE archive = :messageArchive' );
		$qry->execute(array(':messageArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
}