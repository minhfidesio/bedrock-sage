<?php wp_footer(); ?>

<?php
// Code Tracking before_closing_body
if (ACF_SUPPORT && get_field('before_closing_body', 'option'))
    the_field('before_closing_body', 'option');
?>
<footer id="footer" class="block-footer">
    <div class="wrapper">
        <a href="#" class="logo" title="Portail Gate"><img src="<?= get_field('logo_footer', 'option');?>" alt="Portail Gate logo"></a>
        <div class="contact">
            <a href="#" class="help"><i class="i-question"></i><span>Aide</span></a>
            <a href="mailto:" class="mail"><i class="i-email"></i><span>Contact</span></a>
        </div>
        <div class="copyright">
            <p><a href="#">Mentions légales et politique de gestion des données</a></p>
            <p>© Guichet Accueil des Talents Étrangers</p>
        </div>
    </div>
</footer>
</body>

</html>