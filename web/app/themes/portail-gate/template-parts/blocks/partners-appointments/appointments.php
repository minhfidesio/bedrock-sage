<?php
    // Get Partenaire
    if ( ($partenaires = get_transient('pg_all_partenaires')) === FALSE ) :
        $now = intval(Date('Ymd'));

        $args = array(
            'post_type'         => 'partenaire',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
        );

        $partenaires = new WP_Query($args);

        set_transient( 'pg_all_partenaires', $partenaires, 6 * HOUR_IN_SECONDS );
    endif;
?>
<div class="block-appointments is-full mt-0">
    <div class="wrapper">
        <div class="block-filter">
            <form action="#" class="form-default form-search" method="get">
                <div class="radio-group">
                    <div class="form-group radio-wrap">
                        <input value="-1" type="radio" id="c1" name="partenaire_id" checked/>
                        <label for="c1"><?=__('Tous',DOMAIN)?></label>
                    </div>
                    <div class="form-group radio-wrap">
                        <input value="1" type="radio" id="has_calendar" name="partenaire_id" />
                        <label for="has_calendar"><?=esc_html__('Les RDVs', DOMAIN)?></label>
                    </div>
                    <div class="form-group radio-wrap">
                        <input value="0" type="radio" id="no_calendar" name="partenaire_id" />
                        <label for="no_calendar"><?=esc_html__('Les partenaires', DOMAIN)?></label>
                    </div>
                </div>
            </form>
        </div>
        
        <?php if ( $partenaires->have_posts() ) : ?>
            <div class="list-appointments list-appointments-data" style="min-height: 100px">
                <?php while ( $partenaires->have_posts() ) : $partenaires->the_post(); ?>
                    <?php get_template_part('template-parts/blocks/partners-appointments/item-partner') ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
        <?php endif; ?>
  
    </div>
</div>

<?php
add_action( 'wp_footer', 'partner_scripts', 100, 1 );
function partner_scripts(){
    ?>
    <script defer>
        /* Global variables and functions */
        var get_data_partner_list_page = (function ($, window, undefined) {
            'use strict';

            function get_data_partner_in_list_page(){
                $('input:radio[name=partenaire_id]').change(function () {
                    var selected_value = $("input[name='partenaire_id']:checked").val();
                    $.ajax({
                        url : script_loc.ajax_url,
                        type : 'post',
                        data : {
                            action  : 'load_data_partner_from_location',
                            partenaireid : selected_value
                        },
                        beforeSend: function() {
                            // Data Sent
                            $('.list-appointments-data').addClass('loadding');
                            $('.list-appointments-data').html("");
                        },
                        success : function( response ) {
                            //sent = true;
                            $('.list-appointments-data').removeClass('loadding');
                            $('.list-appointments-data').html(response);
                        }
                    });
                });
            }
            return {
                init: function () {
                    get_data_partner_in_list_page();
                }
            };
        }(jQuery, window));

        jQuery(document).ready(function ($) {
            get_data_partner_list_page.init();
        });
    </script>
    <?php
}