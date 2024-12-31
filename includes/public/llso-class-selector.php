<?php 
final class Selector {
    public function llso_theSelector() {
        $image = new Image;
        $ptFlag = $image->llso_getFlagImageHTML('pt_PT');
        return $ptFlag;
    }
    //Exibir finalmente o selector
    public function llso_exhibitSelector( $header ) {
        $contentComSelector = $header;
        $contentComSelector .= $this->llso_theSelector(); 
        echo $contentComSelector;
    }
    //Adicionar ao hook do open body
    public function llso_hookSelector() {
        add_action( 'wp_body_open', [$this,'llso_exhibitSelector']);
    }
}