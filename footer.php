        </div>
        <?php if (is_amp()) : ?>
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
        <?php else : ?>
            <?php if (is_admin() || is_local_env()) : ?>
                <script>window.dontTrack = true</script>
                <script async src="<?php echo get_asset_url('local.js') ?>"></script>
            <?php endif ?>
            <script async src="<?php echo get_asset_url('theme', 13, 'js') ?>"></script>
        <?php endif ;?>
        <?php wp_footer() ?>
    </body>
</html>
