<?php


namespace Package\Development\Fields;



use Package\Development\MarkdownParse;

class Body
{

    public static function process($type, $value)
    {
        return [
            $type => MarkdownParse::parser($value),
        ];
    }

}