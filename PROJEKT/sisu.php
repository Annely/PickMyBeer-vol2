<?php

function connect_db(){
  global $link;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $link = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ?hendust");
  mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($link));
}


function logi(){
	global $link;
	if(!empty($_POST)){
		$errors=array();
		if (empty($_POST['username'])){
			$errors[]="kasutajanimi vajalik!";
		}
		if (empty($_POST['passwd'])){
			$errors[]="parool vajalik!";
		}
		
		if (empty($errors)){
			// turva
			$user=mysqli_real_escape_string($link,$_POST['username']);
			$pass=mysqli_real_escape_string($link,$_POST['passwd']);
			
			$sql="SELECT user FROM annely_kasutajad WHERE user = '$user' AND pass = SHA1('$pass')";
			$result = mysqli_query($link, $sql);
			if ($result && $user = mysqli_fetch_assoc($result)){ 
				// k?µik ok, muutjas $user on massiiv
				$_SESSION['user']=$user; // $_SESSION['user'
				$_SESSION['message']="Login õnnestus";
				header("Location: ?page=test");
				exit(0);
			} else {
				$errors[]="Midagi läks valesti, kas oled ikka registreeritud?";
			}
		}
	}

	include_once("login.php");}
	
function test(){
	include_once('test.html');
		}
	
function tagasiside(){
	include_once('tagasiside.html');
	}

function tulemused(){
	/*global $link;
		$olled = array();
		$sql = "SELECT * FROM annely_olled ORDER BY RAND() LIMIT 1";
		$result = mysqli_query($link, $sql);
		while ($r=mysqli_fetch_assoc($result)){
		$olled[]=$r;
	};
	return $olled;*/

	include_once('tulemused.html');
	}
	
function registreeri(){
	global $link;
	if(!empty($_POST)){
		$errors=array();
		if (empty($_POST['username'])){
			$errors[]="Sisesta kasutajanimi";
		}
		if (empty($_POST['passwd'])){
			$errors[]="Sisesta parool";
		}
		if (empty($_POST['passwd2'])){
			$errors[]="Sisesta parool 2 korda";
		}
		if(!empty($_POST['passwd']) && !empty($_POST['passwd2']) && $_POST['passwd']!=$_POST['passwd2']) {
			// m?lemad on olemas, aga ei v?rdu
			$errors[]="paroolid peavad olema samad!";
		}
		if(empty($errors)){
			$user=mysqli_real_escape_string($link,$_POST['username']);
			$pass=mysqli_real_escape_string($link,$_POST['passwd']);
			
			$sql="INSERT INTO annely_kasutajad (user, pass) VALUES ('$user', SHA1('$pass'))";
			$result= mysqli_query($link, $sql);
			if ($result){
				$_SESSION['message']="Registreerumine õnnestus! Palun logi sisse!";
				header("Location: ?");
				exit(0);
			}else {
				$errors[]="Uuups.. midagi läks valesti! Proovi varsti uuesti";
			
			
		}
	
	}}include_once('registreeri.php');}
	

?>