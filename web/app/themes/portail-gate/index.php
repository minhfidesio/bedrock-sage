<?php get_header(); ?>
<!--Start Pull HTML here-->
<main id="main-content" class="main">
    <div class="block-appointments">
        <div class="wrapper">
            <h2 class="is-slick-control"><button class="slick-prev slick-arrow"><i class="i-arrow-left"></i></button><?= get_field('title_block_1', 'option'); ?><button class="slick-next slick-arrow"><i class="i-arrow-right"></i></button></h2>
            <div class="list-appointments">
                <?php
                query_posts(array(
                    'post_type' => 'les_rendez_vous',
                    'showposts' => 6
                ));
                ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="item">
                        <div class="thumb" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                            <div class="logo">
                                <img src="<?= get_field('featured_image_2'); ?>" alt="CPAM">
                            </div>
                        </div>
                        <div class="content">
                            <p class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></p>
                            <p class="des"><?php echo get_the_excerpt(); ?></p>
                            <a href="#" class="btn-default"><i class="i-calendar"></i>Prendre rendez-vous</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="feature" style="background-image: url('<?= get_field('image_feature_1', 'option'); ?>')"></div>
    </div>
    <div class="block-infomations">
        <div class="wrapper">
            <div class="content">
                <h2><?= get_field('title_block_2', 'option'); ?></h2>
                <div class="list-address">
                    <?php
                    query_posts(array(
                        'post_type' => 'info_pratiques',
                        'showposts' => 2
                    ));
                    ?>
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
    <div class="block-events mt-0">
        <div class="wrapper">
            <div class="content">
                <h2><?= get_field('title_block_3', 'option'); ?></h2>
                <p class="des"><?= get_field('content_block_3', 'option'); ?></p>
                <a href="#" class="btn-arrow">Voir tous <i class="i-arrow-right"></i></a>
            </div>
            <div class="list-events">
                <?php
                query_posts(array(
                    'post_type' => 'les_evenements',
                    'showposts' => 3
                ));
                while (have_posts()) : the_post(); ?>
                    <div class="item">
                        <div class="left">
                            <div class="datetime"><span class="date"><?php echo custom_day(get_field('date_event')); ?></span><span class="month"><?php echo strtoupper(substr(get_field('date_event'),0,3)); ?></span></div>
                        </div>
                        <div class="right">
                            <p class="title"><?php echo str_replace(' | ', '<br />', get_the_title()); ?></p>
                            <div class="des">
                                <p class="time"><i class="i-clock"></i>De <?= custom_time(get_field('time_start')); ?> à <?= custom_time(get_field('time_end')); ?> </p>
                                <p><?php echo str_replace(' | ', '<br />', get_the_excerpt()); ?></p>
                            </div>
                        </div>
                        <a href="#" class="btn-default"><span>Fermer</span><span>Lire +</span></a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="block-clients">
        <div class="wrapper">
            <div class="list-logos">
                <?php 
                    $num_logo = count(get_field('client', 'option')) - 2;
                    while(!($num_logo < 0)){
                ?>
                <div>
                    <img src="<?= get_field('client', 'option')[$num_logo]["logo_client"]; ?>" alt="">
                </div>
                <?php $num_logo--; } ?>
            </div>
        </div>
    </div>
</main>
<!--END  Pull HTML here-->
<?php get_footer(); ?>