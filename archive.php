<?php get_header() ?>
<div class="width-container section">
    <h1>
        <a href="<?php echo get_category_permalink() ?>">
            <?php single_term_title() ?>
        </a>
    </h1>
    <?php insert_template('index-article-list') ?>
</div>
<?php get_footer() ?>
