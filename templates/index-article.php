<article class="index-article">
    <h2>
        <a href="<?php the_permalink() ?>" class="dont-print-url">
            <?php the_title() ?>
        </a>
    </h2>
    <time datetime="<?php echo get_the_date('Y-m-d\TH:s') ?>">
        <?php the_date() ?>
    </time>
    <?php the_excerpt() ?>
</article>
