<?php
// Sair se acedido diretamente
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( 'Hummmm! God saw what you tried to do.' );
}

//Requerer todos os ficheiros necessários da pasta public
$includes = glob( LRN_LANGSELECT_DIR . 'includes/public/*.php' );
foreach($includes as $include) {
	require_once($include);
}

//Definir os idiomas disponíveis logo ao carregar o plugin
$language = new Language;
$language->llso_setAvailableLanguages();
//Adicionar os scripts de estilo e js caso haja ao core do WordPress
$enqueueLlso = new EnqueueLlso;
$enqueueLlso->llso_hookScripts();
//Apresentar "exibir" o selector
$selector = new Selector;
$selector->llso_hookSelector();

//Loading the Admin classes and scripts
if(is_admin()) {
	//Requerer todos os ficheiros necessários da pasta admin
	$includesAdm = glob( LRN_LANGSELECT_DIR . 'includes/admin/*.php' );
	foreach($includesAdm as $includeAdm) {
		require_once($includeAdm);
	}
	$selMenu = new SelMenu;
	$selMenu->llso_hookaMenuAdmin();
	//Apresentar a metabox nos posts para se meter as slugs correspondentes
	$postMetabox = new PostMetabox;
	$postMetabox->llso_hookMetabox(); 
}