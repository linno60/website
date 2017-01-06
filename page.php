<?php get_header() ?>
<?php the_post() ?>
<main>
    <h1>
        <a href="<?php the_permalink() ?>" class="dont-print-url">
            <?php the_title() ?>
        </a>
    </h1>
    <?php the_content() ?>
</main>
<?php insert_template('footer') ?>
<?php get_footer() ?>
