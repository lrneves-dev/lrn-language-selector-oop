<?php
// Sair se acedido diretamente
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( 'Hummmm! God saw what you tried to do.' );
}

function llso_criaTabelas() {
	global $wpdb;

	 $charset_collate = $wpdb->get_charset_collate();
	 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	 // Nomes das tabelas
	 //Tabela para idiomas Disponíveis
	 $tabela_llso_languages = $wpdb->prefix .'llso_languages';
	 //Tabela para slugs
	 $tabela_llso_slugs = $wpdb->prefix .'llso_slugs';
	//Tabela para as páginas de taxonomia tipo archive 
	$tabela_llso_taxs = $wpdb->prefix .'llso_taxs';
	//Tabela de bases que vai buscar e relacionar as category e tag bases das tabelas entre sites
	$tabela_llso_bases = $wpdb->prefix .'llso_bases';
	$sql_llso_languages = "
	CREATE TABLE IF NOT EXISTS $tabela_llso_languages (
		id_language BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
		locale varchar(5) NOT NULL,
		locale_dashed varchar(5) NOT NULL,
		lang_readable TEXT NOT NULL, 
		lang_min_upper varchar(2) NOT NULL,
		lang_min_lower varchar(2) NOT NULL,
		title_change_lang TEXT NOT NULL, 
		alt_flag TEXT NOT NULL, 
		image_flag TEXT NOT NULL,
		PRIMARY KEY  (id_language)
	) $charset_collate;";
	$sql_llso_slugs = "
	CREATE TABLE IF NOT EXISTS $tabela_llso_slugs (
		id_slug BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
		id_post BIGINT NOT NULL,
		slug TEXT NOT NULL,
		lang varchar(5) NOT NULL,
		PRIMARY KEY  (id_slug)
	) $charset_collate;";
	$sql_llso_taxs = "
	CREATE TABLE IF NOT EXISTS $tabela_llso_taxs (
		id_tax BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
		slug_tax_original TEXT NOT NULL,
		slug_tax_idioma TEXT NOT NULL,
		lang varchar(5) NOT NULL,
		PRIMARY KEY (id_tax)
	) $charset_collate;";
	$sql_llso_bases = "
	CREATE TABLE IF NOT EXISTS $tabela_llso_bases (
		id_base BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, 
		base_original TEXT NOT NULL, 
		base_no_idioma TEXT NOT NULL, 
		lang varchar(5) NOT NULL, 
		PRIMARY KEY (id_base)
	) $charset_collate;";
	 //Cria a tabela de idiomas disponíveis
	dbDelta( $sql_llso_languages );
	dbDelta( $sql_llso_slugs );
	dbDelta( $sql_llso_taxs );
	dbDelta( $sql_llso_bases );
} 