<?php if (! defined('APP_PATH')) die ('Bad requested!');

define('ASSETS_PATH', get_template_directory_uri().'/assets/');
define('DOMAIN', 'portail_gate');
define('ACF_SUPPORT', function_exists('get_field'));

/**
 * Themes Option.
 **/
define('DEFAULT_LOGO', ACF_SUPPORT ? get_field('default_logo', 'option') : false);
