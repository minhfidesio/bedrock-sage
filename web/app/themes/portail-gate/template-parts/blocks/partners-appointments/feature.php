<?php
    $partnerTitle   = get_the_title();
    
    $partnerLogo    = get_field('partenaires_logo');
    $partnerLogo    = wp_get_attachment_image_src($partnerLogo,'full');
    $partnerLogo    = $partnerLogo['0'];

    $partnerImage   = get_field('partenaires_featured_image');
    $partnerImage   = wp_get_attachment_image_src($partnerImage,'full');
    $partnerImage   = $partnerImage['0'];

    $partnerDes     = get_field('partenaires_descriptions');

    $partnerWebUrl  = get_field('partenaires_website');
?>
<div class="block-feature mt-0">
    <?php get_template_part('template-parts/blocks/global/breadcrumbs') ?>
    <div class="content">
        <div class="thumb">
            <img src="<?=$partnerLogo?>" alt="<?=$partnerTitle?>">
        </div>
        <h1 class="title-5"><?=$partnerTitle?></h1>
        <div class="des">
            <p><?=$partnerDes?></p>
            <div class="group-btn">
                <a href="<?=$partnerWebUrl?>" class="btn-default" target="_blank"><?=__('Voir le site web',DOMAIN)?></a>
                <?php get_template_part('template-parts/components/share-facebook') ?>
            </div>
        </div>
    </div>
    <div class="feature" style="background-image: url('<?=$partnerImage?>')"></div>
</div>