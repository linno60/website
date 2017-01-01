<?php

$content_width = 700;

/**
 * Tidy <head> and http headers.
 *
 * @return void
 */
function tidy_head_and_headers()
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

add_action('wp', 'tidy_head_and_headers');

/**
 * Cleanup scripts.
 *
 * @return void
 */
function script_cleaup()
{
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
	}
}

add_action('wp_footer', 'script_cleaup');

/**
 * Register theme features.
 *
 * @return void
 */
function theme_features()
{
    add_theme_support('title-tag');

    register_nav_menu('main-menu', 'Websites main menu');
}

add_action('after_setup_theme', 'theme_features');

/**
 *  Register 'php' shortcode.
 *
 * @param  $attributes  array
 * @param  $content  string
 * @return string
 */
function php_shortcode($attributes, $content = '')
{
    return '<pre><code class="code-block language-php">&lt;?php
'.strip_tags($content).'</code></pre>';
}

add_shortcode('php', 'php_shortcode');

/**
 *  Register 'php_output' shortcode.
 *
 * @param  $attributes  array
 * @param  $content  string
 * @return string
 */
function php_output_shortcode($attributes, $content = '')
{
    return '<pre><samp class="code-block language-php">'.strip_tags($content).'</samp></pre>';
}

add_shortcode('php_output', 'php_output_shortcode');

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
