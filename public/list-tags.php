<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';
require_once __DIR__ . '/../config/database.php';


$tags = \Sandbox\Model\Tag::all();


/** @var $blade */
echo $blade->make('tags/list-tags',[
    'header'=> 'List of Tags',
    'tags' => $tags
])->render();