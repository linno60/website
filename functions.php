<?php

$content_width = 700;

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head','feed_links', 2);
remove_action('wp_head','feed_links_extra', 3);

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

// Register shortcodes
function php_shortcode($atts, $content = null)
{
    return '<pre><code class="language-php">&lt;?php

'.strip_tags($content).'</code></pre>';
}

add_shortcode('php', 'php_shortcode');

// add_filter( 'the_content', 'tgm_io_shortcode_empty_paragraph_fix' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
// function tgm_io_shortcode_empty_paragraph_fix( $content ) {

//     $array = array(
//         '<p>['    => '[',
//         ']</p>'   => ']',
//         ']<br />' => ']'
//     );
//     return strtr( $content, $array );

// }

// function remove_auto_p_in_shortcode_formatter($content) {
//     $new_content = '';
//     $pattern_full = '{(\[php\].*?\[/php\])}is';
//     $pattern_contents = '{\[php\](.*?)\[/php\]}is';
//     $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

//     foreach ($pieces as $piece) {
//         if (preg_match($pattern_contents, $piece, $matches)) {
//             $new_content .= $matches[1];
//         } else {
//             $new_content .= wptexturize(wpautop($piece));
//         }
//     }
//     return $new_content;
// }

// add_filter('the_content', 'remove_auto_p_in_shortcode_formatter', 99);
