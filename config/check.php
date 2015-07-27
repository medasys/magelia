<?php

require_once 'config/defines.inc.php';

try {
	$bdd = new PDO(FXM_DB_CLIENT.':host='.FXM_DB_SERVER.';dbname='.FXM_DB, FXM_DB_USER, FXM_DB_PASSWORD );
}
catch( Exception $e ) {
    die( 'Error : '.$e->getMessage() );
}