<?php $this->includeTemplate($GLOBALS['top_include']); ?>

<main role="main" id="main">
	<p><a href="http://sourceforge.net/projects/semanticscuttle/">Semantic Scuttle</a> is licensed under the <a href="http://www.gnu.org/copyleft/gpl.html"><abbr title="GNU's Not Unix">GNU</abbr> General Public License</a> (you can freely host it on your own web server.)</p>

	<ul>
		<li>Add search plugin into your browser: <button type="button" onclick="window.external.AddSearchProvider('<?php echo ROOT?>api/opensearch.php');">opensearch</button></li>
		<li>The tag "system:unfiled" allows you to find bookmarks without tags.</li>
	</ul>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
