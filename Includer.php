<?php

class Includer
{
    /**
     * Include directory.
     *
     * @return void
     */
    public static function includeDirectory($directory)
    {
        $items = array_filter(scandir($directory), function ($item) {
            return 0 !== strpos($item, '.');
        });

        foreach ($items as $item) {
            static::includePath($directory.'/'.$item);
        }
    }

    /**
     * Include item.
     *
     * @param  string  $name
     * @return void
     */
    protected static function includePath($path)
    {
        if (is_dir($path) && 0 !== strpos($path, '.')) {
            return static::includeDirectory($path);
        }

        include $path;
    }
}
