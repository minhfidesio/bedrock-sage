<div class="block-content-page">
    <div class="wrapper">
        
        <?php if ( have_rows('content_top') ) : ?>
            <div class="editor-cms">
                <?php
                while ( have_rows('content_top') ) : 
                    $acf_repeater_field = get_field('content_top');
                    if( !empty($acf_repeater_field)) {
                        the_row();
                        get_template_part('template-parts/blocks/gate/content', 'layout');
                    } else {
                        break;
                    }
                    
                endwhile;
                ?>
            </div>
        <?php endif; ?>
        
        <?php get_template_part('template-parts/blocks/gate/testimonials') ?>

        <?php if ( have_rows('content_bottom') ) : ?>
            <div class="editor-cms">
                <?php
                while ( have_rows('content_bottom') ) : the_row();
                    get_template_part('template-parts/blocks/gate/content', 'layout');
                endwhile;
                ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    if( have_rows('bloc_statistic') ):
        while( have_rows('bloc_statistic') ): the_row();
            get_template_part('template-parts/blocks/content/content', 'statistic');
        endwhile;
    endif;
    ?>
</div>