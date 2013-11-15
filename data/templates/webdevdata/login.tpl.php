<?php
	$this->includeTemplate($GLOBALS['top_include']);

	if (!$userservice->isSessionStable()) {
		echo '<p class="error">'.T_('Please activate cookies').'</p>';
	}
?>

<main role="main" id="main">
	<form action="<?php echo $formaction; ?>" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" />

		<label for="password">Password</label>
		<input type="password" id="password" name="password" />

		<input type="checkbox" name="keeppass" id="keeppass" value="yes" />
		<label for="keeppass">Don’t ask for my password for 2 weeks</label>

		<input type="submit" name="submitted" value="Log in" />

		<p><a href="<?php echo ROOT ?>password.php">Forgotten your password?</a></p>
	</form>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
