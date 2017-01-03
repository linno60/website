<?php

abstract class MyCodeShortcode extends MyShortcode
{
    /**
     * Run shortcode.
     *
     * @param  array  $attributes
     * @param  string  $content
     * @return string
     */
    protected function run($attributes, $content)
    {
        $code = parent::run($attributes, $content);

        return trim(strip_tags($code, '<span>'));
    }
}
