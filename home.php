<?php get_header() ?>
<header class="profile main-profile" itemscope itemtype="http://schema.org/Person">
	<meta itemprop="alternateName" content="TiMacDonald">
    <meta itemprop="sameAs" content="https://twitter.com/timacdonald87">
	<a href="<?php bloginfo('url') ?>" class="profile-img-link">
		<<?php if (is_amp()) : ?>amp-img<?php else : ?>img<?php endif ?> src="<?php echo get_theme_mod('profile_image') ?>" class="img" alt="profile image" draggable="false" height="125" width="125" itemprop="image"><?php if (is_amp()) : ?></amp-img><?php endif; ?>
	</a>
	<h1>
		<a href="<?php bloginfo('url') ?>" itemprop="url">
            <?php bloginfo('name') ?>
        </a>
	</h1>
	<p itemprop="description">
		<?php bloginfo('description') ?>
	</p>
	&middot; &middot; &middot;
</header>
<main>
	<?php insert_template('index-article-list') ?>
</main>
<?php get_footer() ?>
