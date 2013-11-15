<?php
	if (is_array($row['tags'])) {
		$row['tags'] = implode(', ', $row['tags']);
	}

	$this->includeTemplate($GLOBALS['top_include']);
?>

<main role="main" id="main">
	<form action="<?php echo $formaction; ?>" method="post">
		<label for="address">* Address</label>
		<input type="text" id="address" name="address" value="<?php echo filter($row['bAddress'], 'xml'); ?>" onblur="javascript:useAddress(this)" />

		<label for="titleField">* Title</label>
		<input type="text" id="titleField" name="title" maxlength="255" value="<?php echo filter($row['bTitle'], 'xml'); ?>" onkeypress="javascript:this.style.backgroundImage = 'none';" />

		<label for="description">Description</label>
		<textarea name="description" id="description" rows="5" cols="63" ><?php echo filter($row['bDescription'], 'xml'); ?></textarea>

		<div class="tip">
			<p>You can use “anchors” to delimite attributes. For example: [author]blah[/author]</p>
			<?php if (count($GLOBALS['descriptionAnchors']) > 0) : ?>
			<p>Suggested anchors:</p>
			<ul>
				<?php
					foreach ($GLOBALS['descriptionAnchors'] as $anchorName => $anchorValue) {
						if (is_numeric($anchorName)) {
							$anchorName = $anchorValue;
							$anchorValue = '[ ' . $anchorValue . '][/' . $anchorValue .']';
						}
						echo '<li><span class="anchor">' . $anchorName . '</span>';
					}
				?>
			</ul>
			<?php endif; ?>
		</div>

		<label for="tags">Tags</label>
		<input type="text" id="tags" name="tags" value="<?php echo filter($row['tags'], 'xml'); ?>"/>

		<div class="tip">
			<ul>
				<li>Use “&gt;” to include one tag in another, e.g.: <i>data type > research</i>.</li>
				<li>Use “=” to make two tags synonymous, e.g.: <i>rwd = responsive web design</i>.</li>
			</ul>
		</div>

		<input type="submit" name="submitted" value="Save" />

		<input type="hidden" name="status" value="0" />

		<?php if (isset($showdelete) && $showdelete) { ?>
		<input type="submit" name="delete" value="Delete bookmark" />
		<?php } ?>

		<?php if ($popup) { ?>
		<input type="hidden" name="popup" value="1" />

		<?php } elseif (isset($referrer)) { ?>
		<input type="hidden" name="referrer" value="<?php echo $referrer; ?>" />
		<?php } ?>

	</form>
</main>

<?php
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
