<?php get_header() ?>
<?php the_post() ?>
<article itemscope itemtype="http://schema.org/TechArticle">
    <h1 itemprop="headline">
        <a class="dont-print-url" href="<?php the_permalink() ?>" itemprop="url">
            <?php the_title() ?>
        </a>
    </h1>
    <time datetime="<?php echo get_the_date('Y-m-d\TH:s') ?>" itemprop="datePublished">
        <?php the_date() ?>
    </time>
    <meta itemprop="dateModified" content="<?php echo get_the_modified_date('Y-m-d\TH:s') ?>">
    <div class="box">
    	<strong>tl;dr;</strong>
    	<span itemprop="description"><?php echo get_the_excerpt() ?></span>
    </div>
    <div itemprop="articleBody" itemprop="mainContentOfPage">
        <?php the_content() ?>
    </div>
    <?php insert_template('profile') ?>
</article>
<?php get_footer() ?>
