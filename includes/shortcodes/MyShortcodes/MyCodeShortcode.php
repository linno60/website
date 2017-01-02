<?php

abstract class MyCodeShortcode extends MyShortcode
{
    /**
     * Clean code for output.
     *
     * @param  string  $code
     * @return string
     */
    protected function cleanCode($code)
    {
        return trim(strip_tags($code));
    }
}
