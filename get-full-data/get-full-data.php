<?php 

/*

Plugin Name: Get Data Fetch
Plugin URI: http://cosmosoft.biz
Description: Fetch any table data from you database
Version: 0.2
Author: Cosmoweb
Author URI: http://cosmosoft.biz
License: GPL2

*/
?><?php


class Get_Data_Fetch
{
    public function __construct()
    {
       
        add_action('admin_menu', array($this, 'my_plugin_menu'), 20);
        wp_enqueue_style('my_plugin_menu', plugins_url('/assets/app.css', __FILE__));
        wp_enqueue_script('my_plugin_menu', plugins_url('/assets/app.js', __FILE__));
        $this->creat_tabel();
        





   	}


   
  
public function creat_tabel()
{
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE full_fetch_data (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  created_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  database_name varchar(55) DEFAULT '' NOT NULL,
  separator_style varchar(55) DEFAULT '' NOT NULL,
  UNIQUE KEY id (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

if($wpdb->get_var("SHOW TABLES LIKE $table_name") != $table_name) {
  /*For table drop use $wpdb->query("DROP TABLE IF EXISTS $table_name");*/
  $sql = "CREATE TABLE full_fetch_data (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  created_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  database_name varchar(55) DEFAULT '' NOT NULL,
  separator_style varchar(55) DEFAULT '' NOT NULL,
  UNIQUE KEY id (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

}


}

public function my_plugin_menu() {
		
add_menu_page( 'Get Full Data - Cosmoweb WP Plugin', 'Get Full Data', 'manage-options','menu-parent-fulldata', '', plugins_url( 'get-full-data/images/bigdataicon.png' ), 7 );
add_submenu_page( 'menu-parent-fulldata', 'Configuration', 'Configuration', 'manage_options', 'get-full-data/config.php');
add_submenu_page( 'menu-parent-fulldata', 'Show all data', 'Show all data', 'manage_options', 'get-full-data/appfiles/core-index.php');
add_submenu_page( 'menu-parent-fulldata', 'Export all data', 'Export all data', 'manage_options', 'get-full-data/appfiles/core-export.php');

}










}

new Get_Data_Fetch();