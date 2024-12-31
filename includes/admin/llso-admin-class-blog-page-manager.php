<?php 
class BlogPageManager {
    //Getter para a página de Blog
    public function llso_getBlogPageSlug() {
        // Temos que ir buscar o id da página às opções
        $blogPageId = get_option( 'page_for_posts' );
        //Obter os dados da página na tabela posts com o id que fomos buscar à options
        $llso_thePost = get_post( $blogPageId );
        // Definir uma variável para armazenarmos a slug da página de blog
        $slugBlogPage = '';
        //Se retornar TRUE... 
        if( $llso_thePost ) {
            // Tentamos obter a slug e adicioná-la à variável respetiva
            $slugBlogPage = $llso_thePost->post_name; 
        }
        return $slugBlogPage;
    }
    // Função de conteúdo echoavel para apresentar os conteúdos da página de admin
    public function llso_manageBlogPage() {
        echo 'Manage The Blog Page here';
    }
}