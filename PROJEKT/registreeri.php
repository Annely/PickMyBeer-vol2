<form action="?page=registreeri" method="POST">

<input type="text" placeholder="kasutajanimi" name="username" value="<?php if (!empty($_POST['username'])) echo htmlspecialchars($_POST['username']);?>"/><br/>

<input type="password" placeholder="parool" name="passwd"/><br/>

<input type="password" placeholder="uuesti..." name="passwd2" /><br/>

<input type="submit" value="Registreeru"/>
</form>

<?php if(!empty($errors)):
	foreach($errors as $e):?>
		<p style="color:red"><?php echo $e; ?></p>
<?php	endforeach;
endif;?>