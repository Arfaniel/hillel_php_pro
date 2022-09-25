<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';
require_once __DIR__ . '/../config/database.php';


$categories = \Sandbox\Model\Category::all();


/** @var $blade */
echo $blade->make('categories/list-categories',[
    'header'=> 'List of Categories',
    'categories' => $categories
])->render();