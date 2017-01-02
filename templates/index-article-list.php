<?php if (have_posts()) : ?>
    <?php while (have_posts()) : ?>
        <?php the_post() ?>
        <?php insert_template('index-article') ?>
    <?php endwhile ?>
<?php endif ?>
