@extends('layout')

@section('title')
    {{ $category->title }}
@endsection


@section('content')
    <h1>Editing category</h1>
    <form action="" method="POST">
        <label for="name">Category name</label>
        <input type="text" name="category_name" id="name" value="{{ $category->title }}">
        <br>
        <br>
        <label for="score">Category slug</label>
        <input type="text" name="category_slug" id="slug" value="{{ $category->slug }}">
        <br>
        <br>
        <input type="submit">
    </form>
@endsection