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
			$errors[]="Sisesta kasutajanimi";
		}
		if (empty($_POST['passwd'])){
			$errors[]="Sisesta ka parool";
		}
		
		if (empty($errors)){
			// turva
			$user= mysqli_real_escape_string($link,$_POST['username']);
			$pass= mysqli_real_escape_string($link,$_POST['passwd']);
			
			$sql="SELECT id, user FROM annely_kasutajad WHERE user = '$user' AND pass = SHA1('$pass')";
			$result = mysqli_query($link, $sql);
			if ($result && $user = mysqli_fetch_assoc($result)){ 
				// kõik ok, muutjas $user on massiiv
				$_SESSION['user']=$user; // $_SESSION['user']['id']
				$_SESSION['message']="Login õnnestus";
				header("Location: test");
				exit(0);
			} else {
				$errors[]="Midagi läks valesti! Kas oled ikka registreeritud?";
			}
		}
	}
	include("test.html");}
	
function test(){
	include_once('test.html');
		}
	
function tagasiside(){
	include_once('tagasiside.html');
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
			$pass=mysqli_real_escape_string($link,$_POST['passw']);
			
			$sql="INSERT INTO annely_kasutajad (user, pass) VALUES ('$user', SHA1('$pass'))";
			$result= mysqli_query($link, $sql);
			if ($result){
				$_SESSION['message']="Registreerumine õnnestus";
				header("Location: ?");
				exit(0);
			}else {
				$errors[]="Uuups.. midagi läks valesti! Proovi varsti uuesti";
			
			
		}
	
	}}include_once('registreeri.php');}
	
function arvuta_tulemused() {
	if(! empty($_POST)){
    $answers = array();
    for($i=1;!empty($_POST["v$i"]);++$i)
    {
        $answers[$_POST["v$i"]][] = $i;
        }
    }
    print_r($answers);}
?>