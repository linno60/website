<?php get_header() ?>
<?php the_post() ?>
<main>
    <h1>
        <a href="<?php the_permalink() ?>" class="dont-print-url">
            <?php the_title() ?>
        </a>
    </h1>
    <div>
        <?php the_content() ?>
    </div>
</main>
<?php insert_template('footer') ?>
<?php get_footer() ?>
