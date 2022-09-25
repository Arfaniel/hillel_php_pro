<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';
require_once __DIR__ . '/../config/database.php';

$tag = \Sandbox\Model\Tag::find($_GET['id']);


/** @var $blade */
echo $blade->make('tags/update-tag', [
    'tag' => $tag
])->render();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $tag->title = $_POST['tag_name'];
    $tag->slug = $_POST['tag_slug'];
    $tag->save();
    header('Location: list-tags.php');
}

