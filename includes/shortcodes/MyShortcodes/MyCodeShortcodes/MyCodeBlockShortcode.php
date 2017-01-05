<?php

class MyCodeBlockShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'code_block';

    /**
     * Run shortcode.
     *
     * @param  array  $attributes
     * @param  string  $content
     * @return string
     */
    protected function run($attributes, $content)
    {
        $attributes = shortcode_atts([
            'lang' => 'php',
            'repo' => ''
        ], $attributes);

        $code = parent::run($attributes, $content);

        return <<<HTML
<pre class="code-segement" itemscope itemtype="http://schema.org/SoftwareSourceCode"><code class="box language-{$attributes['lang']}" codeRepository="$repo" codeSampleType="code snippet" programmingLanguage="{$attributes['lang']}">&lt;?php

$code</code></pre>
HTML;
    }
}
