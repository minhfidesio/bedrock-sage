<?php $testimonials = get_field('bloc_testimonials'); ?>
<?php if ( isset($testimonials['item']) && count($testimonials['item']) > 0 ) : ?>
    <div class="block-testimonials">
        <?php foreach ( $testimonials['item'] as $item ) : ?>
            <div class="item">
                <div class="thumb">
                    <?= wp_get_attachment_image( $item['image'], 'thumbnail' ) ?>
                </div>
                <div class="content">
                    <blockquote><p><?= $item['text'] ?></p></blockquote>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>