<?php
if ( ($events = get_transient('pg_three_next_events')) === FALSE ) :
    $now = intval(Date('Ymd'));

    $args = array(
        'post_type' => 'evenement',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        // 'meta_query' => array(
        //     'event_date' => array(
        //         'key' => 'date',
        //         'value' => $now,
        //         'compare' => '>',
        //     ),
        // ),
        'orderby'   => 'event_date',
        'order' => 'ASC'
    );

    $events = new WP_Query($args);

    set_transient( 'pg_three_next_events', $events, 6 * HOUR_IN_SECONDS );
endif;
?>

<?php if ( $events->have_posts() ) : ?>
<div class="list-events">
    <?php while ( $events->have_posts() ) : $events->the_post(); ?>
        <?php get_template_part('template-parts/components/event') ?>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</div>
<?php endif;
