		</main>

		<footer role="contentinfo" id="bottom">
			<ul>
				<li><a href="http://webdevdata.org/">webdevdata.org</a></li>
				<li><a href="https://github.com/webdevdata/research">research.webdevdata.org on GitHub</a></li>
			</ul>

			<?php $this->includeTemplate('bookmarklet.inc.php'); ?>

			<?php
				echo $GLOBALS['footerMessage'] . ' <a href="' . createURL('about') . '">' . T_('About') . '</a> - ' . T_("Propulsed by ") . '<a rel="external" href="https://sourceforge.net/projects/semanticscuttle/">SemanticScuttle</a>';

				// Licence to the thumbnails provider (OBLIGATORY IF YOU USE ARTVIPER SERVICE)
				if ($GLOBALS['enableWebsiteThumbnails']) {
					echo ' (Thumbnails by <a rel="external" href="http://www.artviper.net">webdesign</a>)';
				}
			?>
		</footer>

		<?php if (isset($GLOBALS['googleAnalyticsCode']) && $GLOBALS['googleAnalyticsCode'] != ''): ?>
		<script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','<?php echo $GLOBALS['googleAnalyticsCode']; ?>');ga('send','pageview');
		</script>
		<?php endif;?>
	</body>
</html>
