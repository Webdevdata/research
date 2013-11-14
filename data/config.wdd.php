<?php

/**
 * WebDevData configuration for SemanticScuttle.
 *
 * Copy this file to config.php and adjust it.
 *
 * See config.default.php for more options.
 */

/**
 * The name of this site.
 *
 * @var string
 */
$sitename = 'research.webdevdata.org';

/**
 * The welcome message on the homepage.
 *
 * @var string
 */
$welcomeMessage = 'Welcome to research.webdevdata.org!';

/**
 * Translation from locales/ folder.
 *
 * Examples: de_DE, en_GB, fr_FR
 *
 * @var string
 */
$locale = 'en_GB';

/**
 * Use clean urls without .php filenames.
 * Requires mod_rewrite (for Apache) to be active.
 *
 * @var boolean
 */
$cleanurls = true;

/**
 * Show debug messages.
 * This setting is recommended when setting up SemanticScuttle,
 * and when hacking on it.
 *
 * @var boolean
 */
$debugMode = false;

/**
 * Database driver
 *
 * available:
 * mysql4, mysqli, mysql, oracle, postgres, sqlite, db2, firebird,
 * mssql, mssq-odbc
 *
 * @var string
 */
$dbtype = 'mysql4';

/**
 * Database username
 *
 * @var string
 */
$dbuser = '';

/**
 * Database password
 *
 * @var string
 */
$dbpass = '';

/**
 * Name of database
 *
 * @var string
 */
$dbname = 'webdevresearch';

/**
 * Database hostname/IP
 *
 * @var string
 */
$dbhost = 'localhost';

/**
 * Contact address for the site administrator.
 * Used as the FROM address in password retrieval e-mails.
 *
 * @var string
 */
$adminemail = '';

/**
 * Array of user names who have admin rights
 *
 * Example:
 * <code>
 * $admin_users = array('adminnickname', 'user1nick', 'user2nick');
 * </code>
 *
 * @var array
 */
$admin_users = array('newtron');

/**
 * Default privacy setting for bookmarks.
 * 0 - Public
 * 1 - Shared with Watchlist
 * 2 - Private
 *
 * @var integer
 */
$defaults['privacy'] = 0;

/**
 * Ordering of sidebar blocks.
 * See $menu2Tags for item of menu2
 *
 * @var array
 * @see $menu2Tags
 */
$index_sidebar_blocks = array('popular');

/**
 * List of tags used by menu2 sidebar box
 * Empty list = hidden menu2 box
 * menu2 displays linked tags just belonging to admins.
 *
 * @var array
 */
$menu2Tags = array();

/**
 * The HTML theme to use. With themes, you can give your semanticscuttle
 * installation a new look.
 *
 * Themes are the folders in data/templates/
 *
 * @var string
 */
$theme = 'webdevdata';

/**
 * Translation from locales/ folder.
 *
 * Examples: de_DE, en_GB, fr_FR
 *
 * @var string
 */
$locale = 'en_CA';

/**
 * A question to avoid spam.
 * Shown on user registration page.
 *
 * @var string
 * @see $antispamAnswer
 */
$antispamQuestion = 'What is the name of this Community Group?';

/**
 * The answer to the antispam question
 * Users have to write exactly this string.
 *
 * @var string
 * @see $antispamQuestion
 */
$antispamAnswer = 'webdevdata';

/**
 * Enable or disable user registration
 *
 * @var boolean
 */
$enableRegistration = true;

/**
 * If everybody may edit common tag description.
 * When set to false, only admins can do it.
 *
 * @var boolean
 */
$enableCommonTagDescriptionEditedByAll = false;

/**
 * Number of users' searches that are saved.
 * 10 is default, -1 means unlimited.
 *
 * @var integer
 */
$sizeSearchHistory = -1;

/**
 * Enable Google Search Engine into "gsearch/" folder.
 *
 * @var boolean
 */
$enableGoogleCustomSearch = true;

/**
 * GoogleAnalytics tracking code.
 * Empty string disables analytics.
 *
 * @var  string
 * @link https://www.google.com/analytics/
 */
$googleAnalyticsCode = null;

/**
 * FIXME: explain better
 *
 * Add a possible anchor (structured content) for bookmarks description field
 * a simple value "xxx" (like "author") automatically associates xxx with
 * [xxx][/xxx].
 * A complex value "xxx"=>"yyy" (like "address") directly
 * associates xxx with yyy.
 *
 * @var array
 */
$descriptionAnchors = array(
	'abstract',
    'ACMRef',
    'altLink',
    'author',
    'BibTeX',
    'content',
    'date',
    'EndNote'
);

?>
