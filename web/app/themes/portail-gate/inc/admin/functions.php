<?php if (! defined('APP_PATH')) die ('Bad requested!');

/**
 * Change the Login Logo
 */
function load_admin_style() {
    wp_enqueue_style( 'admin_css', ASSETS_PATH.'css/admin-style.css', false, '1.0.0' );
}

function default_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?= DEFAULT_LOGO ?>);
            height:85px;
            width:100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            padding-bottom: 30px;
        }
    </style>
<?php }

function default_login_logo_url() {
    return home_url();
}

function default_login_logo_url_title() {
    return get_bloginfo( 'name' );
}

// Allow SVG through WordPress Media Uploader
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

// Advanced Custom Fields PRO notice
function acf_admin_notice__error() {
    $class = 'notice notice-error';
    $message = __( 'Advanced Custom Fields PRO plugin have to installed and activated!', DOMAIN );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

// Limit Image Size in WordPress Media Library
function nelio_max_image_size( $file ) {
    $size = $file['size'];
    $size = $size / 1024;
    $type = $file['type'];
    $is_image = strpos( $type, 'image' ) !== false;
    $limit = 100000;
    $limit_output = '100kb';
    if ( $is_image && $size > $limit ) {
        $file['error'] = 'Image files must be smaller than ' . $limit_output;
    }//end if
    return $file;
}
//end nelio_max_image_size()

/**
 * Removing Saved Transients when a post is saved.
 */
function remove_cache_transients( $post_id, $post, $update ) {
    $post_type = get_post_type($post_id);

    if ( "evenement" == $post_type ) {
        if ( (get_transient('pg_three_next_events')) != FALSE )
            delete_transient('pg_three_next_events');

        if ( (get_transient('pg_all_next_events')) != FALSE )
            delete_transient('pg_all_next_events');

        if ( (get_transient('pg_six_pass_events')) != FALSE )
            delete_transient('pg_six_pass_events');
    };

    if ( "partenaire" == $post_type ) {
        if ( (get_transient('pg_all_partenaires')) != FALSE )
            delete_transient('pg_all_partenaires');

        if ( (get_transient('pg_0_partenaires')) != FALSE )
            delete_transient('pg_0_partenaires');

        if ( (get_transient('pg_1_partenaires')) != FALSE )
            delete_transient('pg_1_partenaires');

        if ( (get_transient('pg_home_partenaires')) != FALSE )
            delete_transient('pg_home_partenaires');
    };
    
}
//Custom format time
function custom_time($time){
    $time = str_replace(":00","",$time);
    if(strlen($time) == 2){
        $time = $time."h";
    }else $time = str_replace(":","h",$time);
    return $time;
}
//Custom format day
function custom_day($day){
    $start = strpos($day, " ");
    $lent = strpos($day,",") - 4;
    $day = substr( $day, $start, $lent);
    if(strstr($day,",")){
        $day = str_replace(",","",$day);
        $day = str_replace(" ","",$day);
        $day = "0".$day;
    }
    return $day;
}

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
add_action( 'login_enqueue_scripts', 'default_login_logo' );
add_filter( 'login_headerurl', 'default_login_logo_url' );
add_filter( 'login_headertitle', 'default_login_logo_url_title' );
add_filter('upload_mimes', 'cc_mime_types');
if ( !ACF_SUPPORT ) add_action( 'admin_notices', 'acf_admin_notice__error' );
add_filter( 'wp_handle_upload_prefilter', 'nelio_max_image_size' );
add_action( 'save_post', 'remove_cache_transients', 10, 3 );
