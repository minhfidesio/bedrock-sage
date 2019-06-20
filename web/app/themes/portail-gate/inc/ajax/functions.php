<?php if (! defined('APP_PATH')) die ('Bad requested!');

// load_more_six_pass_events
add_action( 'wp_ajax_nopriv_load_more_six_pass_events', 'load_more_six_pass_events' );
add_action( 'wp_ajax_load_more_six_pass_events', 'load_more_six_pass_events' );
function load_more_six_pass_events() {
    ob_start();
    // GET DATA
    $now = intval(Date('Ymd'));

    $args = array(
        'post_type' => 'evenement',
        'posts_per_page' => $_POST['number'],
        'offset' => $_POST['offset'],
        'post_status' => 'publish',
        'meta_query' => array(
            'event_date' => array(
                'key' => 'date',
                'value' => $now,
                'compare' => '<=',
            ),
        ),
        'orderby' => array(
            'event_date' => 'DESC',
        ),
    );

    $ajax_pass_events = new WP_Query( $args );

    while ( $ajax_pass_events->have_posts() ) : $ajax_pass_events->the_post();
        get_template_part('template-parts/components/event');
    endwhile;
    wp_reset_query();

    $content = ob_get_clean();

    echo $content;

    die();
}


// load_data_partner_from_location
add_action( 'wp_ajax_nopriv_load_data_partner_from_location', 'load_data_partner_from_location' );
add_action( 'wp_ajax_load_data_partner_from_location', 'load_data_partner_from_location' );
function load_data_partner_from_location() {
    $partenaireid =  $_POST['partenaireid'];

    $partenaireid = $partenaireid == -1 ? 'all' : $partenaireid;
    
    ob_start();

    if ( ($partenaires = get_transient('pg_' . $partenaireid . '_partenaires')) === FALSE ) :
        // GET DATA
        $args = array(
            'post_type'         => 'partenaire',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
        );

        if ( $partenaireid == 1 ) :
            $args['meta_query'] = array(
                array(
                    'key'     => '_partner_location_id',
                    'value'   => '-1',
                    'compare' => '!=',
                ),
            );
        elseif ( $partenaireid == 0 ) :
            $args['meta_query'] = array(
                array(
                    'key'     => '_partner_location_id',
                    'value'   => '-1',
                    'compare' => '=',
                ),
            );
        endif;

        $partenaires = new WP_Query($args);

        set_transient( 'pg_' . $partenaireid . '_partenaires', $partenaires, 6 * HOUR_IN_SECONDS );
    endif;

    while ( $partenaires->have_posts() ) : $partenaires->the_post();
        get_template_part('template-parts/blocks/partners-appointments/item-partner');
    endwhile;
    wp_reset_query();

    $content = ob_get_clean();

    echo $content;
    die();
}