<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class Customer {
	private $id;
	private $firstname;
	private $lastname;
	private $email;
	private $tel;
	private $fax;
	private $website;
	private $address;
	private $zipCode;
	private $city;
	private $country;
	private $newsletter;
	private $customer;
	private $customerTypeId;
	private $countryId;
	private $archive;
	
	public function __construct() {
		
	}
	
	public function __set($property, $value) {
		if('id' === $property)
			$this->id = $value;
		elseif('firstname' === $property)
			$this->firstname = $value;
		elseif('lastname' === $property)
			$this->lastname = $value;
		elseif('email' === $property)
			$this->email = $value;
		elseif('tel' === $property)
			$this->tel = $value;
		elseif('fax' === $property)
			$this->fax = $value;
		elseif('website' === $property)
		$this->website = $value;
		elseif('address' === $property)
			$this->address = $value;
		elseif('zipCode' === $property)
			$this->zipCode = $value;
		elseif('city' === $property)
			$this->city = $value;
		elseif('country' === $property)
			$this->country = $value;
		elseif('newsletter' === $property)
			$this->newsletter = $value;
		elseif('customer' === $property)
		$this->customer = $value;
		elseif('customerTypeId' === $property)
			$this->customerTypeId = $value;
		elseif('countryId' === $property)
			$this->countryId = $value;
		elseif('archive' === $property)
		$this->archive = $value;
		else
			echo 'Invalid property';
	}
	
	public function __get($property) {
		if('id' === $property)
			return $this->id;
		elseif('firstname' === $property)
			return $this->firstname;
		elseif('lastname' === $property)
			return $this->lastname;
		elseif('email' === $property)
			return $this->email;
		elseif('tel' === $property)
			return $this->tel;
		elseif('fax' === $property)
			return $this->fax;
		elseif('website' === $property)
		return $this->website;
		elseif('address' === $property)
			return $this->address;
		elseif('zipCode' === $property)
			return $this->zipCode;
		elseif('city' === $property)
			return $this->city;
		elseif('country' === $property)
			return $this->country;
		elseif('newsletter' === $property)
			return $this->newsletter;
		elseif('customer' === $property)
		return $this->customer;
		elseif('customerTypeId' === $property)
			return $this->customerTypeId;
		elseif('countryId' === $property)
			return $this->countryId;
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
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.customer WHERE archive = :customerArchive' );
		$qry->execute(array(':customerArchive' => 0));
		$data = $qry->fetchAll();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getByEmail() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT * FROM medacloud.customer WHERE email = :customerEmail AND archive = :customerArchive' );
		$qry->execute(array(':customerArchive' => 0, ':customerEmail' => $this->email));
		$data = $qry->fetch();
		$qry->closeCursor();
		
		return $data;
	}
	
	public function getIdByLogin($login) {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		$qry = $bdd->prepare( 'SELECT c.id FROM medacloud.customer as c, medacloud.user as u WHERE c.id = u.customer_id AND u.login = :userLogin AND active = :userActive' );
		$qry->execute(array(':userActive' => 1, ':userLogin' => $login));
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
		
		$qry = $bdd->prepare('INSERT INTO medacloud.customer(firstname, lastname, telephone, email, address, zip_code, city, country, customer_type_id) VALUES(:customerFirstname, :customerLastname, :customerTel, :customerEmail, :customerAddress, :customerZipCode, :customerCity, :customerCountry, :customerTypeId)');
		$validation = $qry->execute(array(':customerFirstname' => $this->firstname, ':customerLastname' => $this->lastname, ':customerTel' => $this->tel, ':customerEmail' => $this->email, ':customerAddress' => $this->address, ':customerZipCode' => $this->zipCode, ':customerCity' => $this->city, ':customerCountry' => $this->country, ':customerTypeId' => $this->customerTypeId));
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
		
		return $validation;
	}
	
	public function update() {
		try {
			$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
		}
		catch( Exception $e ) {
    		die( 'Error : '.$e->getMessage() );
    		header( 'Location: error.php' );
		}
		
		$qry = $bdd->prepare('UPDATE medacloud.customer SET telephoneephone = :customertelephone, fax = :customerFax, address = :customerAddress, zip_code = :customerZipCode, city = :customerCity, country_id = :countryId, newsletter = :customerNewsletter, customer_type_id = :customerTypeId WHERE id = :customerId');
		$validation = $qry->execute(array(':customertelephone' => $this->telephone, ':customerFax' => $this->fax, ':customerAddress' => $this->address, ':customerZipCode' => $this->zipCode, ':customerCity' => $this->city, ':countryId' => $this->countryId, ':customerNewsletter' => $this->newsletter, ':customerTypeId' => $this->customerTypeId, ':customerId' => $this->id));
		$qry->closeCursor();
		
		return $validation;
	}
		
}