<?php 
class CategoryManager {
    // Getter for the Categories
    public function llso_getCategories() {
        $getCategories = get_terms(array(
            'taxonomy'   => 'category',
            'orderby'    => 'term_id',
            'order'		 => 'DESC',
            'hide_empty' => false,
        ));
        return $getCategories;
    }
    // Função de conteúdo echoavel para apresentar os conteúdos da página de admin
    public function llso_manageCats() {
        echo 'Manage Cats here';
    }
}