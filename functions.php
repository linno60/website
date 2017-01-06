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
    $html = wp_nav_menu([
        'echo' => false,
        'container' => null,
        'theme_location' => $location,
        'items_wrap' => '<ul>%3$s</ul>'
    ]);

    return '<nav>'.$html.'</nav>';
}

/**
 * Asset url.
 *
 * @param  string  $asset
 * @param  mixed  $version
 * @param  string  $version
 * @return string
 */
function get_asset_url($asset, $version = null, $extension = '')
{
    if (is_local_env()) {

        $filename = (null === $version) ? $asset : implode('.', [$asset, $extension]);

        return '/wp-content/themes/theme/assets/'.$filename;
    }

    $filename = (null === $version) ? $asset : implode('.', [$asset, $version, $extension]);

    return get_cdn_asset_url($filename);
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

/**
 * Determine if AMP access.
 *
 * @return bool
 */
function is_amp()
{
    return isset($_GET['amp']);
}

/**
 * Asset contents.
 *
 * @return string
 */
function get_asset_contents($asset)
{
    return file_get_contents(__DIR__.'/assets/'.$asset);
}

/**
 * Current base url.
 *
 * @return string
 */
function get_base_url()
{
    $url = parse_url('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    return $url['scheme'].'://'.$url['host'].$url['path'];
}

/**
 * Non amp current url.
 *
 * @return string
 */
function get_non_amp_url()
{
    return get_base_url().get_non_amp_query_string();
}

/**
 * Current url as amp.
 *
 * @return string
 */
function get_amp_url()
{
     return get_base_url().get_amp_query_string();
}

/**
 * Non amp query string.
 *
 * @return string
 */
function get_non_amp_query_string()
{
    $parameters = $_GET;

    unset($parameters['amp']);

    if ([] === $parameters) {
        return '';
    }

    return '?'.http_build_query($parameters);
}

/**
 * Amp query string.
 *
 * @return string
 */
function get_amp_query_string()
{
    $parameters = $_GET;

    $parameters['amp'] = 1;

    return '?'.http_build_query($parameters);
}
