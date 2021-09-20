<?php

add_action('admin_menu', function () {
	// echo "hello";
	add_menu_page("primer_", "Primer Menu", "manage_options", "primer-menu-slug", function () {
		include_once(constant('PRIMER_DIR_PATH'). '/includes/admin-sidbar.php');
	}, 'dashicons-xing', 4);
});
add_action('admin_init', function () {
	register_setting('social_url', 'facebook_url');
	register_setting('social_url', 'twitter_url');
	register_setting('social_url', 'instagram_url');
});


?>