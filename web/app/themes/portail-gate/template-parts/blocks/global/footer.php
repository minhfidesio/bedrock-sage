<?php $footer = get_field('footer', 'option'); ?>

<footer id="footer" class="block-footer">
    <div class="wrapper">
        <a href="<?= get_home_url() ?>" class="logo" title="<?= get_bloginfo('name') ?>"><img src="<?= get_field('logo_menu', 'option'); ?>" alt="<?= get_bloginfo('name') ?>"></a>

        <?php get_template_part('template-parts/components/footer-contact') ?>

        <div class="copyright">
            <p>
                <a href="<?= $footer['mentions_legales']['url'] ?>" target="<?= $footer['mentions_legales']['target'] ?>">
                    <?= $footer['mentions_legales']['title'] ?>
                </a>
            </p>
            <p><?= $footer['copyright_text'] ?></p>
        </div>
    </div>
</footer>