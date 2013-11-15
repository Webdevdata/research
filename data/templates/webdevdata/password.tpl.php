<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<p>If you have forgotten your password, we can generate a new one. Enter the username and email address of your account into the form below and we will email your new password to you.</p>
	<form action="<?php echo $formaction; ?>" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" class="required" />

		<label for="email">Email</label>
		<input type="email" id="email" name="email" class="required" />

		<input type="submit" name="submitted" value="Generate password" />
	</form>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
