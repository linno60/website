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
        $date = (null === $date) ? 'UPDATED;' : 'UPDATED '.$date.';';

        return <<<HTML
<div class="box update">
    <strong>$date</strong> $update
</div>
HTML;
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
