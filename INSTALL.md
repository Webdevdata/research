# Installation

The site is built using [Semantic Scuttle](http://semanticscuttle.sourceforge.net/). This repo only contains custom theming/templating, not the entire Semantic Scuttle code base. To install, [do a normal Semantic Scuttle installation](http://semanticscuttle.sourceforge.net/docs/INSTALL.html), then:

1. Sync your install with this repo, which should create a `/data/templates/webdevdata/` directory, a `/www/themes/webdevdata/` directory, update some of the PHP files in `/www/`, and create a `/data/config.wdd.php` file.
2. Rename `/data/config.wdd.php` to `/data/config.php` (replacing the existing `config.php`).
3. Update your new `/data/config.php` with the MySQL credentials from your Semantic Scuttle install.