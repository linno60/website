<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article>
            <h1 class="article-header">
                <a href="<?php the_permalink(); ?>" class="dont-print-url">
                    <?php the_title() ?>
                </a>
            </h1>
            <div class="meta">
                    <p><?php the_date() ?></p>
            </div>
            <div class="tldr">
            	<strong>TLDR;</strong>
            	<?php echo get_the_excerpt() ?>
            </div>
            <div class="content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<div class="profile">
	<p>
		<a class="dont-print-url" href="//timacdonald.me">
			<img src="//cdn.timacdonald.me/uploads/profile-pic.png" alt="Tim MacDonald profile image" draggable="false" height="100" width="100">
		</a>
		<a class="simple-title dont-print-url" href="//timacdonald.me">Tim MacDonald</a>
	</p>
	Software developer, musican and chill enthusiast.
</div>
<?php get_footer(); ?>