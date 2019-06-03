<?php if ( ! defined('APP_PATH')) die ('Bad requested!');

/**
 * Enqueue scripts and styles.
 **/
function setup_scripts() {
    // Styles
    wp_enqueue_style('main-style', ASSETS_PATH.'css/main.css', array(), null);

    // Scripts
    wp_enqueue_script('main-script', ASSETS_PATH.'js/main.js', array('jquery'), null, true);

    /* array with elements to localize in scripts */
    $script_localization = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'home_url' => get_home_url()
    );
    wp_localize_script('main-script', 'script_loc', $script_localization);
}

/**
 * Default setup.
 **/
function default_setup(){
    register_nav_menus( array(
        'default_main_menu' => __('Main Menu', DOMAIN)
    ) );

    add_theme_support( 'post-thumbnails' );
    add_post_type_support( 'page', 'excerpt' );
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('menu-item-33', $classes) ){
        $classes[] = 'is-active';
    }
    return $classes;
}

add_action( 'wp_enqueue_scripts', 'setup_scripts' );
add_action('init', 'default_setup');

function cptui_register_my_cpts_les_rendez_vous() {

	/**
	 * Post Type: Les rendez-vous.
	 */

	$labels = array(
		"name" => __( "Les rendez-vous", "portail_gate" ),
		"singular_name" => __( "Les rendez-vous", "portail_gate" ),
	);

	$args = array(
		"label" => __( "Les rendez-vous", "portail_gate" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "les_rendez_vous", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "les_rendez_vous", $args );
}

add_action( 'init', 'cptui_register_my_cpts_les_rendez_vous' );

if (class_exists('MultiPostThumbnails')) {
 
    new MultiPostThumbnails(array(
    'label' => 'Secondary Image',
    'id' => 'secondary-image',
    'post_type' => 'post'
     ) );
     
}