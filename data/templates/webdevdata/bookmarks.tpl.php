<?php
	// Service creation: only useful services are created
	$bookmarkservice = SemanticScuttle_Service_Factory::get('Bookmark');
	$tagservice      = SemanticScuttle_Service_Factory::get('Tag');

	// page settings
	$pageName   = isset($pageName) ? $pageName : '';
	$user       = isset($user) ? $user : '';
	$currenttag = isset($currenttag) ? $currenttag : '';

	// sort settings
	$titleArrow  = '';
	$dateArrow   = '';
	$dateSort    = 'date_desc';
	$titleSort   = 'title_asc';

	switch(getSortOrder()) {
	case 'date_asc':
		$dateArrow = ' ↑';
		$dateSort  = 'date_desc';
		break;

	case 'title_asc':
		$titleArrow = ' ↑';
		$titleSort  = 'title_desc';
		break;

	case 'title_desc':
		$titleArrow = ' ↓';
		$titleSort  = 'title_asc';
		break;

	case 'date_desc':
	default:
		$dateArrow = ' ↓';
		$dateSort = 'date_asc';
		break;
	}

	// PAGINATION
	// Ordering
	$sortOrder = '';
	if (GET_SORT != '') {
		$sortOrder = 'sort=' . getSortOrder();
	}
	$sortAmp = (($sortOrder) ? '&amp;' . $sortOrder : '');
	$sortQue = (($sortOrder) ? '?' . $sortOrder : '');

	// Previous
	$perpage = getPerPageCount($currentUser);
	if (!$page || $page < 2) {
		$page = 1;
		$start = 0;
		$bfirst = '<span class="disable">'. T_('First') .'</span>';
		$bprev = '<span class="disable">'. T_('Previous') .'</span>';
	} else {
		$prev = $page - 1;
		$prev = 'page='. $prev;
		$start = ($page - 1) * $perpage;
		$bfirst= '<a href="' . sprintf($nav_url, $user, $currenttag, '') . $sortQue .'">' . T_('First') . '</a>';
		$bprev = '<a href="' . sprintf($nav_url, $user, $currenttag, '?') . $prev . $sortAmp .'">' . T_('Previous') . '</a>';
	}

	// Next
	$next = $page + 1;
	$totalpages = ceil($total / $perpage);
	if (count($bookmarks) < $perpage || $perpage * $page == $total) {
		$bnext = '<span class="disable">'. T_('Next') . '</span>';
		$blast = '<span class="disable">'. T_('Last') . "</span>";
	} else {
		$bnext = '<a href="' . sprintf($nav_url, $user, $currenttag, '?page=') . $next . $sortAmp . '">' . T_('Next') . '</a>';
		$blast = '<a href="' . sprintf($nav_url, $user, $currenttag, '?page=') . $totalpages . $sortAmp . '">' . T_('Last') . "</a>";
	}


	// RSS
	$brss = '';
	$size = count($rsschannels);
	for ($i = 0; $i < $size; $i++) {
		$brss = '<a href="' . htmlspecialchars($rsschannels[$i][1]) . '" RSS</a>';
	}


	// include top template
	$this->includeTemplate($GLOBALS['top_include']);
?>

<main role="main" id="main">
	<aside class="controls">
		<h3>Controls</h3>

		<div id="sort">
			<div id="sort-num"><?php echo $total; ?> bookmark(s)</div>
			<div id="sort-by">Sort by</div>

			<ul>
				<li><a href="?sort=<?php echo $dateSort ?>"><?php echo T_("Date") . $dateArrow; ?></a></li>
				<li><a href="?sort=<?php echo $titleSort ?>"><?php echo T_("Title") . $titleArrow; ?></a></li>
			</ul>
		</div>

		<?php
			if ($currenttag != '') {
				echo '<div>';
				if ($user != '') {
					echo '<a href="' . createURL('tags', $currenttag) . '">Bookmarks from other users for this tag</a>';
				} else if ($userservice->isLoggedOn()) {
					echo '<a href="' . createURL('bookmarks', $currentUser->getUsername() . '/' . $currenttag) .'">Only your bookmarks for this tag</a>';
				}
				echo '</div>';
			}

	 		// display a page banner if too many bookmarks to manage
	 		if (getPerPageCount($currentUser) > 10) {
				$pagesBanner = '<div class="paging">' . $bfirst . '<span> / </span>' . $bprev . '<span> / </span>' . $bnext . '<span> / </span>' . $blast . '<span> / </span>' . sprintf(T_('Page %d of %d'), $page, $totalpages) . " " . $brss . " </div>";
				echo $pagesBanner;
			}
		?>
	</aside>

	<ol <?php echo ($start > 0 ? 'start="'. ++$start .'"' : ''); ?> id="bookmarks">

		<?php

		// Bookmarks
		foreach ($bookmarks as $key => &$row) {
			$access = 'shared';

			$cats = '';
			$tagsForCopy = '';
			$tags = $row['tags'];
			foreach ($tags as $tkey => &$tag) {
				$tagcaturl = sprintf($cat_url, filter($row['username'], 'url'), filter($tag, 'url'));
				$cats .= sprintf('<li><a href="%s" rel="tag">%s</a></li>',$tagcaturl, filter($tag));
				$tagsForCopy .= $tag;
			}
			if ($cats != '') {
				$cats = T_('Tags:') . ' <ul>' . $cats . '</ul>';
			}

			// Edit and delete links
			$edit = '<ul><li><a href="' . createURL('edit', $row['bId']) . '">Edit</a></li><li><button type="button" onclick="deleteBookmark(this, '. $row['bId'] .'); return false;">Delete</button>';

			// Last update
			$update = '<small>Last updated '. date($GLOBALS['shortdate'], strtotime($row['bModified'])). '</small>';

			// User attribution
			$copy = 'Bookmarked by ';
			if ($userservice->isLoggedOn() && $currentUser->getUsername() == $row['username']) {
				$copy .= 'you';
			} else {
				$copy .= '<a href="' . createURL('bookmarks', $row['username']) . '">' . SemanticScuttle_Model_UserArray::getName($row) . '</a>';
			}

			// Nofollow option
			$rel = ' rel="nofollow"';

			// address
			$address  = $row['bAddress'];
		?>

		<li class="xfolkentry <?php echo $access; ?>">
			<?php
				$bkDescription = preg_replace('|\[\/.*?\]|', '', filter($row['bDescription'])); // remove final anchor
				$bkDescription = preg_replace('|\[(.*?)\]|', ' <span class="anchorBookmark">$1</span> » ', $bkDescription); // highlight starting anchor
				$bkDescription = preg_replace('@((http|https|ftp)://.*?)( |\r|$)@', '<a href="$1" rel="nofollow">$1</a>$3', $bkDescription); // make url clickable
			?>
			<a href="<?php echo htmlspecialchars($address) . '"' . $rel;?> class="taggedlink"><?php echo filter($row['bTitle']); ?></a>
			<div class="description"><?php echo nl2br($bkDescription); ?></div>
			<div class="meta">
				<?php echo $cats . $copy . $edit . $update;?>
			</div>
		</li>

		<?php } ?>
	</ol>
</main>

<?php
	print $pagesBanner;  // display previous and next links pages + RSS link
	$this->includeTemplate('sidebar.tpl');
	$this->includeTemplate($GLOBALS['bottom_include']);
?>
