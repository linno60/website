<article class="index-article section" itemscope itemtype="http://schema.org/TechArticle">
    <h2 itemprop="headline">
        <a href="<?php the_permalink() ?>" class="dont-print-url" itemprop="url">
            <?php the_title() ?>
        </a>
    </h2>
    <time datetime="<?php echo get_the_date('Y-m-d\TH:s') ?>" itemprop="datePublished">
        <?php the_date() ?>
    </time>
    <div itemprop="description"><?php the_excerpt() ?></div>
</article>
