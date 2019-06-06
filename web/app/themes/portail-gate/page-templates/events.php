<?php
/**
 * Template Name: Les évènements Page
 */
get_header();
?>
    <!--Start Pull HTML here-->
    <main id="main-content" class="main">
        <?php get_template_part('template-parts/blocks/global/banner') ?>
        <?php get_template_part('template-parts/blocks/events/next-events') ?>
        <?php get_template_part('template-parts/blocks/events/pass-events') ?>
    </main>
    <!--END  Pull HTML here-->
<?php get_footer(); ?>