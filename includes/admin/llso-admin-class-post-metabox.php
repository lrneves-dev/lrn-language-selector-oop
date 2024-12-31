<?php
class PostMetabox {
    /* Função para adicionar uma Metabox (Secção) aos editores de posts e páginas para levar os inputs das diferentes slugs alternativas para os respetivos idiomas */ 
    public function llso_addMetaboxLanguages() {
        $labelDaString = 'Slug dos Artigos nos Respetivos Idiomas';
        $nomeMetaBox = 'meta-box-idiomas';
        /* A metabox é uma secção que adicionamos ao editor de posts no admin, que depois leva conteúdo lá dentro e não cada campo de input como eu levei anos a pensar que era. Podemos apresentar qualquer coisa dentro desta secção (metabox) como simples texto ou inputs de formulário e é por isso que só se chama uma vez por vez e não dentro de um loop como eu estava a pensar. o loop tem de ser feito é dentro da função de callback. */
            add_meta_box(
                $nomeMetaBox, //para o elemento html (nao vamos utilizar, mas é só por questões de organização na página)
                $labelDaString, //label para apresentar como uma especie de titulo da metabox.
                [$this, 'llso_custom_meta_box_callback'], //função de callback, função que vai executar o código dentro da metabox.
            );
    }
    public function llso_custom_meta_box_callback() {
        $llsoLanguage = new Language;
        $slugManager = new SlugManager;
        //Função interna do WordPress que retorna a ID do post atual
        $postId = get_the_ID();
        // Chamada da função interna do WordPress get_locale() que retorna o idioma de instalação
        $idiomaInstall = get_locale();
        $languages = $llsoLanguage->llso_getActiveLanguages();
        /* foreach usado sempre na callback function e nunca na adição da metabox. 
        porque a metabox é apenas uma secção 
        na area de publicação de um artigo e 
        nao o input em si como eu estava a pensar*/
        foreach($languages as $lang) {
            $aSlug = $slugManager->llso_getSlug( $postId, $lang );
            $idiomaMinimo = $llsoLanguage->llso_getLanguage( $lang )->lang_min_lower;
            $idiomaExtenso = $llsoLanguage->llso_getLanguage( $lang )->lang_readable;
            if($lang != $idiomaInstall) {
            // Output do HTML para os input fields
            ?>
                <p>
                <label for="slug_alternativa_<?php echo $idiomaMinimo; ?>">Slug do Artigo em <?php echo $idiomaExtenso; ?>:</label>
                <input type="text" id="slug_alternativa_<?php echo $idiomaMinimo; ?>" name="slug_alternativa_<?php echo $idiomaMinimo; ?>" value="<?php echo esc_attr($aSlug); ?>">
                <input type="hidden" id="idioma_slug_<?php echo $idiomaMinimo; ?>" name="idioma_slug_<?php echo $idiomaMinimo; ?>" value="<?php echo esc_attr($lang); ?>">
                </p>
            <?php } // Fim do if lang != idiomaInstall
        } // fim do foreach
    }
    public function llso_hookMetabox() {
        // Add a custom meta box to the post editor
        add_action('add_meta_boxes', [$this, 'llso_addMetaboxLanguages']);
    }
}