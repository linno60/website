<?php

class MyCodeOutputShortcode extends MyCodeShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'code_output';

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
            'lang' => 'php'
        ], $attributes);

        $code = parent::run($attributes, $content);

        $language = $attributes['lang'];
        $repo = $attributes['repo'];

        return <<<HTML
<div class="code-segement">
    <div class="box title">RESULT</div>
    <pre><samp class="box language-$language" itemscope itemtype="http://schema.org/SoftwareSourceCode" codeSampleType="code snippet" programmingLanguage="$language">$code</samp></pre>
</div>
HTML;
    }
}
