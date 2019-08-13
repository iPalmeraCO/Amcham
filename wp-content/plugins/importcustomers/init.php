<?php
/*
Plugin Name: Importcustomers
Description:
Version: 1
Author: Julián Andrés Escobar Herrera
Author URI: 
*/
add_action('admin_menu','importcustomers');
function importcustomers() {
	//this is the main item for the menu
	add_menu_page('Importar usuarios', //page title
	'Importar usuarios', //menu title
	'manage_options', //capabilities
	'crearfinaciamiento', //menu slug
	'crearfinaciamiento' //function
	);
	add_submenu_page('crearfinaciamiento', //parent slug
	'Financiamientos', //page title
	'Financiamientos', //menu title
	'manage_options', //capability
	'crearfinaciamiento', //menu slug
	'crearfinaciamiento'); //function

	// add_submenu_page('crearfinaciamiento', //parent slug
	// 'Bancos', //page title
	// 'Bancos', //menu title
	// 'manage_options', //capability
	// 'listar_losbancos', //menu slug
	// 'listar_losbancos'); //function

	// add_submenu_page('crearfinaciamiento', //parent slug
	// 'Clientes', //page title
	// 'Clientes', //menu title
	// 'manage_options', //capability
	// 'listar_clientes', //menu slug
	// 'listar_clientes'); //function

	//this is a submenu
	// add_submenu_page(null, //parent slug
	// 'Agregar nuevo tipo de cliente bancario', //page title
	// 'Agregar', //menu title
	// 'manage_options', //capability
	// 'crear_tipo_cliente', //menu slug
	// 'crear_tipo_cliente'); //function

	// add_submenu_page(null, //parent slug
	// 'Editar tipo de cliente', //page title
	// 'Agregar', //menu title
	// 'manage_options', //capability
	// 'editar_tipo_cliente', //menu slug
	// 'editar_tipo_cliente'); //function

	add_submenu_page('crearfinaciamiento', //parent slug
	'Crear Financiamiento', //page title
	'Crear Financiamiento', //menu title
	'manage_options', //capability
	'crear_financiamiento', //menu slug
	'crear_financiamiento'); //function

	add_submenu_page(null, //parent slug
	'Editar financiamiento', //page title
	'Agregar', //menu title
	'manage_options', //capability
	'editar_financiamiento', //menu slug
	'editar_financiamiento'); //function

	add_submenu_page('crearfinaciamiento', //parent slug
	'Importar datos de financiamiento como archivo csv', //page title
	'Importar CSV', //menu title
	'manage_options', //capability
	'importar_csv', //menu slug
	'importar_csv'); //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'importar_csv.php');