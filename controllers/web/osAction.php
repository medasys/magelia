<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/OsController.php';

$osController = new OsController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $osController->index();
        break;
        
	case 'selectDistributions':
        $osController->selectDistributions();
        break;
    
    case 'selectVersions':
        $osController->selectVersions();
        break;
    
    case 'selectTotalVersion':
        $osController->selectTotalVersion();
        break;
}