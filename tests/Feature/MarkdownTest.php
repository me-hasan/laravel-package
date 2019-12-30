<?php


namespace Package\Development\tests;


use Orchestra\Testbench\TestCase;
use Package\Development\MarkdownParse;

class MarkdownTest extends TestCase
{



    public function test_experiment()
    {

        $this->assertEquals('<h1>hi tester!</h1>', MarkdownParse::parser('# hi tester!'));

    }

    public function testsimple_parse_down_is()
    {
        $this->assertEquals('<h1>hi tester!</h1>', MarkdownParse::parser('# hi tester!'));

    }
}