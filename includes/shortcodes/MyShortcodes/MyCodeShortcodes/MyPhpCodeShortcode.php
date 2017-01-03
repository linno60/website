<?php

class MyPhpCodeShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'php';

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

        return <<<HTML
<pre class="code-segement"><code class="box language-php">&lt;?php

$code</code></pre>
HTML;
    }
}
