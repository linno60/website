<?php get_header() ?>
<h1>
    <a href="<?php echo get_category_permalink() ?>">
        <?php single_term_title() ?>
    </a>
</h1>
<?php insert_template('index-article-list') ?>
<?php get_footer() ?>
