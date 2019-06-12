<?php
$number_posts = 6;

if ( ($pass_events = get_transient('pg_six_pass_events')) === FALSE ) :
    $now = intval(Date('Ymd'));

    $args = array(
        'post_type' => 'evenement',
        'posts_per_page' => $number_posts,
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

    $pass_events = new WP_Query($args);

    set_transient( 'pg_six_pass_events', $pass_events, 6 * HOUR_IN_SECONDS );
endif;
?>

<?php if ( $pass_events->have_posts() ) : ?>
    <div class="block-events is-past is-full mt-0">
        <div class="wrapper">
            <div class="heading"><h2><?= esc_html__('Événements passés', DOMAIN) ?></h2></div>
            <div class="list-events">
                <?php while ( $pass_events->have_posts() ) : $pass_events->the_post(); ?>
                    <?php get_template_part('template-parts/components/event') ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>

            <?php if ( $pass_events->found_posts > $number_posts ) : ?>
                <div class="loadmore"
                     load-posts="<?= $number_posts ?>"
                     number-posts="<?= $number_posts ?>"
                     max-posts="<?= $pass_events->found_posts ?>">
                    <a href="javascript:void(0)" title="Load more">
                        <i class="i-arrow-down"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php
    add_action( 'wp_footer', 'pass_events_scripts', 100, 1 );
    function pass_events_scripts(){
        ?>
        <script defer>
            jQuery(document).ready(function ($) {
                $('.block-events .loadmore i').on('click', function () {
                    var _this = $(this), parent = _this.closest('.loadmore');
                    var offset = parseInt(parent.attr('load-posts'));
                    var number = parseInt(parent.attr('number-posts'));
                    var max = parseInt(parent.attr('max-posts'));
                    $.ajax({
                        url : script_loc.ajax_url,
                        type : 'post',
                        data : {
                            action : 'load_more_six_pass_events',
                            offset: offset,
                            number: number,
                        },
                        beforeSend: function() {
                            parent.addClass('loadding');
                        },
                        success : function( response ) {
                            parent.siblings('.list-events').append(response);
                            if ( ( offset + number ) < max ) {
                                parent.attr('load-posts', offset + number);
                                parent.removeClass('loadding');
                            } else {
                                parent.removeClass('loadding');
                                parent.children().remove();
                            }
                            portail.eventClick();
                        }
                    });

                });
            });
        </script>
        <?php
    } ?>
<?php endif;
