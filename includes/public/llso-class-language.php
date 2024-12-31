<?php
class Language {
    public function llso_getIdiomaDefault() {
        return get_option('llso_idioma_default');
    }
    public function llso_getLanguage( $locale ) {
        global $wpdb;
        //Obter a linguagem pelo locale
        $tLanguages = $wpdb->prefix .'llso_languages';
        $sqlGetLanguage = $wpdb->prepare("SELECT * FROM `$tLanguages` WHERE `locale` = %s", $locale);
        //Usamos get_row aqui para obter toda a coluna especificada e não apenas o locale
        $resGetLanguage = $wpdb->get_row($sqlGetLanguage);
        return $resGetLanguage;
    }
    public function llso_languageExists( $locale ) {
        $theLanguage = $this->llso_getLanguage( $locale );
        $retorno = '';
        if($theLanguage != '') {
            $retorno = 'exists';
        } else {
            $retorno = 'dont';
        }
        return $retorno;
    }
    public function llso_setNewLanguage(
        $locale, $localeDashed, $langReadable, $titleChangeLang, $altFlag, $imageFlag 
        ) {
        global $wpdb;
        $tLanguages = $wpdb->prefix .'llso_languages';
        $langMinUpper = substr($locale, 3);
        $langMinLower = substr($locale, 0, -3);
        $titleCombined = $titleChangeLang . $langReadable;
        if( $this->llso_languageExists( $locale ) == 'dont' ) {
           $wpdb->insert($tLanguages,
                array(
                    'id_language' => NULL,
                    'locale' => $locale, 
                    'locale_dashed' => $localeDashed, 
                    'lang_readable' => $langReadable, 
                    'lang_min_upper' => $langMinUpper,
                    'lang_min_lower' => $langMinLower,
                    'title_change_lang' => $titleCombined, 
                    'alt_flag' => $altFlag,
                    'image_flag' => $imageFlag,
                         ),
                );	
        } 
    }
    public function llso_setAvailableLanguages() {
        //Inserir o Português (pt_PT)
        $this->llso_setNewLanguage(
            'pt_PT', 'pt-PT', 'Português', 'Alterar o Idioma para: ', 
            'Imagem da Bandeira de Portugal para representar ligação para o conteúdo desta página no idioma Português (pt_PT)', 
            'portugal.png' 
        );
        //Inserir o Inglês (en_US)
        $this->llso_setNewLanguage(
            'en_US', 'en-US', 'English', 'Change the Language to: ', 
            'Image of the United States Flag to represent a link to the content of this page in English (en_US)', 
            'usa.png' 
        );
        //Inserir o Francês (fr_FR)
        $this->llso_setNewLanguage(
            'fr_FR', 'fr-FR', 'Français', 'Changez la langue en: ', 
            'Image du Drapeau de la France pour représenter un lien vers le contenu de cette page en français (fr_FR)', 
            'france.png' 
        );
        //Inserir o Espanhol (es_ES)
        $this->llso_setNewLanguage(
            'es_ES', 'es-ES', 'Español', 'Cambie el idioma a: ', 
            'Imagen de la Bandera de España para representar un enlace al contenido de esta página en español (es_ES)', 
            'spain.png' 
        );
        //Inserir o Italiano (it_IT)
        $this->llso_setNewLanguage(
            'it_IT', 'it-IT', 'Italiano', 'Cambia la lingua in: ', 
            'Immagine della Bandiera dell\'Italia per rappresentare un collegamento al contenuto di questa pagina in italiano (it_IT)', 
            'italy.png' 
        );
        //Inserir o Alemão (de_DE)
        $this->llso_setNewLanguage(
            'de_DE', 'de-DE', 'Deutsch', 'Ändern Sie die Sprache in: ', 
            'Bild der deutschen Flagge als Link zum Inhalt dieser Seite in deutscher Sprache (de_DE)', 
            'germany.png' 
        );
        //Inserir o Holandês (nl_NL)
        $this->llso_setNewLanguage(
            'nl_NL', 'nl-NL', 'Dutch', 'Verander de taal naar: ', 
            'Afbeelding van de vlag van Nederland als link naar de inhoud van deze pagina in de Nederlandse taal (nl_NL)', 
            'netherlands.png' 
        );
        //Em futuras atualizações se quiser adicionar novos idiomas disponíveis basta fazê-lo aqui em baixo
    }
    public function llso_getActiveLanguages() {
        //Obter os idiomas ativos através da opção que criámos na instalação do plugin
        return get_option('llso_idiomas_ativos');
    }
}