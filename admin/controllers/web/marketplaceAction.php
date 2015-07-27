<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/MarketplaceController.php';

$marketplaceController = new MarketplaceController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $marketplaceController->index();
        break;
        
    case 'view':
        $marketplaceController->view();
        break;
        	
	case 'chooseService':
        $marketplaceController->chooseService();
        break;
        
    case 'order':
        $marketplaceController->order();
        break;
        
    case 'configure':
        $marketplaceController->configure();
        break;
        
    case 'validate':
        $marketplaceController->validate();
        break;

    case 'VMCreate':
        $marketplaceController->VMCreate();
        break;
        
    case 'search':
        $marketplaceController->search();
        break;
}