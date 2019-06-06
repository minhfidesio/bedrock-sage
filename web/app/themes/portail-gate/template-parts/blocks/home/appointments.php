<?php
query_posts(array(
    'post_type' => 'les_rendez_vous',
    'showposts' => 6
));
?>
<div class="block-appointments">
    <div class="wrapper">
        <h2 class="is-slick-control"><button class="slick-prev slick-arrow"><i class="i-arrow-left"></i></button><?= get_field('title_block_1', 'option'); ?><button class="slick-next slick-arrow"><i class="i-arrow-right"></i></button></h2>
        <div class="list-appointments">
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