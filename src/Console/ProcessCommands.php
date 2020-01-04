<?php


namespace Package\Development\Console;




use Illuminate\Console\Command;
use Package\Development\Press;
use Package\Development\Repositories\PostRepository;

class ProcessCommands extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Update blog post';

    public function handle(PostRepository $repository)
    {

        if(Press::configNotPublished()){
            $this->warn('Please Publish the config file by running \'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            $posts = Press::driver()->fetchPosts();

            foreach ($posts as $post){
                $repository->save($post);
            }
        } catch (\Exception $e){
            $this->error($e->getMessage());
        }

    }
}