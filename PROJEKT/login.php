<div id="login">
	<form action="?page=login" method="POST" >
		<input type="text" name="username" placeholder="kasutajanimi"/><br/>
		<input type="password" name="passwd" placeholder="parool"/><br/>
		<input type="submit" value="logi sisse!"/>
	</form>
	<?php if (isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
		<?php endforeach;?>
	<?php endif;?>
</div>