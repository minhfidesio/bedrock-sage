<?php $popup_menu = get_field('popup_menu', 'option'); ?>
<a href="#" class="btn-search-mobile" title="Recherche"><i class="i-search"></i></a>

<a href="#" class="btn-collapse" title="">
    <span class="left"></span>
    <span class="right"></span>
    <span class="sr-only"><?= esc_html__('Menu', DOMAIN) ?></span>
</a>

<div class="wrap-collapse">
    <div class="feature" style="background-image: url('<?= $popup_menu['background_image'] ?>')"></div>

    <nav class="main-nav" role="navigation">
        <div class="wrap">
            <a href="<?= home_url() ?>" class="logo-nav" title="<?= get_bloginfo('name') ?>"><img src="<?= get_field('logo_menu', 'option'); ?>" alt="<?= get_bloginfo('name') ?> - logo"></a>

            <?php
            wp_nav_menu([
                'theme_location'    => 'default_main_menu',
                'menu_class'        => 'main-menu',
                'container'         => false
            ]);
            ?>

            <?php $footer = get_field('footer', 'option'); ?>
            <div class="contact">
                <a href="<?= $footer['question_link']['url'] ?>" class="help"
                   target="<?= $footer['question_link']['target'] ?>">
                    <i class="i-question"></i>
                    <span><?= $footer['question_link']['title'] ?></span>
                </a>
                <a href="<?= $footer['contact_link']['url'] ?>" class="mail"
                   target="<?= $footer['contact_link']['target'] ?>">
                    <i class="i-email"></i>
                    <span><?= $footer['contact_link']['title'] ?></span>
                </a>

                <div class="multi-lang"><ul><li class="is-active fr"><a href="#">FR</a></li><li class="en" style="display: list-item;"><a href="#">EN</a></li></ul></div>
            </div>

            <?php if ( isset($popup_menu['footer_links']) ) : ?>
                <ul class="site-info">
                    <?php $i=0; foreach ($popup_menu['footer_links'] as $link) : ?>
                        <?= $i != 0 ? '<li>.</li>' : '' ?>
                        <li><a href="<?= $link['link']['url'] ?>" target="<?= $link['link']['target'] ?>"><?= $link['link']['title'] ?></a></li>
                    <?php $i++; endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</div>