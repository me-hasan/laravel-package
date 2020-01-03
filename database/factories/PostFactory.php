<?php

use Package\Development\Post;

$factory->define(Post::class, function (Faker\Generator $generator){

    return [
        'identifier' => str_random(),
        'slug' => str_slug($generator->sentence),
        'title' => $generator->sentence,
        'body' => $generator->paragraph,
        'extra' => json_encode(['test' => 'value'])
    ];

});