<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<p>Sign up here to create an account. All the information requested below is required.</p>
	<form action="<?php echo $formaction; ?>" method="post">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" class="required" />

		<div class="tip">
			<p>Username must be at least 5 characters, alphanumeric.</p>
		</div>

		<label for="password">Password</label>
		<input type="password" id="password" name="password" class="required" />

		<label for="email">Email</label>
		<input type="email" id="email" name="email" class="required" value="<?php echo htmlspecialchars(POST_MAIL); ?>" />

		<?php if (strlen($antispamQuestion) > 0) { ?>
		<label for="antispamAnswer"><?php echo $antispamQuestion; ?></label>
		<input type="text" id="antispamAnswer" name="antispamAnswer" class="required" />
		<?php } ?>

		<input type="submit" name="submitted" value="Register" />
	</form>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
