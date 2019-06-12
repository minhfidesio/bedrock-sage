<?php
$time = get_field('time');
$de_time = isset($time['de']) ? str_replace(':', 'h', $time['de']) : '';
$a_time = isset($time['a']) ? str_replace(':', 'h', $time['a']) : '';
$time_string = event_get_time($de_time, $a_time);

$date = get_field('date');
$date = date_i18n( "j-M", strtotime( $date ) );
$date = explode('-', $date);
?>

<div class="item">
    <div class="left">
        <div class="datetime">
            <span class="date"><?= $date[0] ?></span>
            <span class="month" style="text-transform: uppercase;"><?= $date[1] ?></span>
        </div>
    </div>

    <div class="right">
        <p class="title"><?= get_the_title() ?></p>
        <div class="des">
            <?php if ( $time_string ) : ?>
                <p class="time"><i class="i-clock"></i><?= $time_string ?></p>
            <?php endif; ?>
            <p><?= get_field('description') ?></p>
        </div>
    </div>

    <a href="#" class="btn-default">
        <span><?= esc_html__('Fermer', DOMAIN) ?></span>
        <span><?= esc_html__('Lire +', DOMAIN) ?></span>
    </a>
</div>