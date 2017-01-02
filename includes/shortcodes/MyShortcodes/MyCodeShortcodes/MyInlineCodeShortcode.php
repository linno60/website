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
        $code = $this->cleanCode($content);

        return '<code class="box inline-code">'.$code.'</code>';
    }
}
