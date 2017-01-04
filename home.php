<?php get_header() ?>
<div class="profile main-profile" itemscope itemtype="http://schema.org/Person">
	<a href="<?php bloginfo('url') ?>">
		<img src="<?php echo get_theme_mod('profile_image') ?>" alt="profile image" draggable="false" height="200" width="200" itemprop="image">
	</a>
	<h1 itemprop="name">
		<a href="<?php bloginfo('url') ?>" itemprop="url">
            <?php bloginfo('name') ?>
        </a>
	</h1>
	<p itemprop="description">
		<?php bloginfo('description') ?>
	</p>
	&middot; &middot; &middot;
</div>
<?php insert_template('index-article-list') ?>
<footer>
	<?php insert_template('menu') ?>
</footer>
<?php get_footer() ?>
