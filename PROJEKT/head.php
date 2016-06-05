<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Suur õlletest</title>
	<link rel="stylesheet"
 			type="text/css"
 			href="stiil.css"/>
</head>
<body>
<div id="wrap">
	<ul id="menu">
		<?php if(empty($_SESSION['user'])): ?>
			<li><a href="?page=registreeri">Registreeri</a></li>
			<li><a href="?">Logi sisse</a></li>
		<?php else: ?>
			<li><a href="?page=test">Test</a></li>
			<li><a href="?page=tagasiside">Tagasiside</a></li>
			<li><a href="?page=logout">Logi välja</a></li>
		<?php endif;?>
	</ul>
	<div id="content">
	
	<?php if(!empty($_SESSION['message'])): ?>
		<p style="color:red"><?php echo $_SESSION['message']; ?></p>
<?php unset($_SESSION['message']);
endif;?>