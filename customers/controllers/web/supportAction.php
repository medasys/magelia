<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/SupportController.php';

$supportController = new SupportController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $supportController->index();
        break;
    case 'commercial':
        $supportController->commercial();
        break;
    case 'technical':
        $supportController->technical();
        break;
}