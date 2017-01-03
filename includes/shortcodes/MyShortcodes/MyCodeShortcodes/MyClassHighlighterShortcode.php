<?php

class MyClassHighlighterShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'class';

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

        return '<span class="hljs-title">'.$code.'</span>';
    }
}
