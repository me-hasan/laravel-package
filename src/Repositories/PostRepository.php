<?php

namespace Package\Development\Repositories;


use Package\Development\Post;

class PostRepository
{

    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier']
        ],[
            'slug' => str_slug($post['title']),
            'title' => $post['title'],
        ]);
    }

}