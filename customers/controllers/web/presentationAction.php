<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/controllers/presentationController.php';

$presentationController = new PresentationController();

if(!isset($action)) $action = 'index';

if(isset($_POST['action'])) $action = $_POST['action'];
if(isset($_GET['action'])) $action = $_GET['action'];
	
switch ($action) {
	case 'index':
        $presentationController->index();
        break;
}