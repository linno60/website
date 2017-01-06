<!doctype html>
<html lang="en-au"<?php if (is_amp()) : ?> amp class="is-amp"<?php endif ?>>
    <head>
        <meta charset="utf-8">
        <?php if (is_amp()) : ?>
            <script async src="https://cdn.ampproject.org/v0.js"></script>
            <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
            <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
            <meta name="viewport" content="width=device-width,minimum-scale=1">
            <style amp-custom><?php echo get_asset_contents('theme.css') ?></style>
            <?php wp_head() ?>
            <?php insert_template('favicons') ?>
        <?php else: ?>
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <?php wp_head() ?>
            <link rel="amphtml" href="<?php echo get_amp_url() ?>">
            <?php insert_template('favicons') ?>
            <link rel="stylesheet" href="<?php echo get_asset_url('theme', 11, 'css') ?>">
        <?php endif; ?>
    </head>
    <body>
        <div class="width-container">
