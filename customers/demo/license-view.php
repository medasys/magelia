<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';
  
  session_start();
  
  try {
  	$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
  }
  catch( Exception $e ) {
  	die( 'Error : '.$e->getMessage() );
  	header( 'Location: error.php' );
  }
  $qry = $bdd->prepare( 'SELECT h.id, h.date, h.type, vm.hostname FROM medacloud.history_license as h, licence as l, medacloud.vm as vm, medacloud.customer as c, medacloud.user as u WHERE h.license_id = l.id AND l.vm_id = vm.id AND l.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND l.id = :licenseId AND h.archive = :historyArchive' );
  $qry->execute(array(':userLogin' => $_SESSION['login'], ':licenseId' => $_SESSION['license_id'], ':historyArchive' => 0));
  $licenseHistories = $qry->fetchAll();
  $qry->closeCursor();
  
  $iTotalRecords = count($licenseHistories);
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  for($i = $iDisplayStart; $i < $end; $i++) {	
  	$records["data"][] = array(
      '<input type="checkbox" name="licenseHistoriesId[]" value="'.$licenseHistories[$i]['id'].'">',
      date( "d/m/Y h:i:s" , strtotime( $licenseHistories[$i]['date'] ) ),
  	  $licenseHistories[$i]['type'],
  	  $licenseHistories[$i]['hostname'],
    );
  }

  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>