<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/StorageController.php';

$storageController = new StorageController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $storageController->index();
        break;
        
	case 'order':
        $storageController->order();
        break;
        
    case 'configure':
        $storageController->configure();
        break;
        
    case 'validate':
        $storageController->validate();
        break;

    case 'VMCreate':
        $storageController->VMCreate();
        break;
}