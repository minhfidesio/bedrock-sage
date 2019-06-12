<div class="block-statistic mt-0">
    <div class="wrapper">
        <div class="content">
            <h2><?= get_sub_field('title') ?></h2>
            <p class="des"><?= get_sub_field('description') ?></p>
            <?php $button = get_sub_field('button'); ?>
            <a href="<?= $button['url'] ?>" class="btn-arrow" target="<?= $button['target'] ?>"><?= $button['title'] ?> <i class="i-arrow-right"></i></a>
        </div>
        <?php if ( have_rows('item') ) : ?>
            <div class="list-statistic">
                <?php while ( have_rows('item') ) : the_row(); ?>
                    <div class="item">
                        <span class="icon"><i class="i-<?= get_sub_field('icon') ?>"></i></span>
                        <span class="num"><?= get_sub_field('number') ?></span>
                        <span class="title"><?= get_sub_field('text') ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>