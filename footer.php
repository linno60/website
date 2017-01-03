        </div>
        <?php wp_footer() ?>
        <script async src="<?php echo get_asset_url('theme', 12, 'js') ?>"></script>
        <?php if (is_local_env()) : ?>
            <script async src="<?php echo get_asset_url('local.js') ?>"></script>
        <?php endif ?>
    </body>
</html>
