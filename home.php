<?php get_header(); ?>
<div class="profile">
	<a href="//timacdonald.me">
		<img src="//cdn.timacdonald.me/uploads/profile-pic.png" alt="Tim MacDonald profile image" draggable="false" height="200" width="200">
	</a>
	<h1>
		<a href="//timacdonald.me">Tim MacDonald</a>
	</h1>
	<div>Software developer, musican and chill enthusiast.</div>
	. . .
</div>
<?php if (have_posts()) : ?>
    <div class="list">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article>
                <h2 class="article-header">
                    <a href="<?php the_permalink(); ?>" class="dont-print-url">
                        <?php the_title() ?>
                    </a>
                </h2>
                <div class="meta">
                    <?php the_date() ?>
                </div>
                <div class="excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php get_footer(); ?>