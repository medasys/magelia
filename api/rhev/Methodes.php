<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/api/rhev/REST_RHEV.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/api/rhev/REST.php';
class Methodes{
	public function __construct() {
		
	}
 public function restart($idRhev){
 	$rest = REST::connection(MC_RM_URL, MC_RM_USER, MC_RM_PASSWORD);
 	$api= REST_RHEV::api(MC_RM_ENTRY);
	$account=0;
	$vm=$api->vms($idRhev);
	$vm->href;
	$vm->action('shutdown', "<action></action>", $result);
	do {
		sleep(30);
		$vm->action('start', "<action></action>", $result);
		$account+=1;
	}while($result->status->state=='failed'&&$account<10);
	if($result->status->state=='failed') return false; else return true; 
}
  public function disks($idRhev){
	
	$rest = REST::connection(MC_RM_URL, MC_RM_USER, MC_RM_PASSWORD);
	$api= REST_RHEV::api(MC_RM_ENTRY);
	$disks = $api->vms($idRhev)->disks();
	$itDisks = $disks->getIterator();
	$result = str_replace(array("\n", "\r", "\t"), '',  $itDisks[0]->conn->_last->request_output);
	$result = trim(str_replace('"', "'", $result));
	$result= new SimpleXMLElement($result);
	$disksList = array();
	foreach ($result as $disk ) {
		$diskValues =array("size"=>$disk->size,"used"=>$disk->actual_size);
		$disksList[]=$diskValues;
	}

	
	return $disksList;
}
 public function statistics($idRhev){

	$rest = REST::connection(MC_RM_URL, MC_RM_USER, MC_RM_PASSWORD);
	$api= REST_RHEV::api(MC_RM_ENTRY);
	$statistics = $api->vms($idRhev)->statistics();
	$itStatistics= $statistics->getIterator();
	$statisticsList = array();
	foreach ($itStatistics as $statistic ) {
		$statisticValues=array("name"=>$statistic->response->name,"value"=>$statistic->response->values->value->datum,"unit"=>$statistic->response->unit);
		$statisticsList[]=$statisticValues;
	}

	return $statisticsList;
}
}
?>