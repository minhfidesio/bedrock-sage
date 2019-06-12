<?php if (! defined('APP_PATH')) die ('Bad requested!');

function the_excerpt_limit_text($excerpt, $limit = 14) {
    if (str_word_count($excerpt, 0) > $limit) {
        $words = str_word_count($excerpt, 2);
        $pos = array_keys($words);
        $excerpt = substr($excerpt, 0, $pos[$limit]) . '...';
    }
    return $excerpt;
}

function event_get_time($de_time = null, $a_time = null)
{
    if ( $de_time && $a_time )
        return sprintf( esc_html__('De %s à %s', DOMAIN), $de_time, $a_time);

    if ( $de_time )
        return sprintf( esc_html__('De %s', DOMAIN), $de_time);

    return null;
}
// ACF style map
function gg_map_styles(){
    ?>
    <style type="text/css">
        .acf-map {
            width: 100%;
            height: 100%;
            position: relative;
        }

        /* fixes potential theme css conflict */
        .acf-map img {
            max-width: inherit !important;
        }
    </style>
    <?php
}

add_action( 'wp_head', 'gg_map_styles' );
