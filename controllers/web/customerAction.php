<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/CustomerController.php';

$customerController = new CustomerController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'authentificateForm':
        $customerController->authentificateForm();
        break;
            
    case 'authentificate':
        $customerController->authentificate();
        break;

    case 'register':
        $customerController->register();
        break;
        
    case 'activate':
        $customerController->activate();
        break;
        	
    case 'logout':
        $customerController->logout();
        break;
    
    default:
    	$customerController->authentificateForm();
        break;
}