<?php

/**
 * Fired during plugin activation
 *
 * @link       https://medmestery.xzy
 * @since      1.0.0
 *
 * @package    My_plugin
 * @subpackage My_plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    My_plugin
 * @subpackage My_plugin/includes
 * @author     mohammed <med@gmail.com>
 */
class My_plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		global $wpdb;

		if($wpdb->get_var("SHOW tables like '".$this->wp_plugin_data()."'") != $this->wp_plugin_data()){
	  
			$table_query = "CREATE TABLE `".$this->wp_plugin_data()."` (
				`Id` int(11) NOT NULL AUTO_INCREMENT,
				`plugin_name` varchar(50) NOT NULL,
				`plugin_description` varchar(50) NOT NULL,
				`plugin_option` varchar(50) NOT NULL,
				PRIMARY KEY (`Id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

			require_once (ABSPATH.'wp-admin/includes/upgrade.php');
			dbDelta($table_query);
	    }			
	}

	public function wp_plugin_data()
	{
		global $wpdb;
		return $wpdb->prefix."plugin_data";
	}
}


