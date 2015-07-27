<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/HebergementController.php';

$hebergementController = new HebergementController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $hebergementController->index();
        break;
        
	case 'order':
        $hebergementController->order();
        break;
        
    case 'configure':
        $hebergementController->configure();
        break;
        
    case 'validate':
        $hebergementController->validate();
        break;

    case 'VMCreate':
        $hebergementController->VMCreate();
        break;
}