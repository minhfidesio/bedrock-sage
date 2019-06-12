<?php $block_partenaires = get_field('block_partenaires', 'option'); ?>

<?php if (isset($block_partenaires['partenaires']) && count($block_partenaires['partenaires']) > 0) : ?>
    <div class="block-clients">
        <div class="wrapper">
            <div class="list-logos">
                <?php foreach ($block_partenaires['partenaires'] as $item) :
                    $url_web = get_field("partenaires_website", $item);
                    $permalink = get_the_permalink($item);
                    $url = $url_web ? $url_web : $permalink;
                    ?>
                    <div>
                        <a href="<?= $url ?>" <?php if ($url_web) {echo 'target="_blank"';} ?>>
                            <img src="<?= get_the_post_thumbnail_url($item) ?>" alt="<?= get_the_title($item) ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
