<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/VdsController.php';

$vdsController = new VdsController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $vdsController->index();
        break;
        
	case 'order':
        $vdsController->order();
        break;
        
    case 'configure':
        $vdsController->configure();
        break;
        
    case 'validate':
        $vdsController->validate();
        break;

    case 'VMCreate':
        $vdsController->VMCreate();
        break;
}