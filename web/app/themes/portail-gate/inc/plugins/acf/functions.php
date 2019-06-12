<?php if (! defined('APP_PATH')) die ('Bad requested!');
global $acf_option;
$acf_option = get_field('acf_option', 'option');
/**
 * ACF Functions
 **/
//Create option page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> __('General Settings', DOMAIN),
        'menu_title'	=> __('Theme options', DOMAIN),
        'menu_slug' 	=> 'default-theme-settings',
        'capability'	=> 'manage_options',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> __('Code Placement', DOMAIN),
        'menu_title'	=> __('Code Placement', DOMAIN),
        'parent_slug'	=> 'default-theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> __('Edit content', DOMAIN),
        'menu_title'	=> __('Edit content', DOMAIN),
        'parent_slug'	=> 'default-theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> __('Edit image', DOMAIN),
        'menu_title'	=> __('Edit image', DOMAIN),
        'parent_slug'	=> 'default-theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> __('Logo client', DOMAIN),
        'menu_title'	=> __('Logo client', DOMAIN),
        'parent_slug'	=> 'default-theme-settings',
    ));
}

//load_json
function my_acf_json_load_point( $paths ) {
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    // return
    return $paths;
}

//Google Maps API settings
function my_acf_google_map_api( $api ){
    global $acf_option;
    $api['key'] = $acf_option['google_map_api_key'];
    return $api;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');




