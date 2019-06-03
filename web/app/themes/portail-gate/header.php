<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?= get_bloginfo('charset'); ?>">
    <meta name="viewport" content="initial-scale=1.0,width=device-width,height=device-height,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open(get_queried_object()) ) : ?>
        <link rel="pingback" href="<?= get_bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="114x114" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-startup-image" href="<?= ASSETS_PATH ?>images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS_PATH ?>images/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="228x228" href="<?= ASSETS_PATH ?>images/favicon/coast-228x228.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ASSETS_PATH ?>images/favicon/favicon-32x32.png">
    <link rel="manifest" href="<?= ASSETS_PATH ?>images/favicon/manifest.json">
    <link rel="shortcut icon" href="<?= ASSETS_PATH ?>images/favicon/favicon.ico">
    <link rel="yandex-tableau-widget" href="<?= ASSETS_PATH ?>images/favicon/yandex-browser-manifest.json">
    <meta name="msapplication-TileImage" content="<?= ASSETS_PATH ?>images/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?= ASSETS_PATH ?>images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="apple-mobile-web-app-title" content="<?= get_bloginfo('name') ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="application-name" content="<?= get_bloginfo('name') ?>">
    <!-- end favicon -->
    <script>var boilerplate_timer = Date.now();</script>
    <?php wp_head(); ?>

    <?php
    // Code Tracking within_head
    if ( ACF_SUPPORT && get_field('within_head', 'option') )
        the_field('within_head', 'option');
    ?>
</head>

<body <?php body_class(); ?>>

<?php
// Google Tag Manager code
if ( ACF_SUPPORT && get_field('google_tag_manager', 'option') )
    the_field('google_tag_manager', 'option');
?>

<?php
// Page Code Tracking
if ( get_field('page_code_tracking') )
    the_field('page_code_tracking');
?>

<?php
// Code Tracking
if ( ACF_SUPPORT && get_field('after_opening_body', 'option') )
    the_field('after_opening_body', 'option');
?>

<header id="header" class="header" role="banner">
    <div class="block-header">
        <div class="wrapper">
            <a href="../home.html" class="logo" title="Portail Gate">
                <img src="<?= DEFAULT_LOGO ?>" class="img" alt="Portail Gate logo" >
                <img src="<?= get_field('logo_menu', 'option'); ?>" class="img-sticky" alt="Portail Gate logo">
            </a>
            <a href="#" class="btn-search-mobile" title="Recherche"><i class="i-search"></i></a>
            <a href="#" class="btn-collapse" title="">
                <span class="left"></span>
                <span class="right"></span>
                <span class="sr-only">Menu</span>
            </a>

            <div class="wrap-collapse">
                <div class="feature" style="background-image: url('<?= get_field('image_menu', 'option'); ?>')"></div>

                <nav class="main-nav" role="navigation">
                    <div class="wrap">
                        <a href="../html/home.html" class="logo-nav" title="Portail Gate"><img src="<?= get_field('logo_menu', 'option'); ?>" alt="Portail Gate logo"></a>
                        <!--<ul class="main-menu">
                            <li class="is-active"><a href="#">Accueil</a></li>
                            <li><a href="#">Découvrir le GATE</a></li>
                            <li><a href="#">Informations pratiques</a></li>
                            <li><a href="#">Préparer son arrivée</a></li>
                            <li><a href="#">Ils en parlent</a></li>
                            <li><a href="#">Partenaires et RDV</a></li>
                            <li><a href="#">Les évènements du GATE</a></li>
                        </ul>-->
                        <?php wp_nav_menu( array( 'main_menu' => 'Menu 1','menu_class'      => 'main-menu' ) );?>
                        <div class="contact">
                            <a href="#" class="help"><i class="i-question"></i><span>Aide</span></a>
                            <a href="mailto:" class="mail"><i class="i-email"></i><span>Contact</span></a>

                            <div class="multi-lang">
                                <ul>
                                    <li class="is-active fr"><a href="#">FR</a></li>
                                    <li class="en"><a href="#">EN</a></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="site-info">
                            <li><a href="#">Mention légales</a></li>
                            <li>.</li>
                            <li><a href="#">Chartes des données personnelles</a></li>
                            <li>.</li>
                            <li><a href="#">Plan du site</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="block-banner">
        <div class="wrapper">
            <div class="content">
                <h1 class="title-1"><?= get_field('title_1', 'option');?></h1>
                <h2 class="title-2"><?= get_field('title_2', 'option');?></h2>
                <div class="detail">
                    <?= get_field('detail', 'option');?>
                </div>
                <div class="group-btn">
                    <a href="#" class="btn-arrow">Découvrir le GATE <i class="i-arrow-right"></i></a>
                    <a href="#" class="btn-arrow">Partenaires et RDV <i class="i-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="feature" style="background-image: url('<?= get_field('background_feature', 'option');?>')">
            <div id="info" class="info">
                <a href="#" class="btn-close" title="Close" data-close="#info"><i class="i-close"></i></a>
                <span class="icon">
                    <i class="i-alert"></i>
                </span>
                <p class="title">Flash Info</p>
                <p class="des"><?= get_field('flash_info', 'option');?></p>
            </div>
        </div>
    </div>
    <div id="search" class="block-search">
        <form action="#" class="form-default form-search" method="get">
            <div class="input-wrap">
                <input id="input-s" type="text" placeholder="Recherche" class="input-field">
                <label class="input-label" for="input-s">
                    <button class="btn-submit" type="submit"></button>
                    <span class="input-label-content">Recherche</span>
                </label>
            </div>
        </form>
    </div>
</header>

