<?php

function connect_db(){
	$user = "test";
	$pass = "t3st3r123";
	$db = "test";
	$host = "localhost";
	$link = mysqli_connect($host, $user, $pass, $db) or die("ei saanud ühendatud - " . mysqli_error());}

function logi(){
	if (isset($_POST['user'])) {
		include_once('views/test.html');
	}
	
	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		  	
		  	$errors = array();
		  	if (empty($_POST['user']) || empty($_POST['pass'])) {
		  		if(empty($_POST['user'])) {
			    	$errors[] = "kasutajanimi on puudu";
				}
				if(empty($_POST['pass'])) {
					$errors[] = "parool on puudu";
				} 
		  	} else {
		  		
		  		global $connection;
		  		$user = mysqli_real_escape_string($connection, $_POST["user"]);
		  		$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
		  		
				$query = "SELECT id FROM annely_kasutajad WHERE user='$user' && pass=SHA1('$pass')";
				$result = mysqli_query($connection, $query) or die("midagi läks valesti");
			
				
				$ridu = mysqli_num_rows($result);
					if ( $ridu > 0) {
						$_SESSION['user'] = $username;
						header("Location: ?page=test");
					}
		  	}
		
		} else {
			 include_once 'views/login.html';
		}
	}}


function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}
	
function test(){
	header("Location: ?page=test");
	}
	
function tagasiside(){
	header("Location: ?page=tagasiside");
	}
	?>
