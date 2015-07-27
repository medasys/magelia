<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/CartController.php';

$cartController = new CartController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $cartController->index();
        break;
    
    case 'deleteOrderline':
        $cartController->deleteOrderline();
        break;
}