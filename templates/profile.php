<div class="profile" itemscope itemtype="http://schema.org/Person">
    <p>
        <a class="dont-print-url" href="<?php bloginfo('url') ?>">
            <img src="<?php echo get_theme_mod('profile_image') ?>" alt="profile image" draggable="false" height="100" width="100" itemprop="image">
        </a>
        <span itemprop="name">
            <a class="name dont-print-url" href="<?php bloginfo('url') ?>" itemprop="url">
                <?php bloginfo('name') ?>
            </a>
        </span>
    </p>
    <p itemprop="description">
        <?php bloginfo('description') ?>
    </p>
</div>
