<?php
class SelMenu {
    public function llso_menu_admin() {
        add_menu_page( 'Language Selector OOP', //Título Html da Página
            'Language Selector', //Título do Ítem de Menu 
            'manage_options', //Visibilidade a utilizador que possa gerir-opções 
            'llso_language-selector', //slug da página
            [$this, 'llso_pagSelIdioma'], //Função de Callback 
            'dashicons-flag', //Icone do Menu 
            10 //Posição do ítem no menu 
        );
        //Iniciar a classe que vai conter a função de callback
        $categoryManager = new CategoryManager;
        add_submenu_page( 
            'llso_language-selector', // slug da página parent
            'Manage Categories', // Título HTML da Página
            'Manage Categories', // Título do Item de menu
            'manage_options', // Capacidade de quem pode ver o menu 
            'llso_manage-cats', // Slug da página que estamos a adicionar
            [$categoryManager, 'llso_manageCats'],
        ); //Função de callback
        //Iniciar a classe que vai conter a função de callback
        $tagManager = new TagManager;
        add_submenu_page( 
            'llso_language-selector', // slug da página parent
            'Manage Tags', // Título HTML da Página
            'Manage Tags', // Título do Item de menu
            'manage_options', // Capacidade de quem pode ver o menu 
            'llso_manage-tags', // Slug da página que estamos a adicionar
            [$tagManager, 'llso_manageTags'],
        ); //Função de callback
        //Iniciar a classe que vai conter a função de callback
        $baseManager = new BaseManager;
        add_submenu_page( 
            'llso_language-selector', // slug da página parent
            'Manage Bases', // Título HTML da Página
            'Manage Bases', // Título do Item de menu
            'manage_options', // Capacidade de quem pode ver o menu 
            'llso_manage-bases', // Slug da página que estamos a adicionar
            [$baseManager, 'llso_manageBases'],
        ); //Função de callback
        //Iniciar a classe que vai conter a função de callback
        $blogPageManager = new BlogPageManager;
        add_submenu_page( 
            'llso_language-selector', // slug da página parent
            'Manage Blog Page', // Título HTML da Página
            'Manage Blog Page', // Título do Item de menu
            'manage_options', // Capacidade de quem pode ver o menu 
            'llso_manage-blog-page', // Slug da página que estamos a adicionar
            [$blogPageManager, 'llso_manageBlogPage'],
        ); //Função de callback
    }
    public function llso_pagSelIdioma() {
        //Conteúdo das funções de páginas de admin têm de ser em echo e não return
        echo 'Olá Admin';
    }
    public function llso_hookaMenuAdmin() {
        /* A página de administração do plugin */
        add_action( 'admin_menu', [$this, 'llso_menu_admin'] );
    }
}