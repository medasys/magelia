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
  $qry = $bdd->prepare( 'SELECT l.id, l.num, l.activation_date, l.expire_date, vm.hostname, v.name as versionName FROM medacloud.licence as l, medacloud.vm as vm, medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v WHERE l.vm_id = vm.id AND vm.orderline_id = ol.id AND ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND u.login = :userLogin AND l.version_id = v.id AND ol.validate = :orderlineValidate AND l.archive = :licenseArchive' );
  $qry->execute(array(':userLogin' => $_SESSION['login'], ':orderlineValidate' => 1, ':licenseArchive' => 0));
  $licenses = $qry->fetchAll();
  $qry->closeCursor();
  
  $iTotalRecords = count($licenses);
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  for($i = $iDisplayStart; $i < $end; $i++) {
  	if($licenses[$i]['expire_date'] > date('Y-m-d')) {
  		$statusKey = 'success';
  		$statusCurrent = 'En cours';
  	}
  	else {
  		$statusKey = 'danger';
  		$statusCurrent = 'Expir&eacute;e';
  	}
  	$records["data"][] = array(
      '<input type="checkbox" name="licenseId[]" value="'.$licenses[$i]['id'].'">',
      date( "d/m/Y h:i:s" , strtotime( $licenses[$i]['activation_date'] ) ),
  	  date( "d/m/Y h:i:s" , strtotime( $licenses[$i]['expire_date'] ) ),
  	  $licenses[$i]['num'],
  	  $licenses[$i]['hostname'],
      $licenses[$i]['versionName'],
      '<span class="label label-sm label-'.$statusKey.'">'.$statusCurrent.'</span>',
      '<a href="licenses.php?action=view&id='.$licenses[$i]['id'].'" class="btn btn-sm yellow"><i class="fa fa-search"></i> D&eacute;tails</a>',
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