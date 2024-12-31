<?php 
class TagManager {
    // Getter for the Tags
    public function llso_getTags() {
        $getTags = get_terms(array(
            'taxonomy'   => 'post_tag',
            'orderby'    => 'term_id',
            'order'		 => 'DESC',
            'hide_empty' => false,
        ));
        return $getTags;
    }
    public function llso_manageTags() {
        echo 'Manage Tags here';
    }
}