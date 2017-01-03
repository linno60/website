<?php

include 'Includer.php';

Includer::includeDirectory(__DIR__.'/includes');

MyTheme::register();

/**
 * Determine if in local environment.
 *
 * @return bool
 */
function is_local_env()
{
    return 'local' === ENV;
}

/**
 * Render the main menu.
 *
 * @param  string  $location
 * @return string
 */
function get_menu($location = 'main')
{
    return wp_nav_menu([
        'container' => 'nav',
        'items_wrap' => '<ul>%3$s</ul>',
        'theme_location' => $location
    ]);
}

/**
 * Asset url.
 *
 * @param  string  $asset
 * @return string
 */
function get_asset_url($asset)
{
    if (is_local_env()) {
        return '/wp-content/themes/theme/assets/'.$asset;
    }

    return get_cdn_asset_url($asset);
}

/**
 * CDN asset url.
 *
 * @param  string  $asset
 * @return string
 */
function get_cdn_asset_url($asset)
{
    static $cdnBaseUrl = '';

    if ('' === $cdnBaseUrl) {
        $cdnBaseUrl = cdn_asset_base_url();
    }

    return $cdnBaseUrl.$asset;
}

/**
 * CDN asset base url.
 *
 * @return string
 */
function cdn_asset_base_url()
{
    $blogUrl = parse_url(get_bloginfo('url'));

    return $blogUrl['scheme']
          .'://cdn.'
          .$blogUrl['host']
          .'/website/';
}

/**
 * Insert template.
 *
 * @return void
 */
function insert_template($name)
{
    include __DIR__.'/templates/'.$name.'.php';
}

/**
 * Current category permalink
 *
 * @return string
 */
function get_category_permalink()
{
    return get_category_link(get_cat_ID(single_cat_title('', false)));
}
