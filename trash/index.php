<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Sandbox\Model\Category;
use Sandbox\Model\Post;
use Sandbox\Model\Tag;
//creating categories

//$model = new Category();
//$model->title = 'Technology';
//$model->slug = 'technology';
//$model->save();
//
//$model = new Category();
//$model->title = 'Cars and machinery';
//$model->slug = 'cars-machinery';
//$model->save();
//
//$model = new Category();
//$model->title = 'Fishing';
//$model->slug = 'fishing';
//$model->save();
//
//$model = new Category();
//$model->title = 'Sports';
//$model->slug = 'sports';
//$model->save();
//
//$model = new Category();
//$model->title = 'Animals';
//$model->slug = 'animals';
//$model->save();

// update one category

//$category = Category::find(6);
//$category->title = 'Cats and dogs';
//$category->slug = 'cast-and-dogs';
//$category->save();

// delete one category

//$category = Category::find(1);
//$category->delete();

// create 2x5 posts

//$post = new Post();
//$post->title = 'London is the capital of Great Britain';
//$post->slug = 'london-is-the-capital-of-great-britain';
//$post->body = 'Lorem ipsum';
//$post->category_id = 2;
//$post->save();
//
//$post2 = new Post();
//$post2->title = 'Paris is the capital of France';
//$post2->slug = 'paris-is-the-capital-of-france';
//$post2->body = 'Lorem ipsum';
//$post2->category_id = 3;
//$post2->save();
//
//$post3 = new Post();
//$post3->title = 'Praha is the capital of Chech';
//$post3->slug = 'praha-is-the-capital-of-chech';
//$post3->body = 'Lorem ipsum';
//$post3->category_id = 5;
//$post3->save();
//
//$post4 = new Post();
//$post4->title = 'Vienna is the capital of Austria';
//$post4->slug = 'vienna-is-the-capital-of-austria';
//$post4->body = 'Lorem ipsum';
//$post4->category_id = 5;
//$post4->save();
//
//$post5 = new Post();
//$post5->title = 'Rome is the capital of Italy';
//$post5->slug = 'rome-is-the-capital-of-italy';
//$post5->body = 'Lorem ipsum';
//$post5->category_id = 6;
//$post5->save();

// updating one post

//$post = Post::find(10);
//$post->title = 'Lissabon is the capital of Portugal';
//$post->slug = 'lissabon-is-the-capital-of-portugal';
//$post->body = 'There is no spoon';
//$post->category_id = 4;
//$post->save();

// delete one post

//$post = Post::find(13);
//$post->delete();

//create 2x5 tags

//$tag = new Tag();
//$tag->title = 'journey';
//$tag->slug = 'journey';
//$tag->save();
//
//$tag1 = new Tag();
//$tag1->title = 'mem';
//$tag1->slug = 'mem';
//$tag1->save();
//
//$tag2 = new Tag();
//$tag2->title = 'fishing';
//$tag2->slug = 'fishing';
//$tag2->save();
//
//$tag3 = new Tag();
//$tag3->title = 'hacking';
//$tag3->slug = 'hacking';
//$tag3->save();
//
//$tag4 = new Tag();
//$tag4->title = 'style';
//$tag4->slug = 'style';
//$tag4->save();

// all posts gets 3 random tags
$tags = Tag::all();
$tagIds = [];
foreach ($tags as $tag)
{
    $tagIds[] = $tag->id;
}

$posts = Post::all();
foreach ($posts as $post)
{
    $randomTagIndex1 = rand(0,count($tagIds)-1);
    $randomTagIndex2 = rand(0,count($tagIds)-1);
    $randomTagIndex3 = rand(0,count($tagIds)-1);

    $post->tags()->sync([$tagIds[$randomTagIndex1], $tagIds[$randomTagIndex2], $tagIds[$randomTagIndex3]]);
}


//echo '<pre>';
//echo implode(',', getRandomThreeFromArray($tagIDs));
//echo '</pre>';