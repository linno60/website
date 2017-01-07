<?php

class MyTheme
{
    const CONTENT_WIDTH = 700;
    /**
     * Create a new instance.
     *
     * @param
     */
    public function __construct()
    {
        $this->cleanFooter()
             ->removeSchemaOrg()
             ->setContentWidth()
             ->setThemeFeatures()
             ->removeHeadActions()
             ->registerShortcodes()
             ->removeMenuAttributes()
             ->removePrintStylesActions()
             ->registerCustomiserOptions()
             ->removeTemplateRedirectActions();
    }

    /**
     * Remove schema.org stuff.
     *
     * @return $this
     */
    protected function removeSchemaOrg()
    {
        add_filter('wpseo_json_ld_output', function () {
            return [];
        }, 10, 1);

        return $this;
    }

    /**
     * Remove default menu classes.
     *
     * @return $this
     */
    protected function removeMenuAttributes()
    {
        add_filter('nav_menu_css_class', function ($classes) {
            if (in_array('current-menu-item', $classes)) {
                return ['current'];
            }

            return [];
        });

        add_filter('nav_menu_item_id', function ($id) {
            return null;
        });

        return $this;
    }

    /**
     * Register customiser options.
     *
     * @return $this
     */
    protected function registerCustomiserOptions()
    {
        add_action('customize_register', function ($customiser) {
            $customiser->add_setting('profile_image');
            $customiser->add_control($this->profileImageControl($customiser));
        });

        return $this;
    }

    /**
     * Profile image control.
     *
     * @param  WP_Customize_Manager  $customiser
     * @return WP_Customize_Image_Control
     */
    protected function profileImageControl($customiser)
    {
        return new WP_Customize_Image_Control($customiser, 'profile_image', [
          'label' => 'Profile Image',
          'section' => 'title_tagline'
        ]);
    }

    /**
     * Register shortcodes.
     *
     * @return $this
     */
    protected function registerShortcodes()
    {
        MyUpdateShortcode::register();
        MyCodeBlockShortcode::register();
        MyCodeOutputShortcode::register();
        MyInlineCodeShortcode::register();
        MyClassHighlighterShortcode::register();
        MyKeywordHighlighterShortcode::register();

        add_filter('the_content', function ($content) {
            return strtr($content, [
                '<p>[' => '[',
                ']</p>' => ']',
                ']<br />' => ']'
            ]);
        });

        return $this;
    }

    /**
     * Register theme.
     *
     */
    public static function register()
    {
        return new static;
    }

    /**
     * Set content width.
     *
     * @return $this
     */
    protected function setContentWidth()
    {
        global $content_width;

        $content_width = static::CONTENT_WIDTH;

        return $this;
    }

    /**
     * Set theme options.
     *
     * @return $this
     */
    protected function setThemeFeatures()
    {
        add_action('after_setup_theme', function () {
            add_theme_support('title-tag');
            register_nav_menu('main', 'Websites main menu');
        });

        return $this;
    }

    /**
     * Remove head actions.
     *
     * @return $this
     */
    protected function removeHeadActions()
    {
        add_action('wp_enqueue_scripts', function () {
            remove_action('wp_head', 'rsd_link');
            remove_action('wp_head', 'wp_generator');
            remove_action('wp_head','feed_links', 2);
            remove_action('wp_head', 'wlwmanifest_link');
            remove_action('wp_head','feed_links_extra', 3);
            remove_action('wp_head', 'wp_resource_hints', 2);
            remove_action('wp_head', 'wp_shortlink_wp_head', 10);
            remove_action('wp_head', 'rest_output_link_wp_head', 10);
            remove_action('wp_head', 'wp_oembed_add_discovery_links');
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
        });

        return $this;
    }

    /**
     * Remove print styles actions.
     *
     * @return $this
     */
    protected function removePrintStylesActions()
    {
        add_action('wp_enqueue_scripts', function () {
            remove_action('wp_print_styles', 'print_emoji_styles');
        });

        return $this;
    }

    /**
     * Remove template redirect actions.
     *
     * @return $this
     */
    protected function removeTemplateRedirectActions()
    {
        add_action('template_redirect', function () {
            remove_action('template_redirect', 'wp_shortlink_header', 11);
            remove_action('template_redirect', 'rest_output_link_header', 11);
        });

        return $this;
    }

    /**
     * Clean footer.
     *
     * @return $this
     */
    protected function cleanFooter()
    {
        add_action('wp_footer', function () {
            if (!is_admin()) {
                wp_deregister_script('wp-embed');
            }
        });

        return $this;
    }
}
