<?php


namespace Package\Development;


use Illuminate\Support\Facades\File;

class PressFileParser
{
    protected $filename;

    protected $data;

    public function __construct($filename)
    {
        $this->filename = $filename;

        $this->spitFile();
    }

    public function getData()
    {

        return $this->data;

    }

    public function spitFile()
    {
        preg_match_all('/^\-{3}(.*?)\-{3}(.*)/s',
            File::get($this->filename),
            $this->data);

        dd($this->data);

    }

}