<?php
//var_dump(get_row_layout());
if ( get_row_layout() == 'bloc_wysiwyg' ) :
    get_template_part('template-parts/blocks/gate/content', 'layout_wysiwyg');
elseif ( get_row_layout() == 'bloc_image' ) :
    get_template_part('template-parts/blocks/gate/content', 'layout_image');
endif;
