<?php
namespace Sandbox\Controllers;

use Sandbox\Model\Category;
use Sandbox\Model\Post;
use Illuminate\Http\RedirectResponse;
use Sandbox\Model\Tag;



class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post/show', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/form', compact('post', 'categories', 'tags'));
    }

    public function store()
    {
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'max:255', 'unique:posts,title'],
            'slug' => ['required', 'min:5', 'max:255', 'unique:posts,slug'],
            'body' => ['required', 'min:10'],
            'category_id' => ['exists:categories,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);
        if($validator->fails())
        {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $post = new Post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags']);
        $_SESSION['success'] = 'Запис збережено';
        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/form-edit', compact('post', 'categories', 'tags'));
    }

    public function update()
    {
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => ['required', 'min:5', 'max:255', 'unique:posts,title'],
            'slug' => ['required', 'min:5', 'max:255', 'unique:posts,slug'],
            'body' => ['required', 'min:10'],
            'category_id' => ['exists:categories,id', 'required']
        ]);
        if($validator->fails())
        {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $post = Post::find($data['id']);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->sync($data['tags']);
        $_SESSION['success'] = 'Запис збережено';
        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return new RedirectResponse('/post');
    }

}