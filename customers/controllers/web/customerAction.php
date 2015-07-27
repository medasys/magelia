<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/CustomerController.php';

$customerController = new CustomerController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $customerController->authentificateForm();
        break;
            
    case 'authentificate':
        $customerController->authentificate();
        break;
        	
    case 'registerForm':
        $customerController->registerForm();
        break;
        
    case 'registerStepOne':
        $customerController->registerStepOne();
        break;
        
    case 'registerStepTwo':
        $customerController->registerStepTwo();
        break;
    
    case 'logout':
        $customerController->logout();
        break;
    
    default:
    	$customerController->authentificateForm();
        break;
}