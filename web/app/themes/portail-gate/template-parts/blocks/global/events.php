<?php
query_posts(array(
    'post_type' => 'les_evenements',
    'showposts' => 3
)); 
?>
<div class="block-events mt-0">
    <div class="wrapper">
        <div class="content">
            <h2><?= get_field('title_block_3', 'option'); ?></h2>
            <p class="des"><?= get_field('content_block_3', 'option'); ?></p>
            <a href="#" class="btn-arrow">Voir tous <i class="i-arrow-right"></i></a>
        </div>
        <div class="list-events">
            <?php while (have_posts()) : the_post(); ?>
                <div class="item">
                    <div class="left">
                        <div class="datetime"><span class="date"><?php echo custom_day(get_field('date_event')); ?></span><span class="month"><?php echo strtoupper(substr(get_field('date_event'), 0, 3)); ?></span></div>
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