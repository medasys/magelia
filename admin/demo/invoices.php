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
  $qry = $bdd->prepare( 'SELECT ol.*, v.name, v.service, vm.hostname FROM medacloud.orderline as ol, medacloud.order as o, medacloud.customer as c, medacloud.user as u, medacloud.version as v, medacloud.vm WHERE ol.order_id = o.id AND o.customer_id = c.id AND c.id = u.customer_id AND ol.version_id = v.id AND vm.orderline_id = ol.id AND u.login = :userLogin AND ol.validate = :orderlineValidate AND ol.archive = :orderlineArchive ORDER BY ol.id DESC' );
  $qry->execute(array(':userLogin' => $_SESSION['login'], ':orderlineValidate' => 1, ':orderlineArchive' => 0));
  $invoices = $qry->fetchAll();
  $qry->closeCursor();
  
  $iTotalRecords = count($invoices);
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  for($i = $iDisplayStart; $i < $end; $i++) {
  	if($invoices[$i]['service'] == 0) {
  		$qry = $bdd->prepare( 'SELECT p.type FROM medacloud.product as p WHERE p.id = :productId' );
  		$qry->execute(array(':productId' => $invoices[$i]['product_id']));
  		$product = $qry->fetch();
  		$qry->closeCursor();
  	
  		$productName = 'Serveur virtuel priv&eacute; de type '.$product['type'].' - '.$invoices[$i]['month'].' mois';
  	}
  	else {
  		$productName = 'Service '.$invoices[$i]['name'].' - '.$invoices[$i]['month'].' mois';
  	}
  	$records["data"][] = array(
      '<input type="checkbox" name="invoiceId[]" value="'.$invoices[$i]['id'].'">',
  	  $invoices[$i]['invoice_num'],
  	  date( "d/m/Y h:i:s" , strtotime( $invoices[$i]['creation_date'] ) ),
  	  $productName,
  	  $invoices[$i]['hostname'],
  	  $invoices[$i]['ttc_total'],
      '<a href="invoices.php?action=view&id='.$invoices[$i]['id'].'" class="btn btn-sm yellow"><i class="fa fa-search"></i> D&eacute;tails</a>',
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