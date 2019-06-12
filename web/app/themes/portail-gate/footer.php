<?= get_template_part('template-parts/blocks/global/partner') ?>

<?= get_template_part('template-parts/blocks/global/footer') ?>

<?php wp_footer(); ?>

<link href="https://fonts.googleapis.com/css?family=Lato:400,500,600,700,800,900" rel="stylesheet">

<?php
// Code Tracking before_closing_body
if ( ACF_SUPPORT && get_field('before_closing_body', 'option') )
    the_field('before_closing_body', 'option');
?>

</body>
</html>