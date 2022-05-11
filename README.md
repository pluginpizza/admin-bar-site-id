# Admin Bar Site ID WordPress Plugin

Display the current site ID in the WordPress admin bar on multisite networks.

## FAQ

### I do not see the site ID in the admin bar?

The admin bar item is only added on [multisite](https://wordpress.org/support/article/create-a-network/) installs for users with the `manage_options` [capability](https://wordpress.org/support/article/roles-and-capabilities/).

### Show the site ID to users other than Administrators

A `functions_file_admin_bar_site_id_capability` [filter](https://developer.wordpress.org/plugins/hooks/filters/) exists that allows you to override the capability required to add the admin bar menu item.

```
// Change the admin bar site ID capability.
add_filter(
	'functions_file_admin_bar_site_id_capability',
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

	return 'edit_posts';
}
```
