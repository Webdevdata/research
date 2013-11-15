<?php
	header('HTTP/1.x 404 Not Found');
	$this->includeTemplate($GLOBALS['top_include']);
	echo '<p>404 The requested URL was not found on this server.</p>';
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
