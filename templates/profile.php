<div class="profile">
    <p>
        <a class="dont-print-url" href="<?php bloginfo('url') ?>">
            <<?php if (is_amp()) : ?>amp-img<?php else : ?>img<?php endif ?> src="<?php echo get_theme_mod('profile_image') ?>" class="img" alt="profile image" draggable="false" height="100" width="100">
        </a>
        <span>
            <a class="name dont-print-url" href="<?php bloginfo('url') ?>">
                <?php bloginfo('name') ?>
            </a>
        </span>
    </p>
    <p>
        <?php bloginfo('description') ?>
    </p>
</div>
