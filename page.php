<?php get_header() ?>
<?php the_post() ?>
<div class="width-container section">
    <main itemscope itemtype="http://schema.org/WebPage">
        <meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d\TH:s') ?>">
        <meta itemprop="dateModified" content="<?php echo get_the_modified_date('Y-m-d\TH:s') ?>">
        <h1 itemprop="headline">
            <a href="<?php the_permalink() ?>" class="dont-print-url" itemprop="url">
                <?php the_title() ?>
            </a>
        </h1>
        <div itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
            <div itemprop="text"><?php the_content() ?></div>
        </div>
        <?php insert_template('profile') ?>
    </main>
</div>
<?php get_footer() ?>
