<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<dl id="profile">
		<dt>Username</dt>
		<dd><?php echo $user; ?></dd>

		<?php if ($userservice->isLoggedOn() && $currentUser->isAdmin()) { ?>
		<dt>Email</dt>
		<dd><?php echo filter($objectUser->getEmail()) ?></dd>
		<?php }	?>

		<dt>Member since</dt>
		<dd><?php echo date($GLOBALS['longdate'], strtotime($objectUser->getDatetime())); ?></dd>

		<dt>Bookmarks</dt>
		<dd><a href="<?php echo createURL('bookmarks', $user) ?>">Go to bookmarks</a></dd>
	</dl>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
