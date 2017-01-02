<?php get_header() ?>
<?php the_post() ?>
<article>
    <h1>
        <a class="dont-print-url" href="<?php the_permalink() ?>">
            <?php the_title() ?>
        </a>
    </h1>
    <time datetime="<?php echo get_the_date('Y-m-d\TH:s') ?>">
        <?php the_date() ?>
    </time>
    <div class="box">
    	<strong>TLDR;</strong>
    	<?php echo get_the_excerpt() ?>
    </div>
    <div class="content">
        <?php the_content() ?>
    </div>
</article>
<?php insert_template('footer') ?>
<?php get_footer() ?>
