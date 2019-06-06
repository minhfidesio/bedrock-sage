<div class="block-clients">
    <div class="wrapper">
        <div class="list-logos">
            <?php
            $num_logo = count(get_field('client', 'option')) - 2;
            while (!($num_logo < 0)) {
                ?>
                <div>
                    <img src="<?= get_field('client', 'option')[$num_logo]["logo_client"]; ?>" alt="">
                </div>
                <?php $num_logo--;
            } ?>
        </div>
    </div>
</div>