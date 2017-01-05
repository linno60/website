<?php get_header() ?>
<?php the_post() ?>
<article itemscope itemtype="http://schema.org/TechArticle">
    <h1 itemprop="headline">
        <a class="dont-print-url" href="<?php the_permalink() ?>">
            <?php the_title() ?>
        </a>
    </h1>
    <time datetime="<?php echo get_the_date('Y-m-d\TH:s') ?>" itemprop="datePublished">
        <?php the_date() ?>
    </time>
    <div class="box" itemprop="about">
    	<strong>TLDR;</strong>
    	<span itemprop="description"><?php echo get_the_excerpt() ?></span>
    </div>
    <div itemprop="articleBody">
        <?php the_content() ?>
    </div>
</article>
<?php insert_template('footer') ?>
<?php get_footer() ?>
