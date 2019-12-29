<?php


namespace Package\Development;


use Parsedown;

class MarkdownParse
{

    public function parser($string)
    {
        $parsedown = new Parsedown();

        return $parsedown->text($string);
    }

}