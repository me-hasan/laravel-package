<?php


namespace Package\Development;


use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class PressFileParser
{
    protected $filename;

    protected $data;

    public function __construct($filename)
    {
        $this->filename = $filename;

        $this->spitFile();

        $this->spitData();

        $this->processFields();
    }

    public function getData()
    {

        return $this->data;

    }

    public function spitFile()
    {
        preg_match('/^\-{3}(.*?)\-{3}(.*)/s',
            File::exists($this->filename) ? File::get($this->filename) : $this->filename,
            $this->data);
    }

    protected function spitData()
    {
        foreach (explode("\n",trim($this->data[1])) as $value)
        {
            preg_match('/(.*):\s?(.*)/',
                $value,
                $valueArr);

            $this->data[$valueArr[1]] = $valueArr[2];


        }
    }

    protected function processFields()
    {
        foreach ($this->data as $field=> $value){

                $class = 'Package\\Development\\Fields\\' . title_case($field);

                if(class_exists($class) && method_exists($class, 'process'))
                {
                    $this->data = array_merge($this->data, $class::process($field, $value));
                }
        }
    }

}