<?php


namespace Package\Development\tests;


use Orchestra\Testbench\TestCase;
use Package\Development\PressFileParser;

class PressFileParserTest extends TestCase
{

    public function test_heading_spit()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/Markdown1.md'));

        $data = $pressFileParser->getDatssa;

        $this->assertContains('title : My title', $data[1]);
        $this->assertContains('description : Description here', $data[1]);
        $this->assertContains('Blog Post body here', $data[2]);

    }

}