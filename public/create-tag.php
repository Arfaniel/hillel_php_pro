<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';
require_once __DIR__ . '/../config/database.php';

/** @var $blade */
echo $blade->make('tags/create-tag')->render();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $tag = new \Sandbox\Model\Tag();
    $tag->title = $_POST['tag_name'];
    $tag->slug = $_POST['tag_slug'];
    $tag->save();
    header('Location: list-tags.php');
}

