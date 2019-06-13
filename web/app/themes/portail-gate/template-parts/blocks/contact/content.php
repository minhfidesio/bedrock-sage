<?php
$contact_info = get_field('informations');
global $location;
$location = get_field('map');
?>
<div class="block-infomations type2">
    <div class="wrapper">
        <div class="content">
            <div class="list-address">
                <div class="item">
                    <div class="icon"><i class="i-location"></i></div>
                    <p class="title"><?= $contact_info['address']['title'] ?></p>
                    <p class="address"><?= $contact_info['address']['content'] ?></p>
                </div>
                <div class="item">
                    <div class="icon"><i class="i-clock"></i></div>
                    <p class="title"><?= $contact_info['opening_times']['title'] ?></p>
                    <p class="address"><?= $contact_info['opening_times']['content'] ?></p>
                </div>
                <div class="item">
                    <div class="icon"><i class="i-question-2"></i></div>
                    <p class="title"><?= $contact_info['contact_us']['title'] ?></p>
                    <?php foreach ( $contact_info['contact_us']['info'] as $info ) : ?>
                        <?php if ( isset( $info['email'] ) ) : ?>
                            <p class="mail">
                                <a href="mailto:<?= $info['email'] ?>">
                                    <?= $info['email'] ?>
                                </a>
                            </p>
                        <?php endif; ?>
                        <?php if ( isset( $info['phone_number'] ) ) : ?>
                            <div class="phone">
                                <a href="tel:<?= str_replace([' ', '.', ',', '-'], ['', '', '', ''], $info['phone_number']) ?>">
                                    <?= $info['phone_number'] ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="item">
                    <div class="icon"><i class="i-print"></i></div>
                    <p class="title"><?= $contact_info['export']['title'] ?></p>
                    <a href="<?= $contact_info['export']['download_file'] ?>" class="btn-arrow" target="_blank" download>
                        <?= $contact_info['export']['button_text'] ?>
                        <i class="i-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="map" class="map" style="height: 415px;" data-zoom="16">
            <?php get_template_part('template-parts/components/map') ?>
        </div>
    </div>
</div>