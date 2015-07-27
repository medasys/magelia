<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

class ChannelAdvisorAuth
{
	public $DeveloperKey;
	public $Password;

	public function __construct($key, $pass) {
		$this->DeveloperKey = $key;
		$this->Password = $pass;
	}
}

function _Header() {
	// Create the SoapClient instance
	//$client = new SoapClient($url , array('login' => "admin", 'password' => "smartvm"));
	
	// Create the header
	$auth = new ChannelAdvisorAuth(MC_CF_USER, MC_CF_PASSWORD);
	$header = new SoapHeader(MC_CF_URL, "test", $auth, false);
	
	return $header;
}

function _CreerVM($nom, $prenom, $nomUti, $email, $nomVM, $nameTemplate, $nbSocket, $ram, $disk) {
	// Create the SoapClient instance
	$client = new SoapClient(MC_CF_URL , array('login' => MC_CF_USER, 'password' => MC_CF_PASSWORD));
	
	$templateFields = "name=".$nameTemplate;
	$templateFields .= "|request_type=template";
	//echo $templateFields."\n";
	$requester = "user_name=";
	$requester .= "admin";
	$requester .= "|owner_last_name=";
	$requester .=$nom;
	$requester .= "|owner_first_name=";
	$requester .=$prenom;
	$requester .= "|owner_email=";
	$requester .=$email;
	
    //echo $requester."\n";
	$vmFields = "vm_name=";
	$vmFields .=$nomVM;
	$vmFields .= "|vm_prefix=vps";
	$vmFields .= "|cores_per_socket=";
	$vmFields .=$nbSocket;
	$vmFields .= "|vm_memory=";
	$vmFields .=$ram;
	$vmFields .= "|disk=";
	$vmFields .=$disk;
	$vmFields .= "|vlan=rhevm";
	$vmFields .= "|vm_auto_start=true";
	$vmFields .= "|provision_type=clone";
	$vmFields .= "|linked_clone=true";
    //echo $vmFields."\n";
	$tags = "location=rabat";
	$tags .= "|typeSaas=none";
	$tags .= "|prov_max_cpu=5";
    //echo $tags;
	$options = "";

	$body = array("version"=>"1.1", $templateFields, $vmFields, $requester, $tags,
			"additionalValues" => NULL,
			"emsCustomAttributes"  => NULL,
			"miqCustomAttributes"=> "CreatedBy=web-service|WSVersion =1.1");
	$result = $client->__soapCall("EVMProvisionRequestEx", $body, NULL, _Header());
	
}

function _CreerService($userFirstname, $userLastname, $userPassword, $userEmail, $serviceTitle, $serviceCurrency, $versionName, $nomVM, $nameTemplate) {
	// Create the SoapClient instance
	$client = new SoapClient(MC_CF_URL , array('login' => MC_CF_USER, 'password' => MC_CF_PASSWORD));

	$templateFields = "name=".$nameTemplate;
	$templateFields .= "|request_type=template";
	//echo $templateFields."\n";
	$requester = "user_name=";
	$requester .= "admin";
	$requester .= "|owner_last_name=";
	$requester .=$userLastname;
	$requester .= "|owner_first_name=";
	$requester .=$userFirstname;
	$requester .= "|owner_address=";
	$requester .=$userPassword;
	$requester .= "|owner_email=";
	$requester .=$userEmail;
	$requester .= "|owner_title=";
	$requester .=$serviceTitle;
	$requester .= "|owner_country=";
	$requester .=$serviceCurrency;

	//echo $requester."\n";
	$vmFields = "vm_name=";
	$vmFields .=$nomVM;
	$vmFields .= "|vm_prefix=service";
	$vmFields .= "|vlan=rhevm";
	$vmFields .= "|vm_auto_start=true";
	$vmFields .= "|provision_type=clone";
	$vmFields .= "|linked_clone=true";
	//echo $vmFields."\n";
	$tags = "location=rabat";
	$tags .= "|typeSaas=".$versionName;
	$tags .= "|prov_max_cpu=5";
	//echo $tags;
	$options = "";

	$body = array("version"=>"1.1", $templateFields, $vmFields, $requester, $tags,
			"additionalValues" => NULL,
			"emsCustomAttributes"  => NULL,
			"miqCustomAttributes"=> "CreatedBy=web-service|WSVersion =1.1");
	$result = $client->__soapCall("EVMProvisionRequestEx", $body, NULL, _Header());

}
?>