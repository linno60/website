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

        $language = $attributes['lang'];

        return <<<HTML
<pre class="code-segement"><code class="box language-$language" itemscope itemtype="http://schema.org/SoftwareSourceCode" codeRepository="$repo" codeSampleType="code snippet" programmingLanguage="$language">&lt;?php

$code</code></pre>
HTML;
    }
}
