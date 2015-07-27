<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/backupController.php';

$backupController = new BackupController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $backupController->index();
        break;
        
	case 'order':
        $backupController->order();
        break;
        
    case 'configure':
        $backupController->configure();
        break;
        
    case 'validate':
        $backupController->validate();
        break;

    case 'VMCreate':
        $backupController->VMCreate();
        break;
}