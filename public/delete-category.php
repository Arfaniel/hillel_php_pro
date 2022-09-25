<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
$categoryId = $_GET['id'];
$category = \Sandbox\Model\Category::find($categoryId);

$category->posts()->delete();

$category->delete();

header('Location: list-categories.php');