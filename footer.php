        </div>
        <footer>
            <?php insert_template('menu') ?>
        </footer>
        <?php if (is_local_env()) : ?>
            <script async src="<?php echo get_asset_url('local.js') ?>"></script>
        <?php endif ?>
        <?php if (is_local_env() || is_admin()) : ?>
            <script>window.dontTrack = true</script>
        <?php endif ?>
        <?php if (!is_amp()) : ?>
            <script async src="<?php echo get_asset_url('theme', 13, 'js') ?>"></script>
        <?php endif ?>
        <?php if (is_amp() && !is_local_env()) : ?>
            <amp-analytics type="googleanalytics" id="analytics">
                <script type="application/json">
                    {
                      "vars": {
                        "account": "UA-89608436-2"
                      },
                      "triggers": {
                        "trackPageview": {
                          "on": "visible",
                          "request": "pageview"
                        }
                      }
                    }
                </script>
            </amp-analytics>
        <?php endif ;?>
        <?php wp_footer() ?>
    </body>
</html>
