<!DOCTYPE html>

<html lang="en-CA">

	<head>
		<meta charset="utf-8" />

		<title><?php echo filter($GLOBALS['sitename'] . (isset($pagetitle) ? ' » ' . $pagetitle : '')); ?></title>

		<link rel="icon" type="image/png" href="<?php echo $theme->resource('icon.png'); ?>" />

		<link rel="stylesheet" type="text/css" href="<?php echo $theme->resource('scuttle.css');?>" />

		<link rel="search" type="application/opensearchdescription+xml" href="<?php echo ROOT ?>api/opensearch.php" title="<?php echo htmlspecialchars($GLOBALS['sitename']) ?>" />

		<?php
			if (isset($rsschannels)) {
				$size = count($rsschannels);
				for ($i = 0; $i < $size; $i++) {
					echo '<link rel="alternate" type="application/rss+xml" title="' . htmlspecialchars($rsschannels[$i][0]) . '"' . ' href="'. htmlspecialchars($rsschannels[$i][1]) .'" />' . "\n";
				}
			}
		?>
	</head>

	<body>

	<?php
		$headerstyle = '';
		if(isset($_GET['popup'])) {
			$headerstyle = ' class="popup"';
		}
	?>

	<header role="banner" id="header" <?php echo $headerstyle; ?>>
		<h1><a href="<?php echo ROOT ?>"><?php echo $GLOBALS['sitename']; ?></a></h1>
		<?php
			if(!isset($_GET['popup'])) {
				$this->includeTemplate('toolbar.inc');
			}
		?>
	</header>

	<?php
		if (isset($subtitlehtml)) {
			echo '<h2>' . $subtitlehtml . "</h2>\n";
		} else if (isset($subtitle)) {
			echo '<h2>' . htmlspecialchars($subtitle) . "</h2>\n";
		}

		if (DEBUG_MODE) {
			echo '<p class="error">'. T_('Admins, your installation is in "Debug Mode" ($debugMode = true). To go in "Normal Mode" and hide debugging messages, change $debugMode to false into config.php.') . "</p>\n";
		}

		if (isset($error) && $error != '') {
			echo '<p class="error">'. $error ."</p>\n";
		}
		if (isset($msg) && $msg != '') {
			echo '<p class="success">'. $msg ."</p>\n";
		}
		if (isset($tipMsg) && $tipMsg != '') {
			echo '<p class="tipMsg">'. $tipMsg ."</p>\n";
		}
?>
