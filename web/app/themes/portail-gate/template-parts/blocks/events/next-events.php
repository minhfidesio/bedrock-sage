<?php
if ( ($events = get_transient('pg_all_next_events')) === FALSE ) :
    $now = intval(Date('Ymd'));

    $args = array(
        'post_type' => 'evenement',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_query' => array(
            'event_date' => array(
                'key' => 'date',
                'value' => $now,
                'compare' => '>',
            ),
        ),
        'orderby'   => 'event_date',
        'order' => 'ASC'
    );

    $events = new WP_Query($args);

    set_transient( 'pg_all_next_events', $events, 6 * HOUR_IN_SECONDS );
endif;
?>

<div class="block-events is-full mt-0">
    <div class="wrapper">
        <div class="heading"><h2><?= esc_html__('Événements à venir', DOMAIN) ?></h2></div>
        <?php if ( $events->have_posts() ) : ?>
            <div class="list-events">
                <?php while ( $events->have_posts() ) : $events->the_post(); ?>
                    <?php get_template_part('template-parts/components/event') ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php else : ?>
            <p class="no-event"><?= get_field('text_no_events') ?></p>
        <?php endif; ?>
    </div>
</div>