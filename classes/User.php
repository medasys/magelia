<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class User {
	private $id;
	private $login;
	private $password;
	private $active;
	private $lastUpdateCnx;
	private $customerId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('login' === $property)
			$this->login = $value;
		elseif('password' === $property)
			$this->password = $value;
		elseif('active' === $property)
			$this->active = $value;
		elseif('lastUpdateCnx' === $property)
			$this->lastUpdateCnx = $value;
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
		elseif('login' === $property)
			return $this->login;
		elseif('password' === $property)
			return $this->password;
		elseif('active' === $property)
			return $this->active;
		elseif('lastUpdateCnx' === $property)
			return $this->lastUpdateCnx;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.user WHERE archive = :userArchive' );
		$qry->execute(array(':userArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function authentificate() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT u.*, c.firstname, c.lastname FROM medacloud.user as u, medacloud.customer as c WHERE u.customer_id = c.id AND u.login = :userLogin AND u.password = :userPassword AND u.active = :userActive' );
		$qry->execute(array(':userLogin' => $this->login, ':userPassword' => md5($this->password), ':userActive' => 1));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		/*try {
			$conn = ldap_connect(IPA_URL);
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$data = NULL;
		ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
		$bindServerLDAP = ldap_bind($conn, 'uid='.$this->login.',cn=users,cn=accounts,dc=meda,dc=cloud', $this->password);
		if($bindServerLDAP) {
			$sr = ldap_search($conn, "cn=users,cn=accounts,dc=meda,dc=cloud", "uid=".$this->login);
			$info = ldap_get_entries($conn, $sr);
			$data = array (
						"name" => $info[0]["displayname"][0],
						"login" => $info[0]["uid"][0]
					);
			ldap_close($conn);
		}*/
		
		return $data;
	}
	
	public function customerAuthentificate() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT u.*, c.firstname, c.lastname FROM medacloud.user as u, medacloud.customer as c WHERE u.customer_id = c.id AND c.customer = :customerProspect AND u.login = :userLogin AND u.password = :userPassword AND u.active = :userActive' );
		$qry->execute(array(':userLogin' => $this->login, ':userPassword' => md5($this->password), ':customerProspect' => 1, ':userActive' => 1));
		$data = $qry->fetch();
		$qry->closeCursor();

		/*try {
			$conn = ldap_connect(IPA_URL);
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$data = NULL;
		ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
		$bindServerLDAP = ldap_bind($conn, 'uid='.$this->login.',cn=users,cn=accounts,dc=meda,dc=cloud', $this->password);
		if($bindServerLDAP) {
			$sr = ldap_search($conn, "cn=users,cn=accounts,dc=meda,dc=cloud", "uid=".$this->login);
			$info = ldap_get_entries($conn, $sr);
			if(substr($info[0]["memberof"][1], 3, 7) == "clients") {
				$data = array (
							"name" => $info[0]["displayname"][0],
							"login" => $info[0]["uid"][0]
						);
			}
			ldap_close($conn);
		}*/
	
		return $data;
	}
	
	public function adminAuthentificate() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT u.* FROM medacloud.user as u WHERE u.admin = :userAdmin AND u.login = :userLogin AND u.password = :userPassword AND u.active = :userActive' );
		$qry->execute(array(':userAdmin' => 1, ':userLogin' => $this->login, ':userPassword' => md5($this->password), ':userActive' => 1));
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
		
		$qry = $bdd->prepare('INSERT INTO medacloud.user(login, password, customer_id) VALUES(:userLogin, :userPassword, :customerId)');
		$validation = $qry->execute(array(':userLogin' => $this->login, ':userPassword' => md5($this->password), ':customerId' => $this->customerId));
		$qry->closeCursor();
		
		return $validation;
	}
	
	public function update($customerId) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
			die( 'Error : '.$e->getMessage() );
			header( 'Location: error.php' );
		}
	
		$qry = $bdd->prepare('UPDATE medacloud.user SET active = :userActive WHERE customer_id = :customerId AND archive = :userArchive');
		$validation = $qry->execute(array(':userActive' => 1, ':userArchive' => 0, ':customerId' => $customerId));
		$qry->closeCursor();
	
		return $validation;
	}
}