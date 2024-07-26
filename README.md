# Admin Bar Site ID WordPress Plugin

Display the current site ID in the WordPress admin bar on multisite networks.

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

## Installation

Admin Bar Site ID is hosted on the [WordPress plugin directory](https://wordpress.org/plugins/admin-bar-site-id/) and can be installed via the WordPress dashboard.

1. Visit the Plugins page within your WordPress dashboard and select ‘Add New’
1. Search for 'Bar Site ID' and install the plugin
1. Activate Bar Site ID from your Plugins page

### Composer

Bar Site ID can be added as a dependency to your project via the [wpackagist composer repository](https://wpackagist.org/search?q=admin-bar-site-id).
