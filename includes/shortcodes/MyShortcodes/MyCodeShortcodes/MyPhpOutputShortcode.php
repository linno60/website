<?php

class MyPhpOutputShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'php_output';

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

        return <<<HTML
<div class="code-segement">
    <div class="box title">RESULT</div>
    <pre><samp class="box language-php">$code</samp></pre>
</div>
HTML;
    }
}
