<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<ol class="tags">
		<?php
			foreach ($tags as $row) {
				$entries = T_ngettext('bookmark', 'bookmarks', $row['bCount']);
				echo '<li class="popular-' . $row['size'] . '"><a href="' . sprintf($cat_url, $user, filter($row['tag'], 'url')) . '" title="' . $row['bCount'] . ' ' . $entries . '" rel="tag">' . filter($row['tag']) . '</a></li>';
			}
		?>
	</ol>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
