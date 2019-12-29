<?php


namespace Package\Development\tests;


use Orchestra\Testbench\TestCase;
use Package\Development\MarkdownParse;

class MarkdownTest extends TestCase
{



        public function test_experiment()
        {
            $dd = new MarkdownParse;
            $dd->parser('# dfdfd');

        }
}