<?php
/* Service creation: only useful services are created */
$b2tservice =SemanticScuttle_Service_Factory::get('Bookmark2Tag');

$logged_on_userid = $userservice->getCurrentUserId();
if(!isset($user) || !isset($userid) || $logged_on_userid === false) {
	$user = '';
	$userid = NULL;
	$logged_on_userid = NULL;
}

$popularTags =& $b2tservice->getPopularTags($userid, $popCount, $logged_on_userid);
$popularTags =& $b2tservice->tagCloud($popularTags, 5, 90, 225, 'alphabet_asc');

?>

<section id="popular">
	<h2>Popular tags</h2>
	<ul class="tags">
		<?php
			$cat_url = createURL('tags', '%2$s');
			foreach ($popularTags as $row) {
				$entries = T_ngettext('bookmark', 'bookmarks', $row['bCount']);
				echo '<li class="popular-' . $row['size'] . '"><a href="'. sprintf($cat_url, $user, filter($row['tag'], 'url')) .'" title="'. $row['bCount'] .' '. $entries .'" rel="tag">'. filter($row['tag']) .'</a></li>';
			}
		?>
	</ul>
</section>
