<?php get_header() ?>
<div class="profile main-profile">
	<a href="<?php bloginfo('url') ?>">
		<<?php if (is_amp()) : ?>amp-img<?php else : ?>img<?php endif ?> src="<?php echo get_theme_mod('profile_image') ?>" class="img" alt="profile image" draggable="false" height="200" width="200"><?php if (is_amp()) : ?></amp-img><?php endif; ?>
	</a>
	<h1>
		<a href="<?php bloginfo('url') ?>">
            <?php bloginfo('name') ?>
        </a>
	</h1>
	<p>
		<?php bloginfo('description') ?>
	</p>
	&middot; &middot; &middot;
</div>
<?php insert_template('index-article-list') ?>
<footer>
	<?php insert_template('menu') ?>
</footer>
<?php get_footer() ?>
