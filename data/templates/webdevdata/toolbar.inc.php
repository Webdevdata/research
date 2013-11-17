<?php
	/* Current user */
	$currentUser = $currentUsername = null;
	if ($userservice->isLoggedOn()) {
		$currentUser = $userservice->getCurrentObjectUser();
		$currentUsername = $currentUser->getUsername();
	}
?>

<nav role="navigation">
	<ul id="navigation">

	<?php
		if ($userservice->isLoggedOn() && is_object($currentUser)) {
			$cUserId = $userservice->getCurrentUserId();
			$cUsername = $currentUser->getUsername();
	?>

		<li><a href="<?php echo createURL(''); ?>"><?php echo T_('Home'); ?></a></li>
		<li><a href="<?php echo createURL('about'); ?>"><?php echo T_('About'); ?></a></li>
		<li><a href="<?php echo createURL('bookmarks', $cUsername . '?action=add'); ?>"><?php echo T_('Add a Bookmark'); ?></a></li>
		<li><a href="<?php echo createURL('bookmarks', $cUsername); ?>"><?php echo T_('My bookmarks'); ?></a></li>
		<li><a href="<?php echo createURL('alltags', $cUsername); ?>"><?php echo T_('Tags'); ?></a></li>
		<li><a href="<?php echo $userservice->getProfileUrl($cUserId, $cUsername); ?>"><?php echo $cUsername?></a> <a href="<?php echo ROOT ?>?action=logout">(<?php echo T_('Log Out'); ?>)</a></li>
		<?php if($currentUser->isAdmin()) : ?>
		<li><a href="<?php echo createURL('admin', ''); ?>">Admin</a></li>
		<?php endif; ?>

	<?php
		} else {
	?>

	<li><a href="<?php echo createURL(''); ?>"><?php echo T_('Home'); ?></a></li>
	<li><a href="<?php echo createURL('populartags'); ?>"><?php echo T_('Popular Tags'); ?></a></li>
	<li><a href="<?php echo createURL('about'); ?>"><?php echo T_('About'); ?></a></li>
	<li class="access"><a href="<?php echo createURL('login'); ?>"><?php echo T_('Log In'); ?></a></li>
	<?php if ($GLOBALS['enableRegistration']) { ?>
	<li class="access"><a href="<?php echo createURL('register'); ?>"><?php echo T_('Register'); ?></a></li>
	<?php } ?>

<?php
	}
?>

	</ul>

	<form id="search" action="<?php echo createURL('search'); ?>" method="post">
		<label for="search-terms">Search</label>
		<input type="search" id="search-terms" name="terms" value="<?php echo filter($terms); ?>" />

		<label for="search-range">in</label>
		<select id="search-range" name="range">
			<option value="all" selected><?php echo T_('All bookmarks'); ?></option>
			<?php
				if ($range == 'user' && $user!=$currentUsername) {
			?>

			<option value="<?php echo $user ?>"><?php echo T_("This user’s bookmarks"); ?></option>

			<?php
				}
				if ($userservice->isLoggedOn()) {
			?>

			<option value="<?php echo $currentUsername; ?>"><?php echo T_('My bookmarks'); ?></option>

			<?php
				}
			?>
		</select>

		<input type="submit" value="Search" />
	</form>
</nav>
