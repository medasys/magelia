<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/customers/controllers/OrderController.php';

$orderController = new OrderController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $orderController->index();
        break;
    case 'view':
        $orderController->view();
        break;
    case 'billing':
        $orderController->invoices();
        break;
}