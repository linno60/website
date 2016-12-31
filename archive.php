<?php get_header(); ?>
<h1><?php the_archive_title() ?></a></h1>
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