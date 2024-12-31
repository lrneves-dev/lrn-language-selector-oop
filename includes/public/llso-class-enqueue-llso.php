<?php
class EnqueueLlso {
    //Adicionar a folha de estilo do plugin ao WordPress
    public function llso_addPluginScripts() {
        $folhaDeEstilo = LRN_LANGSELECT_URL . 'css/llso-style.css';
        wp_enqueue_style('llso-style', $folhaDeEstilo);
        //Javascript também podemos adicionar aqui
        // Utilizando wp_enqueue_script
    }
    public function llso_hookScripts() {
        add_action( 'wp_enqueue_scripts', [$this, 'llso_addPluginScripts'] );
    }
}