<?php

class MyInlineCodeShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'code';

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

        return '<code class="inline-code">'.$code.'</code>';
    }
}
