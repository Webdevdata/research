<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<h3>User management</h3>
	<ol class="users">
		<?php foreach($users as $user) { ?>
			<li>
				<a href="<?php echo createURL('/profile', $user->getUsername()); ?>"><?php echo $user->getUsername(); ?></a>
				<?php if ($user->getUsername() != $currentUser->getUsername()) { ?>
				| <a href="<?php echo createURL('/admin', 'delete/'.$user->getUsername()); ?>" onclick="javascript:return confirm('Are you sure?');">Delete</a>
				<?php } ?>
			</li>
		<?php } ?>
	</ol>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
