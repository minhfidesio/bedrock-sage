<?php
query_posts(array(
    'post_type' => 'info_pratiques',
    'showposts' => 2
));
?>
<div class="block-infomations">
    <div class="wrapper">
        <div class="content">
            <h2><?= get_field('title_block_2', 'option'); ?></h2>
            <div class="list-address">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="item">
                        <div class="icon"><i class="i-location"></i></div>
                        <p class="title"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></p>
                        <p class="address"><?php echo str_replace(' | ', '<br />', get_the_excerpt()); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <a href="#" class="btn-arrow">Plus d’informations <i class="i-arrow-right"></i></a>
        </div>
        <div class="feature" style="background-image: url('<?= get_field('image_feature_2', 'option'); ?>')"></div>
        <div id="map" class="map">
            <!--<img src="{{ img_url }}Bitmap.png" alt="Portail Gate Map">-->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2633.2885030226985!2d2.1786687158989526!3d48.69996641980208!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e679c1d7a2f8f1%3A0xd1e5e3c4b12c62a1!2sGATE+Guichet+d&#39;Accueil+des+Talents+%C3%89trangers!5e0!3m2!1svi!2s!4v1559537483171!5m2!1svi!2s" alt="Portail Gate Map" width="640" height="223" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>