<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/
 * @since      1.0.0
 *
 * @package    Primer
 * @subpackage Primer/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Primer
 * @subpackage Primer/includes
 * @author     Ritesh <rathodriteshrock@gmail.com>
 */
class Primer_Activator {

	public function __construct()
	{
		
	
	}
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;

		$table_name=$wpdb->prefix."artisan-social";
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
			social_id bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
			social varchar(50) NOT NULL default '',
			social_url text NOT NULL default '',
			user_id int NOT NULL
			) ;";

		$wpdb->query($sql);	
		$wpdb->show_errors();
		$wpdb->print_error();	
	}

}
