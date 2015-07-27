<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/VpsController.php';

$vpsController = new VpsController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $vpsController->index();
        break;
    
    case 'view':
        $vpsController->view();
        break;
        
    case 'restart':
        $vpsController->restart();
        break;
        
    case 'passwordReset':
        $vpsController->passwordReset();
        break;
        	
	case 'order':
        $vpsController->order();
        break;
        
    case 'configure':
        $vpsController->configure();
        break;
        
    case 'validate':
        $vpsController->validate();
        break;

    case 'VMCreate':
        $vpsController->VMCreate();
        break;
}