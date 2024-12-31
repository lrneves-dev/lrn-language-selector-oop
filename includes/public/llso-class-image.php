<?php 
class Image {
    public function llso_getFlagImageHTML($locale) {
        $language = new Language;
        $languageDetails = $language->llso_getLanguage($locale);
        $flag = new Flag;
        $flagImage = $flag->llso_getFlag($locale);
        $image = '<img src="';
        $image .= $flagImage;
        $image .= '" title="';
        $image .= $languageDetails->title_change_lang;
        $image .= '" alt="';
        $image .= $languageDetails->alt_flag;
        $image .= '" class="llso_imagemOpcoes"';
        $image .= '" height="auto" style="margin-left:10px"/>';
        return $image;
    }
}