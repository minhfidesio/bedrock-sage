<div class="block-feature mt-0">
    <?php get_template_part('template-parts/blocks/global/breadcrumbs') ?>
    <div class="content">
        <h1 class="title-5"><?= get_the_title() ?></h1>
        <div class="des">
            <?= get_field('description') ?>
            <?php get_template_part('template-parts/components/share-facebook') ?>
        </div>
    </div>
    <div class="feature" style="background-image: url('<?= get_the_post_thumbnail_url() ?>')"></div>
</div>