<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<h3>Account details for <i><?php echo $user; ?></i></h3>

	<form action="<?php echo $formaction; ?>" method="post">
		<input type="hidden" name="token" value="<?php echo $token; ?>"/>

		<label for="pPass">New password</label>
		<input type="password" id="pPass" name="pPass" />

		<label for="pPassConf">Confirm Password</label>
		<input type="password" id="pPassConf" name="pPassConf" />

		<label for="pMail">Email</label>
		<input type="email" id="pMail" name="pMail" value="<?php echo filter($objectUser->getEmail(), 'xml'); ?>" />

		<input type="submit" name="submitted" value="Save" />
	</form>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
