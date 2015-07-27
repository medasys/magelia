<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/LicenseController.php';

$licenseController = new LicenseController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $licenseController->index();
        break;
    case 'view':
        $licenseController->view();
        break;
}