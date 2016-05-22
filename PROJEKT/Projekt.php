<?php
session_start();
require_once('sisu.php');
connect_db();

$page="login";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('views/head.html');

switch($page){
	case "login":
		logi();
	break;
	break;
	case "test":
		test();
	break;
	case "tagasiside":
		tagasiside();
	break;
}

include_once('views/foot.html');

?>