<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/HomeController.php';

$homeController = new HomeController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
	
switch ($action) {
	case 'index':
        $homeController->index();
        break;
}