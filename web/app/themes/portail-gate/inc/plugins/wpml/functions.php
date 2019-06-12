<?php if (!defined('APP_PATH')) die ('Bad requested!');

function icl_post_languages(){
    $languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 0, 'link_empty_to' => get_home_url() ) );
    if ( 0 < count($languages) ) {
        $lang_arr = array();
        $html = '';
        foreach($languages as $l){
            if ( $l['active'] ) {
                $html .= '<li class="is-active ' . $l['language_code'] .'">';
                $html .= '<a href="'.$l['url'].'" style="text-transform: uppercase;">'.$l['language_code'].'</a>';
                $html .= '</li>';
            }
        }

        foreach($languages as $l){
            if ( !$l['active'] ) {
                $html .= '<li class="'. $l['language_code'] .'">';
                $html .= '<a href="'.$l['url'].'" style="text-transform: uppercase;">'.$l['language_code'].'</a>';
                $html .= '</li>';
            }
        }

        $lang_arr[] = $html;

        return join(' ', $lang_arr);
    }
}