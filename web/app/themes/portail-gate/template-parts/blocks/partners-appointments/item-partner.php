<?php
    $partnerID      = get_the_ID();
    $partnerName    = get_the_title();
    
    $partnerLogo    = get_field('partenaires_logo');
    $partnerLogo    = wp_get_attachment_image_src($partnerLogo,'full');
    $partnerLogo    = $partnerLogo['0'];
    
    $partnerImage   = get_field('partenaires_featured_image');
    $partnerImage   = wp_get_attachment_image_src($partnerImage,'thumbnail');
    $partnerImage   = $partnerImage['0'];
    
    $partnerDes     = get_field('partenaires_descriptions');

    $partnerLocation = get_post_meta($post->ID, '_partner_location_id', true);
    
?>
<div class="item">
    <div class="thumb" style="background-image: url(<?=$partnerImage?>)">
        <div class="logo">
            <img src="<?=$partnerLogo?>" alt="<?=$partnerName?>">
        </div>
    </div>
    <div class="content">
        <p class="title-4"><?=$partnerName?></p>
        <p class="des"><?= the_excerpt_limit_text($partnerDes)?></p>
        <a href="<?=get_permalink($partnerID)?>" class="btn-default">
            <?php if ( $partnerLocation != '-1' ) : ?>
                <i class="i-calendar"></i>
                <?=__('Prendre rendez-vous', DOMAIN)?>
            <?php else : ?>
                <i class="i-plus"></i>
                <?=__('Plus d’informations', DOMAIN)?>
            <?php endif; ?>
        </a>
    </div>
</div>