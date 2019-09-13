<?php
/*
Plugin Name: Importdirectorio
Description:
Version: 1
Author: Julián Andrés Escobar Herrera
Author URI: 
*/
add_action('admin_menu','importdirectorio');
function importdirectorio() {
	//this is the main item for the menu
	add_menu_page('Importar directorio', //page title
	'Importar directorio', //menu title
	'manage_options', //capabilities
	'importar_csv2', //menu slug
	'importar_csv2' //function
	);
}

define('ROOTDIR2', plugin_dir_path(__FILE__));
require_once(ROOTDIR2 . 'importar_csv2.php');