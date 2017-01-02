<?php

abstract class MyShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = '';

    /**
     * Create a new instance.
     */
    public function __construct()
    {
        add_shortcode(static::TAG, $this);
    }

    /**
     * Create and register the shortcode.
     *
     * @return $this
     */
    public static function register()
    {
        return new static;
    }

    /**
     * Invoke the class.
     *
     * @param  array  $attributes
     * @param  string  $content
     * @return string
     */
    public function __invoke($attributes, $content = '')
    {
        return $this->run($attributes, $content);
    }

    /**
     * Run shortcode.
     *
     * @param  array  $attributes
     * @param  string  $content
     * @return string
     */
    abstract protected function run($attributes, $content);
}
