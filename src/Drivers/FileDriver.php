<?php


namespace Package\Development\Drivers;


use Illuminate\Support\Facades\File;
use Package\Development\Exceptions\FileDirectoryNotFountException;

class FileDriver extends Driver
{

    public function fetchPosts()
    {
        $files = File::files($this->config['path']);

        foreach ($files as $file)
        {
             $this->parse($file->getPathname(), $file->getFilename());
        }

        return $this->posts;
    }

    protected function validateSource()
    {

        if(! File::exists($this->config['path'])){
            throw new FileDirectoryNotFountException(
                'Directory at \''. $this->config['path'] .'\' does not exist. '.
                ' Check the directory path in the config file.'
            );
        }
    }

}