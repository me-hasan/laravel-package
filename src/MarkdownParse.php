<?php


namespace Package\Development;


use Parsedown;

class MarkdownParse
{

    public static function parser($string)
    {

        return Parsedown::instance()->text($string);
    }

}