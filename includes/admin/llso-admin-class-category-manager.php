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
    public function llso_manageCats() { ?>
        <div class="wrap">
            <h2>Manage Categories</h2>
            <p>By: L. R. Neves</p>
            <div class="lmid-molduras-admin">
                <h3>Managing Categories</h3>
            </div>
        </div>
    <?php }
}