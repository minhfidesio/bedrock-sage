<div id="search" class="block-search">
    <form action="<?= home_url() ?>" class="form-default form-search" method="get">
        <div class="input-wrap">
            <input id="input-s" type="text" name="s" placeholder="<?= esc_html__('Recherche', DOMAIN) ?>" class="input-field">
            <label class="input-label" for="input-s">
                <button class="btn-submit" type="submit"></button>
                <span class="input-label-content"><?= esc_html__('Recherche', DOMAIN) ?></span>
            </label>
        </div>
    </form>
</div>