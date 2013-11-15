<?php
	header('HTTP/1.x 500 Server error');
	$this->includeTemplate($GLOBALS['top_include']);
	echo '<p>500 Server error.</p>';
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
