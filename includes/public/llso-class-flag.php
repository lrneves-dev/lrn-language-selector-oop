<?php 
class Flag {
    private $flagPath = LRN_LANGSELECT_URL . 'flags/';
    //Retorna o URL completo da bandeira especificada pelo $locale
    public function llso_getFlag($locale) {
        $language = new Language;
        $row = $language->llso_getLanguage($locale);
        $imageFlag = $row->image_flag;
        return $this->flagPath . $imageFlag;
    }
}