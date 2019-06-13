<?php if ( have_rows('content') ) : ?>
<div class="block-content-page">
    <?php
    while ( have_rows('content') ) : the_row();
        if ( get_row_layout() == 'bloc_wysiwyg' ) :
            get_template_part('template-parts/blocks/content/content', 'wysiwyg');
        elseif ( get_row_layout() == 'bloc_wysiwyg_background' ) :
            get_template_part('template-parts/blocks/content/content', 'wysiwyg_background');
        elseif ( get_row_layout() == 'bloc_image' ) :
            get_template_part('template-parts/blocks/content/content', 'image');
        elseif ( get_row_layout() == 'bloc_statistic' ) :
            get_template_part('template-parts/blocks/content/content', 'statistic');
        endif;
    endwhile;
    ?>
</div>
<?php endif; ?>