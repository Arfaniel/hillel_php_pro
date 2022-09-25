<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

$tagId = $_GET['id'];
$tag = \Sandbox\Model\Tag::find($tagId);
$tag->delete();
//
header('Location: list-tags.php');