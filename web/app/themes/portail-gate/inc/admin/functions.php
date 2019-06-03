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

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
add_action( 'login_enqueue_scripts', 'default_login_logo' );
add_filter( 'login_headerurl', 'default_login_logo_url' );
add_filter( 'login_headertitle', 'default_login_logo_url_title' );
add_filter('upload_mimes', 'cc_mime_types');
if ( !ACF_SUPPORT ) add_action( 'admin_notices', 'acf_admin_notice__error' );
add_filter( 'wp_handle_upload_prefilter', 'nelio_max_image_size' );
