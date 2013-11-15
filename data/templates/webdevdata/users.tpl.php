<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<ul>
		<?php
			foreach ($users as $row) {
				echo  '
					<li>
						<b>' . SemanticScuttle_Model_UserArray::getName($row) . '</b>
						<ul>
							<li><a href="' . createURL('profile', $row['username']) . '">profile</a></li>
							<li><a href="' . createURL('bookmarks', $row['username']) . '">bookmarks</a></li>
						</ul>
					</li>
				';
			}
		?>
	</ul>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
