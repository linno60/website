<?php get_header() ?>
<div class="profile main-profile">
	<a href="<?php bloginfo('url') ?>">
		<img src="<?php echo get_theme_mod('profile_image') ?>" alt="profile image" draggable="false" height="200" width="200">
	</a>
	<h1>
		<a href="<?php bloginfo('url') ?>">
            <?php bloginfo('name') ?>
        </a>
	</h1>
	<p><?php bloginfo('description') ?></p>
	&middot; &middot; &middot;
</div>
<?php insert_template('index-article-list') ?>
<footer>
	<?php insert_template('menu') ?>
</footer>
<?php get_footer() ?>
