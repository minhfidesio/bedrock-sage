<?php
/**
 * Template Name: CMS Page
 */
get_header();
?>
    <!--Start Pull HTML here-->
    <main id="main-content" class="main">
        <?php get_template_part('template-parts/blocks/cms/banner') ?>
        <?php get_template_part('template-parts/blocks/cms/content') ?>
    </main>
    <!--END  Pull HTML here-->
<?php get_footer(); ?>