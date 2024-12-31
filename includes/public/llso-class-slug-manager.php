<?php 
class SlugManager {
    public function llso_getSlug( $postId, $lang ) {
        global $wpdb;
	    $tSlugs = $wpdb->prefix .'llso_slugs';
	    $sqlGetSlug = $wpdb->prepare("SELECT `slug` FROM `$tSlugs` WHERE `id_post` = %d AND `lang` = %s ORDER BY `id_slug` DESC", array($postId, $lang));
	    $resGetSlug = $wpdb->get_var($sqlGetSlug);
	    return $resGetSlug;
    }
}