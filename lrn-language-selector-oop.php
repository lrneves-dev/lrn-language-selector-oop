<?php
// Sair se acedido diretamente
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( 'Hummmm! God saw what you tried to do.' );
}
/**
* Plugin Name:       LRN Language Selector OOP
* Plugin URI:        https://lrneves.com
* Description:       Plugin para mudar idioma de site entre diretórios (Para funcionar entre Instalações de WordPress independentes em diferentes diretórios)
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            L. R. Neves
* Author URI:        https://lrneves.com
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/
* Update URI:		 https://lrneves.com
* Text Domain:       lrn-language-selector-oop
* Domain Path:       /languages
*/

//Definir Constantes para chamarmos o diretório e url do plugin com mais facilidade
if( ! defined( 'LRN_LANGSELECT_DIR' ) ) {
	define( 'LRN_LANGSELECT_DIR', plugin_dir_path( __FILE__ ) );
}
if( ! defined( 'LRN_LANGSELECT_URL' ) ) {
	define( 'LRN_LANGSELECT_URL', plugin_dir_url( __FILE__ ) );
}

//Requerer o ficheiro de criação das tabelas
require_once( LRN_LANGSELECT_DIR . 'load/llso-plugin-tables.php' );
//Na Ativação Criar tabelas
register_activation_hook(__FILE__, 'llso_criaTabelas' );
//Requerer o ficheiro de criação das opções
require_once( LRN_LANGSELECT_DIR . 'load/llso-plugin-options.php' );
//E criar as opções também
register_activation_hook(__FILE__, 'llso_criaOpcoes' );


//Requerer o ficheiro de carregamento do plugin
require_once( LRN_LANGSELECT_DIR . 'load/llso-plugin-load.php' );