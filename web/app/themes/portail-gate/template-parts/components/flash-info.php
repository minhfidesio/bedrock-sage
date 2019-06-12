<?php $flash_info = get_field('flash_info'); ?>

<div id="info" class="info">
    <a href="#" class="btn-close" title="Close" data-close="#info"><i class="i-close"></i></a>
    <span class="icon">
        <i class="i-alert"></i>
    </span>
    <p class="title"><?= $flash_info['title'] ?></p>
    <p class="des"><?= $flash_info['content'] ?></p>
</div>