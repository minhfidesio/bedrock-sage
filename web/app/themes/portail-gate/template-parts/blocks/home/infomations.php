<?php
$informations = get_field('informations_pratiques');
$contact_id = $informations['contact_info'];
$contact_info = get_field('informations', $contact_id);
global $location;
$location = get_field('map', $contact_id);
?>
<div class="block-infomations">
    <div class="wrapper">
        <div class="content">
            <h2><?= $informations['title'] ?></h2>
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
            </div>
            <a href="#" class="btn-arrow">Plus d’informations <i class="i-arrow-right"></i></a>
        </div>
        <div class="feature" style="background-image: url('<?= $informations['background_image'] ?>')"></div>
        <div id="map" class="map">
            <!--<img src="{{ img_url }}Bitmap.png" alt="Portail Gate Map">-->
            <?php get_template_part('template-parts/components/map') ?>
        </div>
    </div>
</div>