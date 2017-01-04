        </div>
        <?php wp_footer() ?>
        <?php if (is_admin() || is_local_env()) : ?>
            <script>window.dontTrack = true</script>
            <script async src="<?php echo get_asset_url('local.js') ?>"></script>
        <?php endif ?>
        <script async src="<?php echo get_asset_url('theme', 12, 'js') ?>"></script>
    </body>
</html>
