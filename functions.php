<?php

$content_width = 700;

/**
 * Tidy <head> and http headers.
 *
 * @return void
 */
function tidyHeadAndHeaders()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_resource_hints', 2);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);
    remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action('template_redirect', 'wp_shortlink_header', 11);
    remove_action('template_redirect', 'rest_output_link_header', 11);
}

add_action('wp', 'tidyHeadAndHeaders');

/**
 * Cleanup scripts.
 *
 * @return void
 */
function scriptCleaup()
{
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}

add_action('wp_footer', 'scriptCleaup');

/**
 * Register theme features.
 *
 * @return void
 */
function themeFeatures()
{
    add_theme_support('title-tag');

    register_nav_menu('main-menu', 'Websites main menu');
}

add_action('after_setup_theme', 'themeFeatures');

/**
 *  Register 'php' shortcode.
 *
 * @param  $attributes  array
 * @param  $content  string
 * @return string
 */
function php_shortcode($attributes, $content = '')
{
    return '<pre><code class="language-php">&lt;?php

'.strip_tags($content).'</code></pre>';
}

add_shortcode('php', 'php_shortcode');

/**
 *  Register 'code' shortcode.
 *
 * @param  $attributes  array
 * @param  $content  string
 * @return string
 */
function code_shortcode($atts, $content = '')
{
    return '<code class="inline-code">'.$content.'</code>';
}

add_shortcode('code', 'code_shortcode');
