        </div>
        <?php wp_footer() ?>
        <script src="<?php echo get_asset_url('theme.10.js') ?>"></script>
        <?php if (is_local_env()) : ?>
            <script src="<?php echo get_asset_url('local.js') ?>"></script>
        <?php endif ?>
    </body>
</html>
