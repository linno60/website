<?php

class MyPhpCodeShortcode extends MyCodeShortcode
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
            'repo' => null
        ], $attributes);

        $code = parent::run($attributes, $content);

        $language = $attributes['lang'];

        $repo = $this->repoAttribute($attributes['repo']);

        return <<<HTML
<pre class="code-segement"><code class="box language-$language"$repo>&lt;?php

$code</code></pre>
HTML;
    }

    /**
     * Repo attribute.
     *
     * @param  string  $repo
     * @return string
     */
    protected function repoAttribute($repo)
    {
        return (null !== $repo) ? ' codeRepository="'.$repo.'"' : '';
    }
}
