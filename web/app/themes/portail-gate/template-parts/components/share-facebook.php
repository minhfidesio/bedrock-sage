<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink() ?>" class="btn-link fb-share" target="_blank">
    <?= esc_html__('Partager sur Facebook', DOMAIN) ?>
    <i class="i-facebook"></i>
</a>

<?php
add_action( 'wp_footer', 'fb_share_scripts', 100, 1 );
function fb_share_scripts(){
    ?>
    <script defer>
        jQuery(document).ready(function($) {
            $('.fb-share').click(function(e) {
                e.preventDefault();
                window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
                return false;
            });
        });
    </script>
    <?php
}