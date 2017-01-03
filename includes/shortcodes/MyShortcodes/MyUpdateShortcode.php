<?php

class MyUpdateShortcode extends MyShortcode
{
    /**
     * Tag to use shortcode i.e. [tag]
     *
     * @var string
     */
    const TAG = 'update';

    /**
     * Run shortcode.
     *
     * @param  array  $attributes
     * @param  string  $content
     * @return string
     */
    protected function run($attributes, $content)
    {
        $update = parent::run($attributes, $content);

        $date = shortcode_atts([
            'day' => null,
            'month' => null,
            'year' => null
        ], $attributes);

        $date = $this->parseDate($date);

        $html  = '<div class="box update">';
        $html .=    '<strong>';
        $html .=        (null === $date) ? 'UPDATED;' : 'UPDATED '.$date.';';
        $html .=        $update;
        $html .=    '</strong>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Parse date.
     *
     * @param  array  $date
     * @return string|null
     */
    protected function parseDate($date)
    {
        return (null !== $date['year']) ? implode('-', $date) : null;
    }
}
