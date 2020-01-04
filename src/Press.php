<?php


namespace Package\Development;


class Press
{

    public static function configNotPublished()
    {
        return is_null(config('press'));
    }

    public static function driver()
    {
        $driver = title_case(config('press.driver'));

        $class = 'Package\Development\Drivers\\' . $driver . 'Driver';

        return new $class;

    }

    public static function path()
    {
        return config('press.path', 'blogs');
    }
}