<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/blade.php';
require_once __DIR__ . '/../config/database.php';

$category = \Sandbox\Model\Category::find($_GET['id']);


/** @var $blade */
echo $blade->make('categories/update-category', [
    'category' => $category
])->render();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $category->title = $_POST['category_name'];
    $category->slug = $_POST['category_slug'];
    $category->save();
    header('Location: list-categories.php');
}

