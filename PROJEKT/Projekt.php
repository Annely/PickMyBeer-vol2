<?php
require_once('sisu.php');
session_start();
connect_db();

$page="login";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=($_GET['page']);
}

include_once('head.php');

switch($page){
	case "registreeri":
		registreeri();
	break;
	case "login":
		logi();
	break;
	case "test":
		test();
	break;
	case "tagasiside":
		tagasiside();
	break;
	case "tulemused":
		arvuta_tulemused();
	break;
	case "logout":
		$_SESSION = array();
		session_destroy();
		header("Location: ?");	
	break;
	case "tulemused":
		arvuta_tulemused();
	

}

include_once('foot.html');

?>