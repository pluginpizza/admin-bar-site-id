=== Admin Bar Site ID ===
Contributors: pluginpizza, barryceelen, functionsfile
Tags: admin, multisite
Requires at least: 3.1
Tested up to: 6.9
Requires PHP: 5.3
Stable tag: 2.0.0
License: GPLv3+
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Display the current site ID in the WordPress admin bar on multisite networks.

== Description ==

Display the current site ID in the WordPress admin bar on multisite networks.

### Bug Reports

Do you want to report a bug or suggest a feature for Admin Bar Site ID? Best to do so in the [Admin Bar Site ID repository on GitHub](https://github.com/pluginpizza/admin-bar-site-id/).

## FAQ

### I do not see the site ID in the admin bar?

The admin bar item is only added on [multisite](https://wordpress.org/support/article/create-a-network/) installs for users with the `manage_options` [capability](https://wordpress.org/support/article/roles-and-capabilities/).

### Show the site ID to users other than Administrators

A `pluginpizza_admin_bar_site_id_capability` [filter](https://developer.wordpress.org/plugins/hooks/filters/) exists that allows you to override the capability required to add the admin bar menu item.

```
// Change the admin bar site ID capability.
add_filter(
	'pluginpizza_admin_bar_site_id_capability',
	'prefix_admin_bar_site_id_capability'
);

/**
 * Change the admin bar site ID capability.
 *
 * @param string $capability The capability required to add the site ID admin
 *                           bar menu item.
 * @return string
 */
function prefix_admin_bar_site_id_capability( $capability ) {

	/*
	 * This example changes the capablity to 'edit_posts'. For an overview
	 * of default capabilities, visit the Roles and Capabilities support
	 * article: https://wordpress.org/support/article/roles-and-capabilities/
	 */
	return 'edit_posts';
}
```

== Changelog ==

= 2.0.0 =
Release Date: July 26, 2024

- Renamed the capability filter to pluginpizza_admin_bar_site_id_capability.

= 1.0.0 =
Release Date: November 13, 2023

- Initial release.
