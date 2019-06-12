<?php $welcome = get_field('welcome'); ?>
<header id="header" class="header" role="banner">
    <div class="block-header">
        <div class="wrapper">
            <?php get_template_part('template-parts/components/logo') ?>
            <?php get_template_part('template-parts/components/main-menu') ?>
        </div>
    </div>
    <div class="block-banner">
        <div class="wrapper">
            <div class="content">
                <h1 class="title-1"><?= $welcome['title'] ?></h1>
                <h2 class="title-2"><?= $welcome['subtitle'] ?></h2>
                <div class="detail"><?= $welcome['description'] ?></div>

                <div class="group-btn">
                    <a href="<?= $welcome['button_1']['url'] ?>" class="btn-arrow" target="<?= $welcome['button_1']['target'] ?>"><?= $welcome['button_1']['title'] ?> <i class="i-arrow-right"></i></a>
                    <a href="<?= $welcome['button_2']['url'] ?>" class="btn-arrow" target="<?= $welcome['button_2']['target'] ?>"><?= $welcome['button_2']['title'] ?> <i class="i-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="feature" style="background-image: url('<?= $welcome['background_image'] ?>')">
            <?php get_template_part('template-parts/components/flash-info') ?>
        </div>
    </div>

    <?php get_template_part('template-parts/components/search') ?>
</header>