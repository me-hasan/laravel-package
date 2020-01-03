<?php


namespace Package\Development\tests;



use Carbon\Carbon;
use Package\Development\PressFileParser;

class PressFileParserTest extends TestCase
{

    /** @test */
    public function body_testing()
    {
        $pressFileParser = (new PressFileParser(__DIR__.'/../blogs/Markdown1.md'));
        $data = $pressFileParser->getData();
        $this->assertEquals('My title', $data['title']);

    }


    /** @test */
    public function date_testing()
    {
        $pressFileParser = (new PressFileParser("---\ndate: May 14, 1988\n---\n"));
        $data = $pressFileParser->getData();
        $this->assertInstanceOf(Carbon::class, $data['date']);
        $this->assertEquals('14/05/1988', $data['date']->format('d/m/Y'));
    }





}