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
        static $id = 0; $id += 1;

        $attributes = shortcode_atts([
            'lang' => 'php'
        ], $attributes);

        $code = parent::run($attributes, $content);

        return  ((is_amp())
                ?'<a href="'.get_non_amp_url().'#code-block-'.$id.'" class="highlight-link">View Highlighted Code</a>'
                :'')
                .'<pre id="code-block-'.$id.'" class="code-segement">'
                    .'<code class="box language-'.$attributes['lang'].'">'
                        .'&lt;?php'.PHP_EOL.PHP_EOL.$code
                    .'</code>'
                .'</pre>';
    }
}
