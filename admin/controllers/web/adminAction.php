<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/admin/controllers/AdminController.php';

$adminController = new AdminController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $adminController->authentificateForm();
        break;
            
    case 'authentificate':
        $adminController->authentificate();
        break;
        	
    case 'registerForm':
        $adminController->registerForm();
        break;
        
    case 'registerStepOne':
        $adminController->registerStepOne();
        break;
        
    case 'registerStepTwo':
        $adminController->registerStepTwo();
        break;
    
    case 'logout':
        $adminController->logout();
        break;
    
    default:
    	$adminController->authentificateForm();
        break;
}