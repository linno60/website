<aside class="profile" itemprop="author" itemscope itemtype="http://schema.org/Person">
    <meta itemprop="alternateName" content="TiMacDonald">
    <meta itemprop="sameAs" content="https://twitter.com/timacdonald87">
    <p>
        <a class="dont-print-url" href="<?php bloginfo('url') ?>">
            <<?php if (is_amp()) : ?>amp-img<?php else : ?>img<?php endif ?> src="<?php echo get_theme_mod('profile_image') ?>" class="img" alt="profile image" draggable="false" height="100" width="100" itemprop="image">
        </a>
        <a class="name dont-print-url" href="<?php bloginfo('url') ?>" itemprop="url">
            <span itemprop="name"><?php bloginfo('name') ?></span>
        </a>
    </p>
    <p itemprop="description">
        <?php bloginfo('description') ?>
    </p>
</aside>
