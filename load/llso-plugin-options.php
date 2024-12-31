<?php
// Sair se acedido diretamente
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( 'Hummmm! God saw what you tried to do.' );
}

function llso_criaOpcoes() {
	$idiomaDefault = 'pt_PT';
    //requerer o locale da instalação através da função interna do wordPress get_locale()
	$idiomaInstall = get_locale();
	if($idiomaDefault != $idiomaInstall) {
	  if($idiomaInstall == '') $idiomaInstall = 'en_US';
		$idiomasIniciais = array($idiomaDefault, $idiomaInstall);
	} else {
		$idiomasIniciais = array($idiomaDefault);
	}
	//Criar uma opção para definir o idioma default
	update_option( 'llso_idioma_default', $idiomaDefault );
	//Criar a opção de idiomas ativos, de momento apenas com idioma default que é o de instalação
	update_option( 'llso_idiomas_ativos', $idiomasIniciais );
}