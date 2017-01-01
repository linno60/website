<!doctype html>
<html lang="en-au">
    <head>
        <meta charset="utf-8">
        <?php wp_head() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#4342a0">
        <meta name="theme-color" content="#4342a0">
        <?php if ('local' === ENV) : ?>
            <link rel="stylesheet" href="//timacdonald.dev/wp-content/themes/theme/assets/theme.css">
        <?php else : ?>
            <link rel="stylesheet" href="//cdn.timacdonald.me/website/theme.css?v=3">
        <?php endif ?>
    </head>
    <body>
        <div class="width-container">
