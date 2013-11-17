<aside id="sidebar" class="sidebar">
	<?php
		if (isset($sidebar_blocks) && count($sidebar_blocks)) {
		    $size = count($sidebar_blocks);
		    for ($i = 0; $i < $size; $i++) {
		        $this->includeTemplate('sidebar.block.' . $sidebar_blocks[$i]);
		    }
		}
	?>
</aside>
