<?php
$appointments = get_field('appointments');
// Get Partenaire
if (($partenaires = get_transient('pg_home_partenaires')) === FALSE) :
    $now = intval(Date('Ymd'));

    $args = array(
        'post_type'         => 'partenaire',
        'posts_per_page'    => -1,
        'post_status'       => 'publish',
        // 'meta_query' => array(
        //     array(
        //         'key'     => '_partner_location_id',
        //         'value'   => '-1',
        //         'compare' => '!=',
        //     ),
        // ),
    );

    $partenaires = new WP_Query($args);

    set_transient('pg_home_partenaires', $partenaires, 6 * HOUR_IN_SECONDS);
endif;
?>
<?php if ($partenaires->have_posts()) : ?>
    <div class="block-appointments">
        <div class="wrapper">
            <h2 class="is-slick-control"><button class="slick-prev slick-arrow"><i class="i-arrow-left"></i></button><?= $appointments['title'] ?><button class="slick-next slick-arrow"><i class="i-arrow-right"></i></button></h2>
            <div class="list-appointments">
                <?php while ( $partenaires->have_posts() ) : $partenaires->the_post(); ?>
                    <?php get_template_part('template-parts/blocks/partners-appointments/item-partner') ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
        <div class="feature" style="background-image: url('<?= $appointments['background_image'] ?>')"></div>
    </div>
<?php endif; ?>