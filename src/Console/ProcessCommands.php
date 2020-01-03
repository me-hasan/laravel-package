<?php


namespace Package\Development\Console;



use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Package\Development\Post;
use Package\Development\PressFileParser;

class ProcessCommands extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Update blog post';

    public function handle()
    {

        if(is_null(config('press'))){
            $this->warn('Please Publish the config file by running \'php artisan vendor:publish --tag=press-config\'');
        }

        $files = File::files(config('press.path'));

        foreach ($files as $file)
        {
            $post = (new PressFileParser($file->getPathname()))->getData();
        }

        Post::create([
            'identifier' => str_random(),
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
            ]);
    }
}